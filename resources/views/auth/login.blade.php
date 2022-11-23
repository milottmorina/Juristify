<title>Kycu</title>

@vite('resources/css/app.css')
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
            @if (Session::has('msg'))
            <div class="alert alert-success text-center text-green-600 relative ">
               <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                  <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                </div>
            </div>
            @endif
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
                               <a href="/password/reset" class="text-xs font-display font-semibold text-[#d9b64c]
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