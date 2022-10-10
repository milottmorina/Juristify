@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
  <div class="bg-[#d8b64b] h-44">
      <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
<p class="relative top-[50px] text-2xl text-white text-center">My Profile</p>
</div>

</div>
 
  <header class="relative py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-white">Settings</h1>
    </div>
  </header>

<main class="relative -mt-32">
    <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
          @include('profile/aside')
        
          <form class="divide-y divide-gray-200 lg:col-span-9" 
          action="{{route('user.update',Auth::user()->id)}}" 
          method="POST" enctype='multipart/form-data'>
            <!-- Profile section -->
            @csrf
            <div class="py-6 px-4 sm:p-6 lg:pb-8">
              <div>
                <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
              </div>
              @if (Session::has('msg'))
              <div class=" text-center text-green-600 ">
                 <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                  </div>
              </div>
              @endif
              <div class="mt-6 flex flex-col lg:flex-row">
            

                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                  <p class="text-sm font-medium text-gray-700" aria-hidden="true">Click on photo to change it</p>
                  <div class="mt-1 lg:hidden">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                        <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                      </div>
                      <div class="ml-5 rounded-md shadow-sm">
                        <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                          <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                          </label>
                          <input id="mobile-user-photo" name="img" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>
                  @php
                  $link = explode('/', Auth::user()->img);
                  @endphp
                  <div class="hidden relative rounded-full overflow-hidden lg:block">
                    @if (Auth::user()->img==="public/noProfilePhoto/nofoto.jpg")  
                    <img class="relative rounded-full w-40 h-40 object-cover" src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="">
                    @else
                    <img class="relative rounded-full w-40 h-40 object-cover"  src="/storage/img/{{$link[2]}}" alt="Rounded avatar">
                    @endif
                    <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                      <span>Change</span>
                      <span class="sr-only"> user photo</span>
                      <input type="file" id="desktop-user-photo" name="img" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                    </label>
                  </div>
                </div>
              </div>

              <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input type="text"  name="emri" value="{{Auth::user()->emri}}" id="first-name" disabled autocomplete="given-name" class="capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                  <input type="text"  name="mbiemri" value="{{Auth::user()->mbiemri}}" id="last-name" disabled autocomplete="family-name" class="capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="text" name="email" value="{{Auth::user()->email}}" id="first-name" autocomplete="given-name" class=" @error('email') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                 
                  @error('email')
                  <span class="invalid-feedback " role="alert">
                      <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                  </span>
              @enderror
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Nr. Telefonit</label>
                  <input type="text" name="numriTel" value="{{Auth::user()->numriTel ? Auth::user()->numriTel : 'ska'}}" id="last-name" autocomplete="family-name" class=" @error('numriTel') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                  @error('numriTel')
                  <span class="invalid-feedback " role="alert">
                      <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                  </span>
              @enderror
                </div>

              

                <div class="col-span-12 sm:col-span-6">
                  <label for="company" class="block text-sm font-medium text-gray-700">Rruga</label>
                  <input type="text" name="rruga" value="{{Auth::user()->rruga ? Auth::user()->rruga : 'ska'}}" id="company" autocomplete="organization" class="@error('rruga') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                 
                  @error('rruga')
                  <span class="invalid-feedback " role="alert">
                      <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                  </span>
              @enderror
                </div>
              </div>
            </div>

         
            <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
              <a href="/profile">
                <button type="button" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</button>
              </a>
                <button type="submit" class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </main>

@include('layouts.footer')