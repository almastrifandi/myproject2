<!doctype html>
<html >
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

<body class="text-black font-poppins bg-gray-200  ">
    <div class="bg-neutral-900 text-white mx-14 rounded-lg mt-5 ">
    <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-8 mx-auto py-12 ">
    <div class="md:col-span-3">
      <!-- Logo -->
      <a class="flex-none rounded-xl text-2xl inline-block font-bold focus:outline-none focus:opacity-80  text-white" >
      <p class=""> <span class="pr-2 text-4xl font-serif text-orange-500">;</span>Titik Koma</p>
      </a>
      <!-- End Logo -->
    </div>

    <!-- Button Group -->
    <div class="flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">
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

        <a href="{{route('register')}}"> <button type="button" class="py-2 px-6 inline-flex items-center gap-x-2 text-lg font-bold rounded-lg bg-white border border-gray-200 text-black focus:outline-none  disabled:opacity-50 disabled:pointer-events-none">
        Sign Up
      </button></a>
        <a href="{{route('login')}}"> <button type="button" class="py-2 px-6 inline-flex items-center gap-x-2 text-lg font-bold rounded-lg border border-transparent bg-orange-500 text-blackfocus:outline-none transition disabled:opacity-50 disabled:pointer-events-none">
        Sign In
      </button></a>
    @endguest
     
     

      <div class="md:hidden">
        <button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
          <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <!-- End Button Group -->

    <!-- Collapse -->
     
    <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
      
      <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0 text-lg  font-semibold">
        <div>
        <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="{{route('front.index')}}">Home</a>
        </div>
        <div>
          <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="{{route('front.pricing')}}">Pricing</a>
        </div>
        <div>
          <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="#">Category</a>
        </div>
      <div>
      <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="#Popular-Courses">Courses</a>

        </div>
      
      </div>
    </div>
    <!-- End Collapse -->
  </nav>
<section class="max-w-[1100px] w-full mx-auto bg-neutral-900">
        <div class="flex flex-col gap-[30px] items-center">
            <div class="flex flex-col text-white text-center">
                <h2 class="font-bold text-[40px] leading-[60px] bg-gradient-to-r from-white to-orange-400 to-70% bg-clip-text text-transparent">Biaya & Benefit Langganan</h2>
                <p class="text-lg -tracking-[2%]">Ayo Bergabung dan Jadilah bagian dari kami</p>
            </div>
            <div class="max-w-[1000px] w-full flex gap-[30px]">
                <div class="flex flex-col rounded-3xl p-8 gap-[30px] bg-white h-fit text-black">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-4">
                            <p class="font-bold text-4xl leading-[54px] ">Teachership</p>
                            <p class="text-[#475466] text-lg">Jadilah Bagian Penting dari kami untuk membagikan ilmu & keahlian anda</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-4xl leading-[54px]">Rp 0</p>
                            <p class="text-[#475466] text-lg">Selamanya Gratis!</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Mendapatkan Akses untuk semua kursus material untuk membangun kelas pembelajaran anda</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Teruslah berkembang hingga mendapatkan penghargaan yang akan meningkatkan karir anda</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('front.request')}}" class="p-[20px_32px] rounded-full text-center font-semibold text-xl ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Request for Access</a>
                </div>
                <div class="flex flex-col rounded-3xl p-8 gap-[30px] bg-white h-fit text-black">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-4">
                            <p class="font-bold text-4xl leading-[54px] text-black">Premium</p>
                            <p class="text-[#475466] text-lg">Dapatkan Akses untuk 500+ Pembelajaran yang akan membangun karir anda</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-4xl leading-[54px]">Rp 599.000</p>
                            <p class="text-[#475466] text-lg">Per Bulan</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Access all course materials including videos, docs, career guidance, etc</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Unlock all course badges to enhance career profile to apply a job after completed</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Receive premium rewards such as templates</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Access jobs portal and exclusive interview</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Unlock all course badges to enhance career profile to apply a job after completed</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('front.checkout')}}" class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold text-xl transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Subscribe Now</a>
                </div>
            </div>
        </div>
    </section>
</body>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>  

    <script src="{{asset('js/main.js')}}">

    </script>
    </body>
</html>