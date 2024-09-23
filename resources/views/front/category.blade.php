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
<body class="font-poppins bg-gray-200">
<div class="bg-neutral-900 mt-7 mx-14 rounded-lg" id="home">
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
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px] text-white">{{$category->name}}</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div>
            <div class="grid grid-cols-3 gap-[30px] w-full">
                @forelse($courses as $course)
                <div class="course-card">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="{{route('front.details',$course)}}"class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{Storage::url($course->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[32px]">
                            <div class="flex flex-col gap-[10px]">
                                <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{$course->name}}</a>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-[2px]">
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                    </div>
                                    <p class="text-right text-[#6D7786]">{{$course->students->count()}} Students</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{Storage::url($course->teacher->user->avatar)}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">{{$course->teacher->user->name}}</p>
                                    <p class="text-[#6D7786]">{{$course->teacher->user->occupation}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                <p class="text-white">Belum Teredia kelas di Category ini.</p>
                @endforelse
            </div>
        </div>
        </div>
    </section>
</div>
  
</body>