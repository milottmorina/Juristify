
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Juristify</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app.f06e8bcd.css') }}"> 
  
</head>
<body>
  <nav class="bg-gray-700  px-2 sm:px-4 ">
    <div class="container flex flex-wrap justify-between items-center mx-auto py-3">
    <a href="/home" class="flex items-center">
        <img src="{{asset('logo/juristify.png')}}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Juristify</span>
    </a>
    @if (Auth::user())  
    <div class="flex items-center md:order-2">
       <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          @php
          $link = explode('/', Auth::user()->img);
          @endphp
          @if (Auth::user()->img!="public/noProfilePhoto/nofoto.jpg")  
          <img class="w-10 h-10 rounded-full object-cover"  src="/storage/img/{{$link[2]}}" alt="Rounded avatar">
          @else
          <img class="w-10 h-10 rounded-full object-cover" src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="Rounded avatar">
          @endif
        </button>
        <!-- Dropdown menu -->
        <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow" id="user-dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 186.4px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
          <div class="py-3 px-4">
            <span class="block text-sm text-gray-900 capitalize">{{Auth::user()->name." ".Auth::user()->surname}}</span>
            <span class="block text-sm font-medium text-gray-500 truncate">{{Auth::user()->email}}</span>
          </div>
          <ul class="py-1" aria-labelledby="user-menu-button">
            <li>
              <a href="{{route('user.index')}}" class="block text-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
            </li>
            @if (Auth::user()->role===1)
            <li>
              <a href="{{route('dashboard.view')}}" class="block text-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
            </li>
            @endif
            <li>
              <form  method="POST" action="{{ route('logout') }}">
              @csrf
                <button class="w-full py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" type="submit" >
                Logout
              </button>
            </form>
            </li>
          </ul>
        </div>      
        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
    <div class="hidden justify-between items-center  w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
      <ul class="flex flex-col p-4  rounded-lg   md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-gray-700 bg-gray-700 md:bg-gray-700 ">
        <li >
          <a href="/home" class="text-base font-bold block pr-4 pl-3 text-white  rounded md:bg-transparent md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="{{route('all.uploads')}}" class="text-base font-bold  block pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 ">Library</a>
        </li>
        <li>
          <a href="{{route('blog.view')}}" class="text-base font-bold block pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Blog</a>
        </li>
        <li>
          <a href="{{route('infos.view')}}" class="text-base font-bold block  pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Information</a>
        </li>
        <li>
          <a href="{{route('news.view')}}" class="text-base font-bold block  pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 ">News</a>
        </li>
        <li>
          <a href="{{route('contact.index')}}" class="text-base font-bold block  pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent  md:p-0 ">Contact</a>
        </li>
        
      </ul>
    </div>
    @endif
    </div>

  </nav>
  <script src="{{ asset('build/assets/app.4c1df604.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>