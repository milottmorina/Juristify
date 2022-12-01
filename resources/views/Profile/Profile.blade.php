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
          @include('Profile/aside')
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
                 <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                  </div>
              </div>
              @endif
              @php
              $link2 = explode('/', Auth::user()->id_card);
              @endphp
              <div class="flex flex-col flex-row">
                  <div class="mt-6 flex flex-col lg:flex-row">
                    <div class="border-2 rounded mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                      <p class="text-sm font-medium text-gray-700" aria-hidden="true">Click here to change the profile photo</p>
                      <input type="file" id="desktop-user-photo" name="img" class="inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                    </div>
                  </div>
                  <div class="mt-6 grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Your ID</label>
                  <img class="relative  w-40 h-40 object-cover"  src="/storage/id_kartela/{{$link2[2]}}" alt="Rounded avatar">
                    </div></div>
               
              </div>
              <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input type="text"  name="name" value="{{Auth::user()->name}}" id="first-name" disabled autocomplete="given-name" class="capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                  <input type="text"  name="surname" value="{{Auth::user()->surname}}" id="last-name" disabled autocomplete="family-name" class="capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
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
                  <input type="text" name="phoneNo" value="{{Auth::user()->phoneNo ? Auth::user()->phoneNo : '. . .
                    '}}" id="last-name" autocomplete="family-name" class=" @error('numriTel') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                  @error('phoneNo')
                  <span class="invalid-feedback " role="alert">
                      <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                  </span>
              @enderror
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="company" class="block text-sm font-medium text-gray-700">Street</label>
                  <input type="text" name="street" value="{{Auth::user()->street ? Auth::user()->street : '. . .'}}" id="company" autocomplete="organization" class="@error('rruga') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                 
                  @error('street')
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
                <button type="submit" class="ml-5 bg-gray-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </main>

@include('layouts.footer')
