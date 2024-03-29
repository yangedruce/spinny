<div class="relative">
    {{-- Pointer --}}
    <div class="absolute h-12 bg-black w-5 top-0" style="
            clip-path: polygon(50% 100%, 0 0, 100% 0);
            /* left: calc(300px - 10px); */
            left: calc(50% - 10px);
            top: -0.5rem;"></div>

    <canvas class="wheel-container" id="{{ $id }}" width="600" height="500" data-responsiveMinWidth="300" data-responsiveScaleHeight="true"
        data-responsiveMargin="16">
        Canvas not supported, use another browser.
    </canvas>
</div>