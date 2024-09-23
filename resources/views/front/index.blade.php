<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="bg-gray-200 scroll-smooth" style="font-family: Poppins;">
<div class="bg-neutral-900 mt-7 mx-14 rounded-lg" id="home">
  
<!-- <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full py-7 bg-neutral-900 rounded-md"> -->
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
<!-- </header>  -->
  <div class="max-w-5xl mx-auto px-2 xl:px-0 pt-10 lg:pt-10 pb-16 text-center">
    
  <button type="button" class="mb-10 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-orange-500 hover:text-orange-500 focus:outline-none focus:border-orange-500 focus:text-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-orange-500 dark:hover:border-orange-500 dark:focus:text-orange-500 dark:focus:border-orange-500">
  <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 20 20"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M5 9a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 1a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/><path d="M3.854 8.896a.5.5 0 0 1 0 .708l-.338.337A3.47 3.47 0 0 0 2.5 12.394v1.856a.5.5 0 1 1-1 0v-1.856a4.47 4.47 0 0 1 1.309-3.16l.337-.338a.5.5 0 0 1 .708 0m11.792-.3a.5.5 0 0 0 0 .708l.338.337A3.47 3.47 0 0 1 17 12.094v2.156a.5.5 0 0 0 1 0v-2.156a4.47 4.47 0 0 0-1.309-3.16l-.337-.338a.5.5 0 0 0-.708 0"/><path d="M14 9a2 2 0 1 1 0-4a2 2 0 0 1 0 4m0 1a3 3 0 1 1 0-6a3 3 0 0 1 0 6m-4.5 3.25a2.5 2.5 0 0 0-2.5 2.5v1.3a.5.5 0 0 1-1 0v-1.3a3.5 3.5 0 0 1 7 0v1.3a.5.5 0 1 1-1 0v-1.3a2.5 2.5 0 0 0-2.5-2.5"/><path d="M9.5 11.75a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 1a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg>
   Join 2 Million Users
</button>
    <h1 class="font-bold text-white text-5xl md:text-7xl w-4xl">
      <p>Masa Depan untuk Para <span class="bg-gradient-to-r from-white to-orange-400 to-70% bg-clip-text text-transparent">Programmer!</span></p>
    </h1>
    <div class="max-w-5xl mt-10">
      <p class="mt-5 text-neutral-400 text-xl">
        <span class="text-orange-500 font-serif text-3xl">;</span>
Titik Koma adalah platform penyedia kursus belajar ngoding secara online yang dapat diakses dimana saja dan kapan saja.</p>
      </p>
    </div>
  </div>
  <div class="text-center mb-4">
    <a href="#Popular-Courses">
    <button type="button" class="py-4 px-7 inline-flex items-center gap-x-2 mr-5 text-medium font-semibold rounded-full border border-transparent bg-white text-black hover:bg-gray-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
  Explore Courses
</button>
    </a>
 
<a href="{{route('front.pricing')}}">
<button type="button" class="py-4 px-7 inline-flex items-center gap-x-2 text-medium font-semibold rounded-full  bg-orange-500 text-gray-800 shadow-sm hover:bg-orange-500 focus:outline-none focus:bg-orange-500 disabled:opacity-50 disabled:pointer-events-none">
  Join Us
  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M5 12h14"></path>
    <path d="m12 5 7 7-7 7"></path>
  </svg>
</button>
</a>

  </div>
 
  <!-- Clients -->
