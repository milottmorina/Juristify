<title>Kycu</title>

@vite('resources/css/app.css')

<!-- component -->
{{-- <div class="text-center mt-24">
    <div class="flex items-center justify-center">
      <img src="{{asset('logo/juristify.png')}}" width="150px">
    </div>
    <h2 class="text-4xl tracking-tight">
       Sign in into your account
    </h2>
    <span class="text-sm">or <a href="{{route('register')}}" class="text-blue-500"> 
       register a new account
    </a>
 </span>
</div>

<div class="flex justify-center my-2 mx-4 md:mx-0">
  
 <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6 drop-shadow-md" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
      @if (Session::has('msg'))
            <div class="alert alert-success text-center text-green-600 relative left-[51px]">
               <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                  <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                </div>
            </div>
            @endif
       <div class="w-full md:w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Email address</label>
          <input placeholder="Email" class="@error('email') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='email' name="email"  required>
         @error('email') is-invalid @enderror
          @error('email')
          <span class="invalid-feedback " role="alert">
              <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
          </span>
      @enderror
        </div>
       <div class="w-full md:w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Password</label>
          <input placeholder="Password" class="@error('password') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='password' name="password" required >
          @error('password')
          <span class="invalid-feedback" role="alert">
              <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
          </span>
      @enderror
        </div>
       <div class="w-full flex items-center justify-between px-3 mb-3 ">
         
          <div class="w-1/2">
             <a href="#" class="text-blue-500 text-sm tracking-tight">Forget your password?</a>
          </div>
       </div>
       <div class="w-full md:w-full px-3 mb-6">
          <button class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Sign in</button>
       </div>
       <div class="mx-auto -mb-6 pb-1">
          <span class="text-center text-xs text-gray-700">or sign up with</span>
       </div>
       <div class="flex items-center w-full mt-2">
          <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
             <button class='appearance-none flex items-center justify-center block w-full bg-gray-100 text-gray-700 shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-gray-200 hover:text-gray-700 focus:outline-none'>
                <svg class="h-6 w-6 fill-current text-gray-700" viewBox="0 0 512 512">
                   <path d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"/>
                </svg>
             </button>
          </div>
          <div class="w-full md:w-1/3 px-3 pt-4 mx-2">
             <button class="appearance-none flex items-center justify-center block w-full bg-gray-100 text-gray-700 shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-gray-200 hover:text-gray-700 focus:outline-none">
                <svg class="h-6 w-6 fill-current text-gray-700" viewBox="0 0 512 512">
                   <path d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"/>
                </svg>
             </button>
          </div>
          <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
             <button class="appearance-none flex items-center justify-center block w-full bg-gray-100 text-gray-700 shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-gray-200 hover:text-gray-700 focus:outline-none">
                <svg class="h-6 w-6 fill-current text-gray-700" viewBox="0 0 512 512">
                   <path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"/>
                </svg>
             </button>
          </div>
       </div>
    </div>
 </form>
</div> --}}

<div class="lg:flex">
   <div class="lg:w-1/2 xl:max-w-screen-sm">
       <div class="py-12 bg-gray-200 lg:bg-white flex justify-center lg:justify-start lg:px-12">
           <div class="cursor-pointer flex items-center">
               <div>
                  <img src="{{asset('logo/juristify.png')}}" width="150px">
               </div>
               <div class="text-2xl text-[#d9b64c] tracking-wide ml-2 font-semibold">Juristify</div>
           </div>
       </div>
       <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
           <h2 class="text-center text-4xl text-[#d9b64c] font-display font-semibold lg:text-left xl:text-5xl
           xl:text-bold">Log in</h2>
           <div class="mt-12">
               <form method="POST" action="{{ route('login') }}">
                  @csrf
                   <div>
                       <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                       <input class="@error('email') is-invalid @enderror w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" name="email" type="email" placeholder="mike@gmail.com">
                       
                       @error('email')
                       <span class="invalid-feedback " role="alert">
                           <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                       </span>
                   @enderror
                     </div>
                   <div class="mt-8">
                       <div class="flex justify-between items-center">
                           <div class="text-sm font-bold text-gray-700 tracking-wide">
                               Password
                           </div>
                           <div>
                               <a class="text-xs font-display font-semibold text-[#d9b64c]
                               cursor-pointer">
                                   Forgot Password?
                               </a>
                           </div>
                       </div>
                       <input class="@error('password') is-invalid @enderror w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" name="password" type="password" placeholder="Enter your password">
                       @error('password')
                       <span class="invalid-feedback " role="alert">
                           <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                       </span>
                   @enderror
                     </div>
                   <div class="mt-10">
                       <button class="bg-[#d9b64c] text-gray-100 p-4 w-full rounded-full tracking-wide
                       font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-opacity-90
                       shadow-lg" type="submit">
                           Log In
                       </button>
                   </div>
               </form>
               <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                   Don't have an account ? <a href="{{route('register')}}" class="cursor-pointer text-[#d9b64c] ">Sign up</a>
               </div>
           </div>
       </div>
   </div>
   <div class="hidden lg:flex items-center justify-center bg-[#d9b64c] flex-1 h-screen">
       <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
           {{--  --}}
           <img src="{{asset('storyset/login-amico.png')}}" >

       </div>
   </div>
</div>