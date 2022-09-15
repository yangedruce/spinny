<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use App\Models\Prize;
use App\Models\PrizeWinner;
use App\Models\GrandPrizeWinner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prizes = Prize::all();
        $maxMonth = date('n');

        return view('admin.index', [
            'prizes' => $prizes,
            'maxMonth' => $maxMonth,
        ]);
    }

    // --------------------------------------------------
    // API
    // --------------------------------------------------

    /**
     * Check if selected month already have winner.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function checkSelectedMonth(Request $request)
    {
        $jsonResponse = $this->convertToJson($request);

        $selectedMonthStatus = false;

        $selectedMonth = $jsonResponse['month'];
        $grandPrizeWinners = GrandPrizeWinner::where('month', $selectedMonth)->first();

        if ($grandPrizeWinners == null) {
            $eligiblePrizeWinners = PrizeWinner::where('shared', true)
                                        ->whereYear('created_at', '=', date('Y'))
                                        ->whereMonth('created_at', '=', $selectedMonth)
                                        ->get();
            (count($eligiblePrizeWinners) > 0)
                ? $selectedMonthStatus = true
                : session()->put('errorMessage', __('No eligible prize winners for selected month!'));
        } else {
            session()->put('errorMessage', __('Selected month already have a grand prize winner!'));
        }

        return ['selectedMonthStatus' => $selectedMonthStatus];
    }

    /**
     * Get error message.
     *
     * @return string $errorMessage
     */
    public function getMessageError()
    {
        $errorMessage = null;
        if (session()->get('errorMessage') != null) {
            $errorMessage = session()->get('errorMessage');
            session()->forget('errorMessage');
        }
        return ['errorMessage' => $errorMessage];
    }

    /**
     * Set grand prize winner.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function setGrandPrizeWinner(Request $request)
    {
        $jsonResponse = $this->convertToJson($request);
        $selectedMonth = $jsonResponse['month'];

        $eligibleNames = [];
        $winnerName= null;

        $eligiblePrizeWinners = PrizeWinner::where('shared', true)
                                        ->whereYear('created_at', '=', date('Y'))
                                        ->whereMonth('created_at', '=', $selectedMonth)
                                        ->get();

        $randomGrandPrizeWinner =  rand(0, count($eligiblePrizeWinners) - 1);

        $winner = null;

        foreach ($eligiblePrizeWinners as $index => $eligiblePrizeWinner) {
            if ($index == $randomGrandPrizeWinner) {
                $winner = $eligiblePrizeWinner;
                $winnerName = $winner->usercode->name;

                $message = __('Grand prize winner for month').' '.date('F', strtotime(date('Y').'/'.$selectedMonth.'/'.date('d')));
            }
        }

        $userCodes = UserCode::all();
        foreach ($userCodes as $userCode) {
            array_push($eligibleNames, $userCode->name);
        }

        if ($winner != null) {
            $grandPrizeWinner = GrandPrizeWinner::create([
                'month' => $selectedMonth,
                'user_code_id' => $winner->usercode->id,
                'prize_winner_id' => $winner->id,
            ]);
        }

        return [
            'eligibleNames' => $eligibleNames,
            'winnerName' => $winnerName,
            'message' => $message,
        ];
    }

    // --------------------------------------------------
    // Helper
    // --------------------------------------------------

    /**
     * Convert AJAX string response to JSON array.
     *
     * @param string $string
     * @return array
     */
    public function convertToJson($string)
    {
        return json_decode('{'. explode('{', str_replace('\n', '', $string))[1], true);
    }
}