<div class="max-w-[85rem] pb-2 pt-1  mx-auto">
  <!-- Title -->
  <div class="mx-auto text-center mt-7">
    <h2 class="text-xl font-semibold md:text-lg  md:leading-tight text-white">Telah didukung oleh Beberapa Perusahaan Ternama</h2>
  </div>
  <!-- End Title -->

  <!-- Grid -->
  <div class="my-8 md:my-16 grid grid-cols-3 sm:flex sm:justify-center gap-6 sm:gap-x-12 lg:gap-x-20">
    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" width="48" height="55" viewBox="0 0 48 55" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M48 27.3522C48 24.1724 44.0179 21.159 37.9128 19.2902C39.3216 13.0677 38.6955 8.11699 35.9364 6.53199C35.3004 6.1602 34.5569 5.98409 33.7448 5.98409V8.16591C34.1949 8.16591 34.5569 8.25396 34.8602 8.42029C36.1908 9.18344 36.768 12.0893 36.318 15.8267C36.2104 16.7464 36.0342 17.715 35.819 18.7032C33.9013 18.2336 31.8076 17.8716 29.6062 17.6368C28.2854 15.8267 26.9156 14.183 25.5361 12.7448C28.7256 9.78026 31.7195 8.15612 33.7546 8.15612V5.9743C31.064 5.9743 27.5418 7.89196 23.9804 11.2185C20.4191 7.91152 16.8969 6.01344 14.2063 6.01344V8.19526C16.2316 8.19526 19.2352 9.80961 22.4248 12.7546C21.055 14.1928 19.6853 15.8267 18.384 17.6368C16.1729 17.8716 14.0791 18.2336 12.1614 18.713C11.9364 17.7346 11.7701 16.7856 11.6527 15.8756C11.1928 12.1382 11.7603 9.23236 13.0811 8.45942C13.3746 8.28331 13.7562 8.20504 14.2063 8.20504V6.02322C13.3844 6.02322 12.6408 6.19933 11.9951 6.57112C9.24582 8.15612 8.62943 13.097 10.0481 19.3C3.96249 21.1785 0 24.1822 0 27.3522C0 30.532 3.98206 33.5454 10.0872 35.4142C8.67835 41.6368 9.30453 46.5874 12.0636 48.1724C12.6996 48.5442 13.4431 48.7203 14.265 48.7203C16.9556 48.7203 20.4778 46.8027 24.0391 43.4761C27.6005 46.7831 31.1227 48.6812 33.8133 48.6812C34.6351 48.6812 35.3787 48.5051 36.0245 48.1333C38.7737 46.5483 39.3901 41.6074 37.9715 35.4044C44.0375 33.5357 48 30.5222 48 27.3522V27.3522ZM35.2613 20.8263C34.8993 22.0884 34.4492 23.3897 33.9405 24.691C33.5393 23.9083 33.1186 23.1255 32.6588 22.3428C32.2087 21.5601 31.7293 20.797 31.2499 20.0534C32.6392 20.2589 33.9796 20.5132 35.2613 20.8263ZM30.7803 31.2462C30.0171 32.567 29.2344 33.8194 28.4223 34.9837C26.9645 35.1109 25.4872 35.1794 24 35.1794C22.5226 35.1794 21.0453 35.1109 19.5972 34.9935C18.7852 33.8292 17.9927 32.5866 17.2295 31.2756C16.4859 29.9939 15.8108 28.6926 15.1945 27.3816C15.8011 26.0705 16.4859 24.7595 17.2197 23.4778C17.9829 22.1569 18.7656 20.9046 19.5777 19.7403C21.0355 19.6131 22.5128 19.5446 24 19.5446C25.4774 19.5446 26.9547 19.6131 28.4028 19.7305C29.2148 20.8948 30.0073 22.1374 30.7705 23.4484C31.5141 24.7301 32.1892 26.0314 32.8055 27.3424C32.1892 28.6535 31.5141 29.9645 30.7803 31.2462ZM33.9405 29.9743C34.4688 31.2854 34.9189 32.5964 35.2907 33.8683C34.009 34.1814 32.6588 34.4456 31.2597 34.651C31.7391 33.8977 32.2185 33.1247 32.6686 32.3322C33.1186 31.5495 33.5393 30.757 33.9405 29.9743ZM24.0196 40.4138C23.1097 39.4745 22.1998 38.4276 21.2996 37.2829C22.1802 37.322 23.0803 37.3514 23.9902 37.3514C24.9099 37.3514 25.8198 37.3318 26.7102 37.2829C25.8296 38.4276 24.9197 39.4745 24.0196 40.4138ZM16.7403 34.651C15.351 34.4456 14.0106 34.1912 12.7289 33.8781C13.0909 32.616 13.541 31.3147 14.0497 30.0134C14.4509 30.7962 14.8716 31.5789 15.3314 32.3616C15.7913 33.1443 16.2609 33.9074 16.7403 34.651ZM23.9707 14.2907C24.8806 15.2299 25.7905 16.2768 26.6906 17.4215C25.81 17.3824 24.9099 17.353 24 17.353C23.0803 17.353 22.1704 17.3726 21.2801 17.4215C22.1606 16.2768 23.0705 15.2299 23.9707 14.2907ZM16.7305 20.0534C16.2511 20.8068 15.7717 21.5797 15.3216 22.3722C14.8716 23.1549 14.4509 23.9376 14.0497 24.7203C13.5214 23.4093 13.0713 22.0982 12.6996 20.8263C13.9812 20.523 15.3314 20.2589 16.7305 20.0534V20.0534ZM7.87607 32.3029C4.41256 30.8255 2.17203 28.8883 2.17203 27.3522C2.17203 25.8161 4.41256 23.8691 7.87607 22.4015C8.71749 22.0395 9.63718 21.7167 10.5862 21.4134C11.1439 23.331 11.8777 25.3269 12.7876 27.3718C11.8875 29.4068 11.1635 31.393 10.6156 33.3008C9.64696 32.9975 8.72727 32.6649 7.87607 32.3029ZM13.1398 46.2841C11.8092 45.521 11.232 42.6152 11.682 38.8777C11.7896 37.958 11.9658 36.9894 12.181 36.0012C14.0987 36.4708 16.1924 36.8328 18.3938 37.0677C19.7146 38.8777 21.0844 40.5214 22.4639 41.9596C19.2744 44.9242 16.2805 46.5483 14.2454 46.5483C13.8051 46.5385 13.4333 46.4505 13.1398 46.2841V46.2841ZM36.3473 38.8288C36.8072 42.5662 36.2397 45.4721 34.9189 46.245C34.6254 46.4211 34.2438 46.4994 33.7937 46.4994C31.7684 46.4994 28.7648 44.885 25.5752 41.9401C26.945 40.5018 28.3147 38.8679 29.616 37.0579C31.8272 36.8231 33.9209 36.4611 35.8386 35.9816C36.0636 36.9698 36.2397 37.9189 36.3473 38.8288V38.8288ZM40.1141 32.3029C39.2727 32.6649 38.353 32.9878 37.404 33.2911C36.8463 31.3734 36.1125 29.3775 35.2026 27.3326C36.1027 25.2976 36.8267 23.3114 37.3746 21.4036C38.3433 21.7069 39.2629 22.0395 40.1239 22.4015C43.5874 23.8789 45.828 25.8161 45.828 27.3522C45.8182 28.8883 43.5777 30.8353 40.1141 32.3029V32.3029Z" fill="#61DAFB"/>
        <path d="M23.9898 31.8234C26.4592 31.8234 28.4611 29.8216 28.4611 27.3522C28.4611 24.8828 26.4592 22.8809 23.9898 22.8809C21.5204 22.8809 19.5186 24.8828 19.5186 27.3522C19.5186 29.8216 21.5204 31.8234 23.9898 31.8234Z" fill="#61DAFB"/>
      </svg>
    </a>

    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" width="48" height="42" viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1306_13)">
          <path d="M38.3964 0H47.9955L23.9977 41.3961L0 0H18.3583L23.9977 9.5991L29.5172 0H38.3964Z" fill="#41B883"/>
          <path d="M0 0L23.9977 41.3961L47.9955 0H38.3964L23.9977 24.8377L9.47911 0H0Z" fill="#41B883"/>
          <path d="M9.479 0L23.9976 24.9576L38.3963 0H29.5171L23.9976 9.5991L18.3582 0H9.479Z" fill="#35495E"/>
        </g>
        <defs>
          <clipPath id="clip0_1306_13">
            <rect width="48" height="41.4336" fill="white"/>
          </clipPath>
        </defs>
      </svg>
    </a>

    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" width="48" height="51" viewBox="0 0 48 51" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1314_2)">
          <path d="M0.0193481 8.53515L23.6078 0.130676L47.8314 8.38572L43.9092 39.5943L23.6078 50.8377L3.62395 39.7437L0.0193481 8.53515Z" fill="#E23237"/>
          <path d="M47.8314 8.38572L23.6078 0.130676V50.8377L43.9092 39.6131L47.8314 8.38572V8.38572Z" fill="#B52E31"/>
          <path d="M23.6451 6.05121L8.94678 38.754L14.4376 38.6606L17.3886 31.2832H30.5742L33.8053 38.754L39.0533 38.8473L23.6451 6.05121ZM23.6826 16.5288L28.6505 26.9129H19.3121L23.6826 16.5288Z" fill="white"/>
        </g>
        <defs>
          <clipPath id="clip0_1314_2">
            <rect width="48" height="50.9987" fill="white"/>
          </clipPath>
        </defs>
      </svg>
    </a>
    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.7298 40.1472C14.695 40.0857 14.6639 40.0221 14.6368 39.9568C14.4497 39.5235 14.3922 39.0453 14.4713 38.58H3.39139L19.8574 9.60244L25.2634 19.1057L26.8305 16.3324L22.1181 8.0309C21.8923 7.60574 21.5635 7.24396 21.1618 6.97863C20.7601 6.71331 20.2983 6.5529 19.8186 6.51208C19.3399 6.53384 18.877 6.68951 18.4824 6.96138C18.0878 7.23325 17.7774 7.6104 17.5865 8.04994L0.905195 37.3791C0.655848 37.7931 0.512082 38.2622 0.486543 38.7448C0.461003 39.2275 0.554474 39.7091 0.758732 40.1472C1.01527 40.5518 1.3799 40.8765 1.81137 41.0846C2.24285 41.2927 2.72396 41.3759 3.20026 41.3248H17.1721C16.6957 41.3766 16.2143 41.2938 15.7827 41.0856C15.351 40.8774 14.9865 40.5523 14.7305 40.1472H14.7298Z" fill="#00C492"/>
        <path d="M46.852 37.3783L33.1438 13.2318C32.919 12.8021 32.5895 12.436 32.1858 12.1672C31.7821 11.8984 31.3173 11.7357 30.8341 11.6939C30.356 11.7146 29.8934 11.8693 29.499 12.1403C29.1046 12.4114 28.7943 12.7878 28.6035 13.2266L26.8306 16.3316L28.408 19.1056L30.8488 14.7843L44.4105 38.5793H39.2535C39.3194 38.9726 39.2823 39.3763 39.1459 39.751C39.1171 39.8338 39.0811 39.914 39.0382 39.9905L38.9943 40.0783C38.7141 40.474 38.3408 40.7946 37.9073 41.0118C37.4738 41.2289 36.9935 41.3359 36.5088 41.3233H44.576C45.0607 41.3363 45.5412 41.2295 45.9747 41.0123C46.4083 40.7951 46.7816 40.4743 47.0614 40.0783C47.2824 39.6537 47.3798 39.1756 47.3428 38.6984C47.3058 38.2211 47.1358 37.7638 46.852 37.3783V37.3783Z" fill="#008776"/>
        <path d="M38.9949 40.0791L39.0389 39.9912C39.0815 39.9147 39.1173 39.8346 39.1458 39.7517C39.2823 39.377 39.3193 38.9734 39.2534 38.5801C39.1773 38.1559 39.025 37.749 38.8038 37.3791L28.4181 19.1057L26.8312 16.3324L25.2538 19.1057L14.8718 37.3791C14.6703 37.7534 14.5348 38.1597 14.4713 38.5801C14.3877 39.0442 14.4403 39.5226 14.6228 39.9575C14.6499 40.0228 14.681 40.0864 14.7159 40.1479C14.9725 40.5524 15.3372 40.8769 15.7686 41.0849C16.2001 41.2928 16.6811 41.3759 17.1574 41.3248H36.4941C36.9811 41.3392 37.4641 41.2331 37.9003 41.0159C38.3364 40.7987 38.7122 40.4772 38.9942 40.0798L38.9949 40.0791ZM26.8305 21.8797L36.3235 38.5793H17.3419L26.8305 21.8797Z" fill="#2D4A5D"/>
      </svg>
    </a>
    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22.4295 0.0375632C22.3263 0.0469373 21.9982 0.0797466 21.703 0.103182C14.8927 0.717184 8.51362 4.39183 4.47339 10.0397C2.22361 13.18 0.784692 16.7422 0.240995 20.5153C0.0488258 21.8323 0.0253906 22.2213 0.0253906 24.0071C0.0253906 25.7929 0.0488258 26.1819 0.240995 27.4989C1.54399 36.5028 7.95118 44.0676 16.641 46.8705C18.1971 47.372 19.8375 47.7142 21.703 47.9204C22.4295 48.0001 25.5698 48.0001 26.2963 47.9204C29.5163 47.5642 32.2441 46.7674 34.9345 45.3941C35.3469 45.1832 35.4266 45.1269 35.3704 45.08C35.3329 45.0519 33.5752 42.6943 31.4661 39.8446L27.6321 34.6654L22.8279 27.5552C20.1844 23.6462 18.0096 20.4496 17.9908 20.4496C17.9721 20.4449 17.9533 23.604 17.944 27.4615C17.9299 34.2155 17.9252 34.4873 17.8408 34.6467C17.719 34.8764 17.6252 34.9701 17.4284 35.0732C17.2784 35.1482 17.1472 35.1623 16.4394 35.1623H15.6286L15.413 35.0263C15.2723 34.9373 15.1692 34.8201 15.0989 34.6842L15.0005 34.4733L15.0099 25.0757L15.0239 15.6735L15.1692 15.4907C15.2442 15.3923 15.4036 15.2658 15.5161 15.2048C15.7082 15.1111 15.7832 15.1017 16.5941 15.1017C17.5502 15.1017 17.7096 15.1392 17.958 15.4111C18.0283 15.4861 20.6296 19.4044 23.7418 24.1243C26.854 28.8441 31.1099 35.2888 33.2003 38.4526L36.9968 44.2036L37.189 44.077C38.8903 42.9709 40.6902 41.396 42.115 39.7556C45.1475 36.2731 47.102 32.0266 47.7582 27.4989C47.9504 26.1819 47.9738 25.7929 47.9738 24.0071C47.9738 22.2213 47.9504 21.8323 47.7582 20.5153C46.4552 11.5114 40.048 3.94656 31.3583 1.14371C29.8256 0.646879 28.1945 0.304725 26.3666 0.0984947C25.9166 0.0516243 22.8185 6.68575e-05 22.4295 0.0375632V0.0375632ZM32.2441 14.5393C32.4691 14.6518 32.6519 14.8674 32.7175 15.0923C32.755 15.2142 32.7644 17.8202 32.755 23.6931L32.7409 32.1204L31.2552 29.8425L29.7647 27.5646V21.4386C29.7647 17.478 29.7834 15.2517 29.8115 15.1439C29.8865 14.8814 30.0506 14.6752 30.2756 14.5533C30.4677 14.4549 30.538 14.4455 31.2739 14.4455C31.9676 14.4455 32.0894 14.4549 32.2441 14.5393V14.5393Z" fill="currentColor" class="fill-black"/>
        <path d="M36.7627 44.3067C36.5986 44.4098 36.5471 44.4801 36.6924 44.4004C36.7955 44.3395 36.9642 44.2129 36.9361 44.2083C36.922 44.2083 36.8423 44.2551 36.7627 44.3067ZM36.4393 44.5176C36.3549 44.5832 36.3549 44.5879 36.458 44.5363C36.5142 44.5082 36.5611 44.4754 36.5611 44.466C36.5611 44.4285 36.5377 44.4379 36.4393 44.5176ZM36.2049 44.6582C36.1205 44.7238 36.1205 44.7285 36.2237 44.677C36.2799 44.6488 36.3268 44.616 36.3268 44.6067C36.3268 44.5692 36.3033 44.5785 36.2049 44.6582ZM35.9706 44.7988C35.8862 44.8644 35.8862 44.8691 35.9893 44.8176C36.0455 44.7894 36.0924 44.7566 36.0924 44.7473C36.0924 44.7098 36.069 44.7191 35.9706 44.7988ZM35.6143 44.9863C35.4362 45.08 35.4456 45.1175 35.6237 45.0285C35.7034 44.9863 35.7643 44.9441 35.7643 44.9347C35.7643 44.9019 35.7596 44.9066 35.6143 44.9863Z" fill="currentColor" class="fill-black"/>
      </svg>
    </a>
    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" width="48" height="50" viewBox="0 0 48 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1314_6)">
          <path d="M47.8876 11.3229C47.9054 11.3887 47.9145 11.4565 47.9146 11.5246V22.1123C47.9146 22.2481 47.8788 22.3816 47.8107 22.4992C47.7425 22.6168 47.6446 22.7143 47.5267 22.7819L38.6403 27.8982V38.0391C38.6403 38.3151 38.4936 38.5698 38.2543 38.7088L19.7047 49.3871C19.6622 49.4113 19.6159 49.4267 19.5696 49.4431C19.5522 49.4489 19.5358 49.4595 19.5175 49.4643C19.3878 49.4985 19.2515 49.4985 19.1219 49.4643C19.1006 49.4585 19.0813 49.447 19.0611 49.4392C19.0186 49.4238 18.9742 49.4103 18.9337 49.3871L0.387918 38.7088C0.270102 38.6411 0.172209 38.5436 0.104105 38.426C0.0360015 38.3084 9.33506e-05 38.175 0 38.0391L0 6.27612C0 6.20664 0.00964971 6.1391 0.0270192 6.07348C0.032809 6.05128 0.0463186 6.03102 0.0540383 6.00883C0.0685129 5.9683 0.0820225 5.9268 0.103252 5.88917C0.117726 5.86408 0.138956 5.84382 0.156325 5.82066C0.17852 5.78978 0.198784 5.75793 0.224838 5.73091C0.247032 5.70872 0.275982 5.69232 0.301071 5.67302C0.329055 5.64986 0.354144 5.62477 0.385988 5.60643H0.386953L9.66032 0.267251C9.77774 0.199684 9.91084 0.164124 10.0463 0.164124C10.1818 0.164124 10.3149 0.199684 10.4323 0.267251L19.7057 5.60643H19.7076C19.7385 5.62573 19.7645 5.64986 19.7925 5.67205C19.8176 5.69135 19.8456 5.70872 19.8678 5.72995C19.8948 5.75793 19.9141 5.78978 19.9373 5.82066C19.9537 5.84382 19.9759 5.86408 19.9894 5.88917C20.0116 5.92777 20.0241 5.9683 20.0395 6.00883C20.0473 6.03102 20.0608 6.05128 20.0666 6.07444C20.0843 6.1402 20.0934 6.20801 20.0936 6.27612V26.1149L27.8211 21.6655V11.5236C27.8211 11.4561 27.8307 11.3876 27.8481 11.3229C27.8548 11.2998 27.8674 11.2795 27.8751 11.2573C27.8905 11.2168 27.904 11.1753 27.9253 11.1376C27.9398 11.1126 27.961 11.0923 27.9774 11.0691C28.0005 11.0383 28.0198 11.0064 28.0469 10.9794C28.0691 10.9572 28.097 10.9408 28.1221 10.9215C28.1511 10.8983 28.1762 10.8732 28.207 10.8549H28.208L37.4823 5.51573C37.5997 5.44806 37.7328 5.41245 37.8683 5.41245C38.0038 5.41245 38.1369 5.44806 38.2543 5.51573L47.5277 10.8549C47.5605 10.8742 47.5856 10.8983 47.6145 10.9205C47.6387 10.9398 47.6666 10.9572 47.6888 10.9784C47.7159 11.0064 47.7352 11.0383 47.7583 11.0691C47.7757 11.0923 47.7969 11.1126 47.8104 11.1376C47.8326 11.1753 47.8452 11.2168 47.8606 11.2573C47.8693 11.2795 47.8818 11.2998 47.8876 11.3229V11.3229ZM46.3688 21.6655V12.8611L43.1236 14.7293L38.6403 17.3106V26.1149L46.3697 21.6655H46.3688ZM37.0954 37.5923V28.7821L32.6855 31.3007L20.0926 38.4878V47.381L37.0954 37.5923ZM1.54588 7.61261V37.5923L18.5467 47.38V38.4888L9.66514 33.4622L9.66225 33.4603L9.65839 33.4584C9.62847 33.441 9.60339 33.4159 9.5754 33.3947C9.55128 33.3754 9.52329 33.3599 9.50206 33.3387L9.50013 33.3358C9.47504 33.3117 9.45767 33.2818 9.43645 33.2548C9.41715 33.2287 9.39399 33.2065 9.37855 33.1795L9.37758 33.1766C9.36021 33.1477 9.3496 33.1129 9.33705 33.0801C9.32451 33.0512 9.3081 33.0241 9.30038 32.9933V32.9923C9.29073 32.9556 9.2888 32.917 9.28494 32.8794C9.28108 32.8504 9.27336 32.8215 9.27336 32.7925V12.0621L4.79108 9.47982L1.54588 7.61357V7.61261ZM10.0473 1.82857L2.32075 6.27612L10.0453 10.7237L17.7709 6.27516L10.0453 1.82857H10.0473ZM14.0654 29.585L18.5477 27.0047V7.61261L15.3025 9.48079L10.8192 12.0621V31.4541L14.0654 29.585ZM37.8683 7.07705L30.1428 11.5246L37.8683 15.9721L45.5929 11.5236L37.8683 7.07705ZM37.0954 17.3106L32.6121 14.7293L29.3669 12.8611V21.6655L33.8492 24.2458L37.0954 26.1149V17.3106ZM19.3187 37.1513L30.6504 30.6822L36.3147 27.4495L28.595 23.0048L19.7066 28.1221L11.6057 32.7858L19.3187 37.1513Z" fill="#FF2D20"/>
        </g>
        <defs>
          <clipPath id="clip0_1314_6">
            <rect width="48" height="49.6278" fill="white"/>
          </clipPath>
        </defs>
      </svg>
    </a>
    <a class="shrink-0 transition hover:-translate-y-1" href="#">
      <svg class="size-6 md:size-10 mx-auto sm:mx-0" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <mask id="a" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="70" height="70"><path d="M62 0H8a8 8 0 0 0-8 8v54a8 8 0 0 0 8 8h54a8 8 0 0 0 8-8V8a8 8 0 0 0-8-8Z" fill="#fff"/></mask><g mask="url(#a)"><path d="M69.8 70H.1V8a8 8 0 0 1 8-8h54a8 8 0 0 1 8 8v61.8l-.3.2Zm-12-24.2-.4-.4c-1.3-1.3-3-1.6-4.7-1.4-1.5 0-2.8.8-4 1.8l-.2-.1c0-.6-.2-1-.7-1.2-.4-.2-.9-.2-1.3 0-.5.4-.6.8-.6 1.3v12.8c0 .7.3 1.2.8 1.4 1 .2 1.8-.4 1.8-1.3v-8.3c0-.8.2-1.5.7-2.1 1.2-1.4 2.7-2 4.5-1.8.8.1 1.6.5 2 1.3.5.7.7 1.5.7 2.3v8.7c0 1 1 1.5 1.9 1 .5-.2.7-.7.7-1.3V49a6.3 6.3 0 0 0-1.2-3.1Zm-16.3-1.3c-.3-.1-.6-.2-1-.1-.6.2-1 .7-1 1.4V55a3 3 0 0 1-2 2.4 5 5 0 0 1-3.2.1 3 3 0 0 1-1.8-1.5c-.3-.5-.5-1-.5-1.7v-8.5c0-.8-.5-1.4-1.2-1.4-.9 0-1.5.5-1.5 1.4v8c0 1 .1 2 .5 2.9.7 1.7 2 2.7 3.7 3.3a8.4 8.4 0 0 0 5.9-.6c1.8-1 2.7-2.7 2.8-4.7v-9c0-.6-.3-1-.7-1.2Z" fill="#EFDA4F"/><path d="M57.8 45.8c.7 1 1 2 1.1 3.1l.1 1.9v7.7c0 .6-.2 1-.7 1.4-.9.4-1.9-.2-2-1.1V50c0-.8-.1-1.6-.6-2.3a2.7 2.7 0 0 0-2-1.3c-1.8-.2-3.3.4-4.5 1.8-.5.6-.7 1.3-.7 2v8.4c0 1-.8 1.5-1.8 1.3-.5-.2-.8-.7-.8-1.4V46c0-.6.1-1 .6-1.3.4-.3.9-.3 1.3-.1a1.3 1.3 0 0 1 .7 1.2c0 .1.2.2.2 0 1.2-1 2.5-1.6 4-1.7 1.8-.2 3.4 0 4.7 1.4l.4.4ZM40.5 44.4l1 .1c.5.2.7.7.7 1.2v9c-.1 2-1 3.6-2.8 4.7a8.4 8.4 0 0 1-5.8.6c-1.8-.6-3.1-1.6-3.8-3.3-.4-1-.5-1.9-.5-2.8v-8.1c0-1 .6-1.5 1.5-1.4.7 0 1.2.6 1.2 1.4v8.5c0 .6.2 1.2.5 1.7a3 3 0 0 0 1.8 1.5 5 5 0 0 0 3.3-.1 3 3 0 0 0 1.9-2.4V45.8c0-.7.4-1.2 1-1.4Z" fill="#000"/></g>
      </svg>
    </a>
  </div>
  <!-- End Grid -->
