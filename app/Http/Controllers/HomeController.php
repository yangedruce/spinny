<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\PrizeWinner;
use App\Models\UserCode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display home page.
     */
    public function index()
    {
        // session()->flush();
        $prizes = Prize::all();
        return view('home.index')->with(['prizes' => $prizes]);
    }

    /**
     * Display leadearboard page.
     */
    public function showLeaderboard()
    {
        $prizeWinners = PrizeWinner::paginate(10);
        return view('home.leaderboard')->with([
            'prizeWinners' => $prizeWinners,
        ]);
    }

    // --------------------------------------------------
    // API
    // --------------------------------------------------

    /**
     * Get prize data.
     */
    public function getPrize()
    {
        return Prize::all();
    }

    /**
     * Get win message.
     */
    public function getMessageWin()
    {
        $winMessage = null;
        $currentPrizeWinner = $this->getCurrentPrizeWinner();
        if ($currentPrizeWinner != null) {
            $prizeName = $currentPrizeWinner->prize->prize_name;

            $winMessage = __('You have won').' '.$prizeName;
        }
        return ['winMessage' => $winMessage];
    }

    /**
     * Get error message.
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
     * Get spinner status.
     *
     * @return boolean $spinnerStatus
     * @return integer $prizeIndex
     */
    public function getSpinnerStatus()
    {
        $spinnerStatus = false;
        $prizeIndex = null;
        if (session()->get('spinnerStatus') != null) {
            $spinnerStatus = session()->get('spinnerStatus');
            $currentPrizeWinner = session()->get('currentPrizeWinner');
            $prizeId = $currentPrizeWinner->prize->id;

            $prizes = Prize::all();
            foreach ($prizes as $index => $prize) {
                if ($prize->id == $prizeId) {
                    $prizeIndex = $index + 1;
                }
            }
        }

        return [
            'spinnerStatus' => $spinnerStatus,
            'prizeIndex' => $prizeIndex
        ];
    }

    /**
     * Update current prize winner share value.
     */
    public function postCurrentPrizeWinner()
    {
        $currentPrizeWinner = $this->getCurrentPrizeWinner();
        if ($currentPrizeWinner != null) {
            $currentPrizeWinner->shared = true;
            $currentPrizeWinner->update();
        }

        return true;
    }

    /**
     * Post form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean $spinnerStatus
     * @return integer $prizeIndex
     */
    public function postForm(Request $request)
    {
        $spinnerStatus = false;
        $prizeIndex = null;

        $jsonResponse = $this->convertToJson($request);

        $email = $jsonResponse['email'];
        $code = $jsonResponse['user_code'];

        $isCodeValid = $this->checkCodeValidity($email, $code);

        if ($isCodeValid) {
            $winningPrize = $this->setWinningPrize();

            // Update prize count.
            $winningPrize->remaining = $winningPrize->remaining - 1;
            $winningPrize->update();

            $userCode = UserCode::where('email', $email)->where('user_code', $code)->first();

            // Update user code.
            $userCode->validation = true;
            $userCode->update();


            // Add prize winner
            $prizeWinner = PrizeWinner::create([
                'shared' => false,
                'user_code_id' => $userCode->id,
                'prize_id' => $winningPrize->id,
            ]);

            $prizes = Prize::all();
            foreach ($prizes as $index => $prize) {
                if ($prize->id == $winningPrize->id) {
                    $prizeIndex = $index + 1;
                }
            }

            $spinnerStatus = true;

            session()->put('currentPrizeWinner', $prizeWinner);
            session()->put('spinnerStatus', $spinnerStatus);
        }

        return [
            'spinnerStatus' => $spinnerStatus,
            'prizeIndex' => $prizeIndex
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

    /**
     * Check if user code is valid.
     *
     * @return bool $isCodeUnused
     */
    public function checkCodeValidity($email, $code)
    {
        $isCodeValid = false;

        $userCode = UserCode::where('email', $email)->where('user_code', $code)->first();

        if ($userCode != null) {
            $prizeWinner = PrizeWinner::where('user_code_id', $userCode->id)->first();
            if(! $userCode->validation && $prizeWinner == null){
                $prizes = Prize::where('remaining', '>', 0)->first();
                ($prizes != null)
                    ? $isCodeValid = true
                    : session()->put('errorMessage', __('All prizes has already been redeemed!'));
            } else {
                session()->put('errorMessage', __('This code has already been redeemed!'));
            }
        } else {
            session()->put('errorMessage', __('Invalid credentials!'));
        }

        return $isCodeValid;
    }

    /**
     * Get winning prize.
     *
     * @return object $winningPrize
     */
    public function setWinningPrize()
    {
        $winningPrize = null;
        $prizes = Prize::all();
        $randomPrize =  rand(0, count($prizes) - 1);

        foreach ($prizes as $index => $prize) {
            if ($index == $randomPrize && $prize->remaining > 0) {
                $winningPrize = $prize;
            }
        }

        // Do recursive if value of $winningPrize is null.
        if ($winningPrize == null) {
            $winningPrize = $this->setWinningPrize();
        }

        return $winningPrize;
    }

    /**
     * Get winning prize.
     */
    public function getCurrentPrizeWinner()
    {
        $currentPrizeWinner = null;
        if (session()->get('currentPrizeWinner') != null) {
            $currentPrizeWinner = session()->get('currentPrizeWinner');
        }

        return $currentPrizeWinner;
    }
}
