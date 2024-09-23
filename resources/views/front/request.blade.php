<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
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
                    <a class="inline-block text-white hover:text-orange-500 focus:outline-none focus:text-orange-500" href="{{ route('front.index') }}">Home</a>
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
                <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                @if(Auth::user()->hasActiveSubscription())
                <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">PRO</p>
                @endif
            </div>
            <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="photo">
                </a>
            </div>
        </div>
        @endauth
        @guest
         <!-- Button Group -->
         <div class="flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">
            <a href="{{ route('register') }}"> <button type="button" class="py-2 px-6 inline-flex items-center gap-x-2 text-lg font-bold rounded-lg bg-white border border-gray-200 text-black focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
            Sign Up
          </button></a>
            <a href="{{ route('login') }}"> <button type="button" class="py-2 px-6 inline-flex items-center gap-x-2 text-lg font-bold rounded-lg border border-transparent bg-orange-500 text-black focus:outline-none transition disabled:opacity-50 disabled:pointer-events-none">
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

    <!-- Teacher Request Form Section -->
    <div id="teacher-request-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-[30px] pb-12 text-black">
        <div class="flex flex-col gap-[10px] items-center">
            <h2 class="font-bold text-[40px] leading-[60px] text-white">Become a Teacher</h2>
        </div>
        <div class="flex gap-10 px-[100px] relative z-10">
            <form method="POST" enctype="multipart/form-data" action="{{ route('teacher-requests.store') }}" class="w-full flex flex-col bg-white rounded-2xl p-5 gap-5">
                @csrf
                <p class="font-bold text-lg">Submit Your Request</p>
                <div class="flex flex-col gap-5">
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block font-semibold">Name</label>
                        <input id="name" type="text" name="name" class="w-full border border-gray-300 p-3 rounded-lg" value="{{ old('name') }}" required>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block font-semibold">Email</label>
                        <input id="email" type="email" name="email" class="w-full border border-gray-300 p-3 rounded-lg" value="{{ old('email') }}" required>
                    </div>

                    <!-- CV Upload Input -->
                    <div class="relative">
                        <button type="button" class="p-4 rounded-full flex gap-3 w-full ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]" onclick="document.getElementById('file').click()">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="assets/icon/note-add.svg" alt="icon">
                            </div>
                            <p id="fileLabel">Upload Your CV</p>
                        </button>
                        <input id="file" type="file" name="cv" class="hidden" onchange="updateFileName(this)" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-lg">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateFileName(input) {
        const fileLabel = document.getElementById('fileLabel');
        fileLabel.textContent = input.files[0].name;
    }
</script>
</body>
</html>