</div>
</div>

<section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Eksplorasi Materi di TitikKoma </h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Temukan bidang minatmu dan jadilah bagian dari kami.</p>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-[30px]">
            <a href="{{route('front.category', 'website-development')}}" class="card flex items-center p-4 gap-3  bg-[#F5F8FA] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/landing-page.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Website Development</p>
            </a>
            <a href="{{route('front.category', 'android-development')}}" class="card flex items-center p-4 gap-3  bg-[#F5F8FA] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/mobile-phone.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Android Development</p>
            </a>
            <a href="{{route('front.category', 'game-development')}}" class="card flex items-center p-4 gap-3  bg-[#F5F8FA] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/game-controller.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Game Development</p>
            </a>
            <a href="{{route('front.category', 'ui-ux')}}" class="card flex items-center p-4 gap-3  bg-[#F5F8FA] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/web-design.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">UI/UX</p>
            </a>
        </div>
       
    </section>
<section id="Popular-Courses" class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Popular Courses</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Berbagai Kelas di <span class="text-orange-500">TitikKoma</span></h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Materi Paling Update dengan Metode Pembelajaan Zero to Hero.</p>
            </div>
        </div>
        <div class="relative">
            <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <button class="btn-prev absolute -right-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <div id="course-slider" class="w-full">
              @forelse($courses as $course)
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="{{route('front.details', $course->slug)}}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{Storage::url($course->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="{{route('front.details', $course->slug)}}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{$course->name}}</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">{{$course->students->count()}} students</p>
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
              <p>
                Belum ada data kelas terbaru.
              </p>
              @endforelse
            </div>
        </div>
    </section>

