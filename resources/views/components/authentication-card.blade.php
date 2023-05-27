<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="m-auto mt-6 bg-white shadow-md overflow-hidden con w-50">
        <div style="width: 100%">
            <img style="width: 100%" src="images/model03.jpg" class="m-0 img" alt="">
        </div>

        {{ $slot }}
    </div>
</div>
