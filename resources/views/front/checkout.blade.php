<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body class="text-black font-poppins">
<div class="bg-neutral-900 text-white mx-14 rounded-lg mt-5 ">
    <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-8 mx-auto pt-10 pb-10 rounded-lg">
    <!-- Logo -->
    <div class="md:col-span-3">
        <a class="flex-none rounded-xl text-2xl inline-block font-bold focus:outline-none focus:opacity-80 text-white">
            <p><span class="pr-2 text-4xl font-serif text-orange-500">;</span>Titik Koma</p>
        </a>
    </div>

    <!-- Centered Menu -->
    <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6">
        <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0 text-lg font-semibold">
            <div>
            <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="{{route('front.index')}}">Home</a>
            </div>
            <div>
                <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="#">Pricing</a>
            </div>
            <div>
                <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="#">Benefits</a>
            </div>
            <div>
                <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="#">Stories</a>
            </div>
        </div>
    </div>
    @auth
    <!-- Profile Section -->
    <div class="flex items-center gap-x-4 md:order-3 md:col-span-3 ml-10 ms-auto">
        <div class="flex flex-col items-end justify-center">
            <p class="font-semibold text-white">Hi, {{Auth::user()->name}}</p>
            @if(Auth::user()->hasActiveSubscription())
            <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">PRO</p>
            @endif
        </div>
        <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
            <a href="{{route('dashboard')}}">
            <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
            </a>
        </div>
    </div>
    @endauth
    @guest
     <!-- Button Group -->
     <div class="flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">
        <a href="{{route('register')}}"> <button type="button" class="py-2 px-6 inline-flex items-center gap-x-2 text-lg font-bold rounded-lg bg-white border border-gray-200 text-black focus:outline-none  disabled:opacity-50 disabled:pointer-events-none">
        Sign Up
      </button></a>
        <a href="{{route('login')}}"> <button type="button" class="py-2 px-6 inline-flex items-center gap-x-2 text-lg font-bold rounded-lg border border-transparent bg-orange-500 text-blackfocus:outline-none transition disabled:opacity-50 disabled:pointer-events-none">
        Sign In
      </button></a>
    @endguest

    <!-- Mobile Menu Button -->
    <div class="md:hidden">
        <button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
            <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" x2="21" y1="6" y2="6"/>
                <line x1="3" x2="21" y1="12" y2="12"/>
                <line x1="3" x2="21" y1="18" y2="18"/>
            </svg>
            <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"/>
                <path d="m6 6 12 12"/>
            </svg>
        </button>
    </div>
    
</nav>
    <div id="checkout-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-[30px] pb-12 text-black">
        <div class="flex flex-col gap-[10px] items-center">
            <h2 class="font-bold text-[40px] leading-[60px] text-white">Checkout Subscription</h2>
        </div>
        <div class="flex gap-10 px-[100px] relative z-10">
            <div class="w-[400px] flex shrink-0 flex-col bg-white rounded-2xl p-5 gap-4 h-fit">
                <p class="font-bold text-lg">Package</p>
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/icon/premium.svg" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            <p class="font-semibold">Premium</p>
                            <p class="text-sm text-[#6D7786]">30 days access</p>
                        </div>
                    </div>
                    <p class="p-[4px_12px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">Popular</p>
                </div>
                <hr>
                <div class="flex flex-col gap-5">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Access all course materials</p>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Unlock all course badges for jobs</p>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Receive premium rewards</p>
                    </div>
                </div>
                <p class="font-semibold text-[28px] leading-[42px]">Rp 599.000</p>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{route('front.checkout.store')}}" class="w-full flex flex-col bg-white rounded-2xl p-5 gap-5">
                @csrf
                <p class="font-bold text-lg">Send Payment</p>
                <div class="flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Nama Bank</p>
                        </div>
                        <p class="font-semibold">BRI | Bank Rakyat Indonesia </p>
                        <input type="hidden" name="bankName" value="Angga Capital">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Nomor Rekening</p>
                        </div>
                        <p class="font-semibold">730601017188533</p>
                        <input type="hidden" name="accountNumber" value="22081996202191404">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Nama Penerima</p>
                        </div>
                        <p class="font-semibold">Pt Titikkoma Indonesia</p>
                        <input type="hidden" name="accountName" value="Alqowy Education First">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Kode Bank</p>
                        </div>
                        <p class="font-semibold">002</p>
                        <input type="hidden" name="swift" value="ACEFIRSTBANK">
                    </div>
                </div>
                <hr>
                <p class="font-bold text-lg">Confirm Your Payment</p>
                <div class="relative">
                    <button type="button" class="p-4 rounded-full flex gap-3 w-full ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]" onclick="document.getElementById('file').click()">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/note-add.svg" alt="icon">
                        </div>
                        <p id="fileLabel">Add a file attachment</p>
                    </button>
                    <input id="file" type="file" name="proof" class="hidden" onchange="updateFileName(this)">
                </div>
                <button class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">I've Made The Payment</button>
            </form>
        </div>
      
    </div>
    
    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script src="{{asset('js/main.js')}}">
        
    </script>
    
</body>
</html>