<!-- Features -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-32 mx-auto">
  <!-- Grid -->
  <div class="lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
    <div class="lg:col-span-7">
      <!-- Grid -->
      <div class="grid grid-cols-12 gap-2 sm:gap-6 items-center lg:-translate-x-10">
        <div class="col-span-4">
          <img class="rounded-xl" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="col-span-3">
          <img class="rounded-xl" src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="col-span-5">
          <img class="rounded-xl" src="https://images.unsplash.com/photo-1600194992440-50b26e0a0309?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->
    </div>
    <!-- End Col -->

    <div class="mt-5 sm:mt-10 lg:mt-0 lg:col-span-5">
      <div class="space-y-6 sm:space-y-8">
        <!-- Title -->
        <div class="space-y-2 md:space-y-4">
          <h2 class="font-bold text-3xl lg:text-4xl text-gray-800">
            Akses Belajar dimanapun dan kapanpun.
          </h2>
          <p class="text-gray-500">
            Ayo Bergabung bersama 2 juta murid diseluruh indonesia untuk dapatkan kelas premium.
          </p>
        </div>
        <!-- End Title -->

        <!-- List -->
        <ul class="space-y-2 sm:space-y-4">
          <li class="flex gap-x-3">
            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-orange-500">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
            <div class="grow">
              <span class="text-sm sm:text-base text-gray-500">
                <span class="font-bold">Peluang Dapat Kerja Lebih tinggi.
            </div>
          </li>

          <li class="flex gap-x-3">
            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-orange-500">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
            <div class="grow">
              <span class="text-sm sm:text-base text-gray-500 font-bold">
                Dapatkan Sertifikat Berlisensi.
              </span>
            </div>
          </li>

          <li class="flex gap-x-3">
            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-orange-500">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
            <div class="grow">
              <span class="text-sm sm:text-base text-gray-500 font-bold">
                Kami Tuntun Sampai Bisa.
              </span>
            </div>
          </li>
        </ul>
        <button type="button" class="py-4 px-7 inline-flex items-center gap-x-2 text-medium font-semibold rounded-full  bg-orange-500 text-white   shadow-sm hover:bg-orange-500 focus:outline-none focus:bg-orange-500 disabled:opacity-50 disabled:pointer-events-none">
