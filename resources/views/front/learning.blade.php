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
<body class="text-black font-poppins mt-7 ">
    <div class="bg-neutral-900 text-white mx-14 rounded-lg ">
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

    <section id="video-content" class="max-w-[1100px] w-full mx-auto text-black">
        <div class="video-player relative flex flex-nowrap gap-5">
            <div class="plyr__video-embed w-full overflow-hidden relative rounded-[20px]" id="player">
                <iframe
                    src="https://www.youtube.com/embed/{{$video->path_video}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                    allowfullscreen
                    allowtransparency
                    allow="autoplay"
                ></iframe>
            </div>
            <div class="video-player-sidebar flex flex-col shrink-0 w-[330px] h-[470px] bg-[#F5F8FA] rounded-[20px] px-5 gap-5 pb-0 overflow-y-scroll no-scrollbar">
                <p class="font-bold text-lg pt-5 text-black">{{$course->course_videos->count()}} Videos</p>
                <div class="flex flex-col gap-3">
                    <div class="group p-[12px_16px] flex items-center gap-[10px] bg-[#E9EFF3] rounded-full hover:bg-[#ea580c] transition-all duration-300">
                        <div class="text-black group-hover:text-white transition-all duration-300">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <a href="{{route('front.details',$course)}}">
                        <p class="font-semibold group-hover:text-white transition-all duration-300">Course Trailer</p>
                        </a>
                    </div>
                    @forelse($course->course_videos as $video)

                    @php
                        $currentVideoId = Route::current()->parameter('courseVideoId');
                        $isActive = $currentVideoId == $video->id;
                    @endphp
                    <div class="group p-[12px_16px] flex items-center gap-[10px] {{ $isActive ? 'bg-[#ea580c] ' : 'bg-[#E9EFF3]'}}  rounded-full hover:bg-[#ea580c] transition-all duration-300">
                        @if($isActive)
                        <div class="text-white group-hover:text-white transition-all duration-300">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor"/>
                            </svg>
                        </div>
                        @else
                        <div class="text-black group-hover:text-white transition-all duration-300">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor"/>
                            </svg>
                        </div>
                        @endif
                        <a href="{{route('front.learning',[$course, 'courseVideoId'=> $video->id])}}">
                        <p class="font-semibold group-hover:text-white transition-all duration-300 {{ $isActive ? 'text-white ' : 'text-black'}} ">{{$video->name}}</p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section id="Video-Resources" class="flex flex-col mt-5">
        <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-3">
            <h1 class="title font-extrabold text-[30px] leading-[45px]">{{$course->name}}</h1>
            <div class="flex items-center gap-10 mt-3">
                <div class="flex items-center gap-[10px]">
                    <div >
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19.349 5.255l-3.238 3.11l-3.196-4.354a1.027 1.027 0 0 0-1.83 0L7.89 8.366L4.65 5.255a1.028 1.028 0 0 0-1.901.503l1.593 11.203a4.11 4.11 0 0 0 4.111 3.587h7.195a4.11 4.11 0 0 0 4.11-3.587L21.25 5.758a1.028 1.028 0 0 0-1.901-.503M8 16.447h8"/></svg>  
                    </div>
                    <p class="font-semibold">{{$course->category->name}}</p>
                </div>
                <div class="flex items-center gap-[10px]">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 8V6c0-1.886 0-2.828-.586-3.414S14.886 2 13 2h-2c-1.886 0-2.828 0-3.414.586S7 4.114 7 6v2"/><path d="M10.564 5.783a3 3 0 0 1 2.872 0l4.794 2.614a3 3 0 0 1 1.564 2.634v4.938a3 3 0 0 1-1.564 2.634l-4.794 2.614a3 3 0 0 1-2.872 0l-4.795-2.614a3 3 0 0 1-1.563-2.634V11.03a3 3 0 0 1 1.563-2.634z"/><path d="M11.146 11.523c.38-.682.57-1.023.854-1.023s.474.341.854 1.023l.098.176c.108.194.162.29.246.355c.085.063.19.087.4.135l.19.043c.738.167 1.107.25 1.195.533c.088.282-.164.576-.667 1.164l-.13.152c-.143.168-.215.251-.247.355s-.021.214 0 .438l.02.203c.076.784.114 1.177-.115 1.351c-.23.175-.576.016-1.267-.302l-.178-.083c-.197-.09-.295-.135-.399-.135s-.202.045-.399.135l-.178.083c-.691.318-1.037.477-1.267.302c-.23-.174-.191-.567-.115-1.351l.02-.203c.021-.224.032-.335 0-.438c-.032-.104-.104-.187-.247-.355l-.13-.152c-.503-.588-.755-.882-.667-1.164c.088-.283.457-.366 1.195-.533l.19-.043c.21-.048.315-.072.4-.135c.084-.064.138-.161.246-.355z"/></g></svg>
                    </div>
                    <p class="font-semibold">Certificate</p>
                </div>
                <div class="flex items-center gap-[10px]">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M2 5.5a3.5 3.5 0 1 1 5.898 2.549a5.51 5.51 0 0 1 3.034 4.084a.75.75 0 1 1-1.482.235a4 4 0 0 0-7.9 0a.75.75 0 0 1-1.482-.236A5.5 5.5 0 0 1 3.102 8.05A3.5 3.5 0 0 1 2 5.5M11 4a3.001 3.001 0 0 1 2.22 5.018a5 5 0 0 1 2.56 3.012a.749.749 0 0 1-.885.954a.75.75 0 0 1-.549-.514a3.51 3.51 0 0 0-2.522-2.372a.75.75 0 0 1-.574-.73v-.352a.75.75 0 0 1 .416-.672A1.5 1.5 0 0 0 11 5.5A.75.75 0 0 1 11 4m-5.5-.5a2 2 0 1 0-.001 3.999A2 2 0 0 0 5.5 3.5"/></svg>
                    </div>
                    <p class="font-semibold">{{$course->students->count()}} students</p>
                </div>
                <div class="flex items-center gap-[10px]">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6h-3V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v1H5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3m-9-1h4v1h-4Zm10 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5.61L8.68 14A1.2 1.2 0 0 0 9 14h6a1.2 1.2 0 0 0 .32-.05L20 12.39Zm0-7.72L14.84 12H9.16L4 10.28V9a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1Z"/></svg>
                    </div>
                    <p class="font-semibold">Job-Guarantee</p>
                </div>
            </div>
        </div>
        <div class="max-w-[1100px] w-full mx-auto mt-10 tablink-container flex gap-10 px-4 sm:p-0 no-scrollbar overflow-x-scroll">
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('About', this)"  id="defaultOpen">About</div>
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Resources', this)">Resources</div>
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Reviews', this)">Reviews</div>
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Discussions', this)">Discussions</div>
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Rewards', this)">Rewards</div>
        </div>
    
    </section>
    </div>
    <div class="bg-[#F5F8FA] py-[50px]">
            <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-[70px]">
                <div class="flex gap-[50px]">
                    <div class="tabs-container w-[700px] flex shrink-0">
                        <div id="About" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Grow Your Career</h3>
                                <p class="font-medium leading-[30px]">
                                {{$course->about}}
                            </p>
                            
                                <div class="grid grid-cols-2 gap-x-[30px] gap-y-5">

                                    @forelse ($course->course_keypoints as $keypoint)
                                    <div class="benefit-card flex items-center gap-3">
                                        <div class="w-6 h-6 flex shrink-0">
                                            <img src="{{asset('assets/icon/tick-circle.svg')}}" alt="icon">
                                        </div>
                                        <p class="font-medium leading-[30px]">{{$keypoint->name}}</p>
                                    </div>
                                    @empty
                                    <p>Kontol</p>
                                   @endforelse
                                </div>
                            </div>
                        </div>
                        <div id="Resources" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Resources</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>
                            </div>
                        </div>
                        <div id="Reviews" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Reviews</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>                        
                            </div>
                        </div>
                        <div id="Discussions" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Discussions</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>                        
                            </div>
                        </div>
                        <div id="Rewards" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Rewards</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>                        
                            </div>
                        </div>
                    </div>
                    <div class="mentor-sidebar flex flex-col gap-[30px] w-full">
                        <div class="mentor-info bg-white flex flex-col gap-4 rounded-2xl p-5">
                            <p class="font-bold text-lg text-left w-full">Teacher</p>
                            <div class="flex items-center justify-between w-full">
                                <div class="flex items-center gap-3">
                                    <a href="" class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{Storage::url($course->teacher->user->avatar)}}" class="w-full h-full object-cover" alt="photo">
                                    </a>
                                    <div class="flex flex-col gap-[2px]">
                                        <a href="" class="font-semibold">{{$course->teacher->user->name}}</a>
                                        <p class="text-sm text-[#6D7786]">{{$course->teacher->user->occupation}}</p>
                                    </div>
                                </div>
                                <a href="" class="p-[4px_12px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">Follow</a>
                            </div>
                        </div>
                        <div class="bg-white flex flex-col gap-5 rounded-2xl p-5">
                        <p class="font-bold text-lg text-left w-full">Certificate awaits : </p>
                            
                            <div class="flex items-center gap-3">
                                <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{asset('assets/icon/Group 7.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col gap-[2px]">
                                    <div class="font-semibold">Laravel Beginners</div>
                                    <p class="text-sm text-[#6D7786]">1,256 earned</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{asset('assets/icon/Group 7-1.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col gap-[2px]">
                                    <div class="font-semibold">Database Expert</div>
                                    <p class="text-sm text-[#6D7786]">392 earned</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{asset('assets/icon/Group 7-2.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col gap-[2px]">
                                    <div class="font-semibold">Quick Learner</div>
                                    <p class="text-sm text-[#6D7786]">3,145 earned</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    
   <!-- FAQ -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:pt-32 mx-auto">
  <!-- Grid -->
  <div class="grid md:grid-cols-5 gap-10">
    <div class="md:col-span-2">
      <div class="max-w-xs">
        <h2 class="text-2xl font-bold md:text-5xl md:leading-tight">Pertanyaan <span class="text-orange-500">Populer</span> </h2>
        <p class="mt-1 hidden md:block text-gray-600">Kami selalu Menjawab dan memberi solusi untuk Pelanggan kami.</p>
      </div>
    </div>
    <!-- End Col -->

    <div class="md:col-span-3">
      <!-- Accordion -->
      <div class="hs-accordion-group divide-y divide-gray-200">
        <div class="hs-accordion pb-3 active" id="hs-basic-with-title-and-arrow-stretched-heading-one">
          <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-expanded="true" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-one">
          Apakah materi di Titikkoma cocok untuk pemula yang sama sekali belum pernah koding?
            <svg class="hs-accordion-active:hidden block shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            <svg class="hs-accordion-active:block hidden shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
          </button>
          <div id="hs-basic-with-title-and-arrow-stretched-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-one">
            <p class="text-gray-600">
            Ya, tentu saja! Materi di Titikkoma disusun khusus untuk pemula. Kami menyediakan panduan langkah demi langkah, sehingga siapa pun bisa mulai belajar koding dengan mudah.
            </p>
          </div>
        </div>

        <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-two">
          <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-two">
          Saya sering kesulitan memahami konsep koding yang kompleks. Apakah ada solusi di Titikkoma?
            <svg class="hs-accordion-active:hidden block shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            <svg class="hs-accordion-active:block hidden shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
          </button>
          <div id="hs-basic-with-title-and-arrow-stretched-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-two">
            <p class="text-gray-600">
            Di Titikkoma, kami berfokus pada cara penyampaian yang sederhana dan praktis. Kami juga menyediakan contoh-contoh nyata untuk membantu Anda memahami konsep yang rumit dengan lebih mudah.
            </p>
          </div>
        </div>

        <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-three">
          <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-three">
          Apakah saya bisa belajar koding dengan fleksibel di Titikkoma?
            <svg class="hs-accordion-active:hidden block shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            <svg class="hs-accordion-active:block hidden shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
          </button>
          <div id="hs-basic-with-title-and-arrow-stretched-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-three">
            <p class="text-gray-600">
            Tentu saja! Di Titikkoma, Anda bisa belajar kapan saja dan di mana saja. Semua materi tersedia secara online, sehingga Anda bisa belajar sesuai dengan jadwal dan kecepatan Anda sendiri.
            </p>
          </div>
        </div>

        <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-four">
          <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-four">
          Bagaimana jika saya mengalami kesulitan saat mengikuti kursus?
            <svg class="hs-accordion-active:hidden block shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            <svg class="hs-accordion-active:block hidden shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
          </button>
          <div id="hs-basic-with-title-and-arrow-stretched-collapse-four" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-four">
            <p class="text-gray-600">
            Jangan khawatir! Tim dukungan kami selalu siap membantu. Anda bisa menghubungi kami kapan saja jika ada pertanyaan atau kesulitan, dan kami akan segera membantu Anda.
            </p>
          </div>
        </div>

        <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-five">
          <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-five">
          Apakah saya akan mendapatkan sertifikat setelah menyelesaikan kursus?
            <svg class="hs-accordion-active:hidden block shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            <svg class="hs-accordion-active:block hidden shrink-0 size-5 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
          </button>
          <div id="hs-basic-with-title-and-arrow-stretched-collapse-five" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-five">
            <p class="text-gray-600">
            Ya, setiap kursus di Titikkoma dilengkapi dengan sertifikat yang bisa Anda dapatkan setelah menyelesaikan seluruh materi dan tugas. Sertifikat ini bisa menjadi bukti keahlian Anda di bidang koding.
            </p>
          </div>
        </div>

    
      </div>
      <!-- End Accordion -->
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End FAQ -->
    <footer class="mt-auto w-full  py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-neutral-900">
  <!-- Grid -->
  <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-5">
  <a class="flex-none rounded-xl text-2xl inline-block font-bold focus:outline-none focus:opacity-80 ml-10 text-white" >
      <p class=""> <span class="pr-2 text-4xl font-serif text-orange-500">;</span>Titik Koma</p>
      </a>
    <!-- End Col -->

    <ul class="text-center">
      <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300">
        <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-orange-500 focus:outline-none focus:text-gray-800" href="#">
          Home
        </a>
      </li>
      <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300">
        <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-orange-500 focus:outline-none focus:text-gray-800" href="#">
          Pricing
        </a>
      </li>
      <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300">
        <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-orange-500 focus:outline-none focus:text-gray-800" href="#">
          Category
        </a>
      </li> <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300">
      <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-orange-500 focus:outline-none focus:text-gray-800" href="#">
          Courses
        </a>
      </li>
    </ul>
    <!-- End Col -->

    <!-- Social Brands -->
    <div class="md:text-end space-x-2">
      <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
        </svg>
      </a>
      <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
        </svg>
      </a>
      <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </svg>
      </a>
      <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M3.362 10.11c0 .926-.756 1.681-1.681 1.681S0 11.036 0 10.111C0 9.186.756 8.43 1.68 8.43h1.682v1.68zm.846 0c0-.924.756-1.68 1.681-1.68s1.681.756 1.681 1.68v4.21c0 .924-.756 1.68-1.68 1.68a1.685 1.685 0 0 1-1.682-1.68v-4.21zM5.89 3.362c-.926 0-1.682-.756-1.682-1.681S4.964 0 5.89 0s1.68.756 1.68 1.68v1.682H5.89zm0 .846c.924 0 1.68.756 1.68 1.681S6.814 7.57 5.89 7.57H1.68C.757 7.57 0 6.814 0 5.89c0-.926.756-1.682 1.68-1.682h4.21zm6.749 1.682c0-.926.755-1.682 1.68-1.682.925 0 1.681.756 1.681 1.681s-.756 1.681-1.68 1.681h-1.681V5.89zm-.848 0c0 .924-.755 1.68-1.68 1.68A1.685 1.685 0 0 1 8.43 5.89V1.68C8.43.757 9.186 0 10.11 0c.926 0 1.681.756 1.681 1.68v4.21zm-1.681 6.748c.926 0 1.682.756 1.682 1.681S11.036 16 10.11 16s-1.681-.756-1.681-1.68v-1.682h1.68zm0-.847c-.924 0-1.68-.755-1.68-1.68 0-.925.756-1.681 1.68-1.681h4.21c.924 0 1.68.756 1.68 1.68 0 .926-.756 1.681-1.68 1.681h-4.21z"/>
        </svg>
      </a>
    </div>
    <!-- End Social Brands -->
  </div>
  <!-- End Grid -->
</footer> 
    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>  

    <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>