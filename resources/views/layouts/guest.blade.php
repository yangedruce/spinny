<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yoodo Spin The Wheel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script type="text/javascript" src="js/raphael.min.js"></script>
    <script type="text/javascript" src="js/wheelnav.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            var PieSlice = new wheelnav("PieSlice", null, 800, 800);
            PieSlice.slicePathFunction = slicePath().StarBasePieSlice;
            PieSlice.sliceInitPathCustom = slicePath().StarSliceCustomization();
            PieSlice.sliceInitPathCustom.minRadiusPercent = 0.3;
            PieSlice.sliceInitPathFunction = slicePath().StarSlice;
            PieSlice.sliceHoverPathCustom = slicePath().StarSliceCustomization();
            PieSlice.sliceHoverPathCustom.minRadiusPercent = 0.9;
            PieSlice.sliceHoverPathFunction = slicePath().StarSlice;
            PieSlice.initWheel(["iphone", "shopee voucher", "macbook", "1x free shipping", "game add on", "free sim card", "free RM30 topup", "free 10gb data"]);
            PieSlice.navItemCount = 8;
            PieSlice.navAngle = 112.5;
            PieSlice.rotateRound = true;
            PieSlice.slicePathAttr = { stroke: "none", cursor: 'pointer' };
            PieSlice.sliceHoverAttr = { stroke: "none", cursor: 'pointer' };
            PieSlice.sliceSelectedAttr = { stroke: "none", cursor: 'default' };
            PieSlice.colors = new Array("#78b83e", "#e1ed31", "#fba341", "#f0624c", "#1c82cd", "#006138", "#018345", "#28b64a");
            PieSlice.createWheel();
        };
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>

</html>