Check Pricing
  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M5 12h14"></path>
    <path d="m12 5 7 7-7 7"></path>
  </svg>
</button>
      </div>
    </div>
  </div>
</div>
<!-- Testimonials -->
<div class="overflow-hidden bg-gray-800">
  <div class="relative max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl w-3/4 lg:w-1/2 mb-6 sm:mb-10 md:mb-16">
      <h2 class="text-2xl sm:text-3xl lg:text-5xl text-white font-semibold">
        Apa kata <span class="underline text-orange-500">Mereka</span>?
      </h2>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card -->
      <div class="flex h-auto">
        <div class="flex flex-col bg-white rounded-xl">
          <div class="flex-auto p-4 md:p-6">
            <p class="text-md italic md:text-lg text-gray-800">
              " Belajar koding di platform ini sangat menyenangkan! Materinya mudah dipahami dan langsung bisa diterapkan. Saya merasa kemajuan saya jauh lebih cepat dibandingkan belajar dari sumber lain. "
            </p>
          </div>

          <div class="p-4 bg-gray-100 rounded-b-xl md:px-7">
            <div class="flex items-center gap-x-3">
              <div class="shrink-0">
                <img class="size-8 sm:h-[2.875rem] sm:w-[2.875rem] rounded-full" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
              </div>

              <div class="grow">
                <p class="text-sm sm:text-base font-semibold text-gray-800">
                  Reifan Putra
                </p>
                <p class="text-xs text-gray-500">
                  FrontEnd | Capsule
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex h-auto">
        <div class="flex flex-col bg-white rounded-xl">
          <div class="flex-auto p-4 md:p-6">
            <p class="text-sm italic md:text-lg text-gray-800">
              " Platform ini benar-benar membantu saya memahami dasar-dasar koding. Instruksinya jelas dan terstruktur, membuat belajar jadi lebih mudah. Sangat direkomendasikan untuk pemula!"
            </p>
          </div>

          <div class="p-4 bg-gray-100 rounded-b-xl md:px-7">
            <div class="flex items-center gap-x-3">
              <div class="shrink-0">
                <img class="size-8 sm:h-[2.875rem] sm:w-[2.875rem] rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
              </div>

              <div class="grow">
                <p class="text-sm sm:text-base font-semibold text-gray-800">
                  Fauzan K Tampubolon
                </p>
                <p class="text-xs text-gray-500">
                  Pejabat | Pemerintah Indonesia
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex h-auto">
        <div class="flex flex-col bg-white rounded-xl">
          <div class="flex-auto p-4 md:p-6">
            <p class="text-base italic md:text-lg text-gray-800">
              " Sebelumnya saya merasa koding itu sulit, tapi setelah mengikuti kursus di sini, semuanya terasa lebih sederhana. Pengajarannya praktis dan langsung ke inti permasalahan. "
            </p>
          </div>

          <div class="p-4 bg-gray-100 rounded-b-xl md:px-7">
            <div class="flex items-center gap-x-3">
              <div class="shrink-0">
                <img class="size-8 sm:h-[2.875rem] sm:w-[2.875rem] rounded-full" src="https://images.unsplash.com/photo-1579017331263-ef82f0bbc748?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=900&h=900&q=80" alt="Avatar">
              </div>

              <div class="grow">
                <p class="text-sm sm:text-base font-semibold text-gray-800">
                  M Ambaril
                </p>
                <p class="text-xs text-gray-500">
                  Hacker | Happy customer
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>
    <!-- End Grid -->

    <!-- Grid -->
    <div class="mt-20 grid gap-6 grid-cols-2 sm:gap-12 lg:grid-cols-3 lg:gap-8">
      <!-- Stats -->
      <div>
        <h4 class="text-lg sm:text-xl font-semibold text-white">Bergabung Sebanyak</h4>
        <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-orange-500">81%</p>
        <p class="mt-1 text-gray-400">User Premium setiap tahunnya.</p>
      </div>
      <!-- End Stats -->

      <!-- Stats -->
      <div>
        <h4 class="text-lg sm:text-xl font-semibold text-white">Bisnis & Perusahaan</h4>
        <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-orange-500">100+</p>
        <p class="mt-1 text-gray-400">Mendukung TitikKoma</p>
      </div>
      <!-- End Stats -->

      <!-- Stats -->
      <div>
        <h4 class="text-lg sm:text-xl font-semibold text-white">Pelanggan Puas</h4>
        <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-orange-500">85%</p>
        <p class="mt-1 text-gray-400">Setiap Tahunnya.</p>
      </div>
      <!-- End Stats -->
    </div>
    <!-- End Grid -->

    <!-- SVG Element -->
    <div class="absolute bottom-0 end-0 transform lg:translate-x-32" aria-hidden="true">
      <svg class="w-40 h-auto sm:w-72" width="1115" height="636" viewBox="0 0 1115 636" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.990203 279.321C-1.11035 287.334 3.68307 295.534 11.6966 297.634L142.285 331.865C150.298 333.965 158.497 329.172 160.598 321.158C162.699 313.145 157.905 304.946 149.892 302.845L33.8132 272.418L64.2403 156.339C66.3409 148.326 61.5475 140.127 53.5339 138.026C45.5204 135.926 37.3213 140.719 35.2207 148.733L0.990203 279.321ZM424.31 252.289C431.581 256.26 440.694 253.585 444.664 246.314C448.635 239.044 445.961 229.931 438.69 225.96L424.31 252.289ZM23.0706 296.074C72.7581 267.025 123.056 230.059 187.043 212.864C249.583 196.057 325.63 198.393 424.31 252.289L438.69 225.96C333.77 168.656 249.817 164.929 179.257 183.892C110.144 202.465 54.2419 243.099 7.92943 270.175L23.0706 296.074Z" fill="currentColor" class="fill-orange-500"/>
        <path d="M451.609 382.417C446.219 388.708 446.95 398.178 453.241 403.567L555.763 491.398C562.054 496.788 571.524 496.057 576.913 489.766C582.303 483.474 581.572 474.005 575.281 468.615L484.15 390.544L562.222 299.413C567.612 293.122 566.881 283.652 560.59 278.263C554.299 272.873 544.829 273.604 539.44 279.895L451.609 382.417ZM837.202 559.655C841.706 566.608 850.994 568.593 857.947 564.09C864.9 559.586 866.885 550.298 862.381 543.345L837.202 559.655ZM464.154 407.131C508.387 403.718 570.802 395.25 638.136 410.928C704.591 426.401 776.318 465.66 837.202 559.655L862.381 543.345C797.144 442.631 718.724 398.89 644.939 381.709C572.033 364.734 504.114 373.958 461.846 377.22L464.154 407.131Z" fill="currentColor" class="fill-neutral-900"/>
        <path d="M447.448 0.194357C439.203 -0.605554 431.87 5.43034 431.07 13.6759L418.035 148.045C417.235 156.291 423.271 163.623 431.516 164.423C439.762 165.223 447.095 159.187 447.895 150.942L459.482 31.5025L578.921 43.0895C587.166 43.8894 594.499 37.8535 595.299 29.6079C596.099 21.3624 590.063 14.0296 581.818 13.2297L447.448 0.194357ZM1086.03 431.727C1089.68 439.166 1098.66 442.239 1106.1 438.593C1113.54 434.946 1116.62 425.96 1112.97 418.521L1086.03 431.727ZM434.419 24.6572C449.463 42.934 474.586 81.0463 521.375 116.908C568.556 153.07 637.546 187.063 742.018 200.993L745.982 171.256C646.454 157.985 582.444 125.917 539.625 93.0974C496.414 59.978 474.537 26.1903 457.581 5.59138L434.419 24.6572ZM742.018 200.993C939.862 227.372 1054.15 366.703 1086.03 431.727L1112.97 418.521C1077.85 346.879 956.138 199.277 745.982 171.256L742.018 200.993Z" fill="currentColor" class="fill-white"/>
      </svg>
    </div>
    <!-- End SVG Element -->
  </div>
