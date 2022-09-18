@include('layouts.app')

    <div class="relative flex justify-center">
      <svg class="flex-shrink-0" width="1750" height="308" viewBox="0 0 1750 308" xmlns="http://www.w3.org/2000/svg">
        <path d="M284.161 308H1465.84L875.001 182.413 284.161 308z" fill="#0369a1" />
        <path d="M1465.84 308L16.816 0H1750v308h-284.16z" fill="#065d8c" />
        <path d="M1733.19 0L284.161 308H0V0h1733.19z" fill="#0a527b" />
        <path d="M875.001 182.413L1733.19 0H16.816l858.185 182.413z" fill="#0a4f76" />
      </svg>
      <h1 class="absolute text-6xl top-20 text-white text-center">Juristify</h1>
      <p class="absolute top-50 text-2xl text-white text-center">Change Password</p>
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
          <aside class="py-6 lg:col-span-3">
            <nav class="space-y-1">
              <!-- Current: "bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700", Default: "border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
              <a href="{{route('user.index')}}" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                <!--
                  Heroicon name: outline/user-circle

                  Current: "text-teal-500 group-hover:text-teal-500", Default: "text-gray-400 group-hover:text-gray-500"
                -->
                <svg class="text-gray-400 group-hover:text-teal-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="truncate"> Profile </span>
              </a>

  <a href="{{route('user.password')}}" class="bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium" >
                <!-- Heroicon name: outline/key -->
                <svg class="text-teal-500 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span class="truncate"> Password </span>
              </a>
              <a href="#" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                <!-- Heroicon name: outline/cog -->
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                </svg>
                <span class="truncate"> My Library </span>
              </a>
            </nav>
          </aside>
        
          <form class="divide-y divide-gray-200 lg:col-span-9" action="{{route('user.updatePassword')}}" method="POST" enctype='multipart/form-data'>
            <!-- Profile section -->
            @csrf
            <div class="py-6 px-4 sm:p-6 lg:pb-8">
              <div>
                <h2 class="text-lg leading-6 font-medium text-gray-900">Change Password</h2>
                <p class="mt-1 text-sm text-gray-500">This information will be not displayed publicly so be careful what you share.</p>
              </div>
              @if (Session::has('msg'))
              <div class=" text-center text-green-600 ">
                 <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                  </div>
              </div>
              @endif
             

              <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">Current Password</label>
                  <input type="password"  name="old_password"  id="first-name"  autocomplete="given-name" class="capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">New Password</label>
                  <input type="password"  name="new_password"  id="last-name"  autocomplete="family-name" class="capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                  <input type="password" name="new_password_confirmation"  id="first-name" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
              </div>
            </div>

         
            <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
              <a href="/profile/change-password">
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