</div>
<!-- End Testimonials -->

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



<!-- Features -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:pt-14 lg:pb-24 mx-auto">
  <!-- Grid -->
  <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
    <div>
      <!-- Perubahan ukuran gambar dengan max-w-sm -->
      <img class="rounded-xl" src="https://images.unsplash.com/photo-1648737963503-1a26da876aca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=900&h=900&q=80" alt="Features Image">
    </div>
    <!-- End Col -->

    <div class="mt-5 sm:mt-10 lg:mt-0">
      <div class="space-y-6 sm:space-y-8">
        <!-- Title -->
        <div class="space-y-2 md:space-y-4">
          <h1 class="font-semibold text-md text-orange-500">Slot Terbatas</h1>
          <h2 class="font-bold text-3xl lg:text-4xl text-gray-800">
            Ayo Gabung Sebagai Mentor.
            Bagikan Skills & Pengalamanmu.
          </h2>
         
        </div>
        <!-- End Title -->

        <!-- List -->
        <ul class="space-y-2 sm:space-y-4">
          <li class="flex gap-x-3">
            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-orange-500">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
            <div class="grow">
              <span class="text-sm sm:text-base text-gray-500">
                <span class="font-bold">Meningkatkan personal branding
            </div>
          </li>

          <li class="flex gap-x-3">
            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-orange-500">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
            <div class="grow">
            <span class="text-sm sm:text-base text-gray-500">
            <span class="font-bold">Menambah sumber income
            </div>
          </li>

          <li class="flex gap-x-3">
            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-orange-500">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
            <div class="grow">
            <span class="text-sm sm:text-base text-gray-500">
            <span class="font-bold">Mendapatkan projek freelance
              
            </div>
          </li>
        </ul>
        <!-- End List -->
      </div>
      <a href="https://wa.me/085270148232" target="_blank">   <button type="button" class="py-4 px-7 inline-flex items-center text-medium font-semibold rounded-full  bg-orange-500 text-white gap-2 mt-10 shadow-sm " >
Kontak Kami
  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M5 12h14"></path>
    <path d="m12 5 7 7-7 7"></path>
  </svg>
</button></a>
      <form action="">
     
      </form>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Features -->

<!-- End Features -->
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
<!-- <script src="./node_modules/preline/dist/preline.js"></script> -->
<script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>