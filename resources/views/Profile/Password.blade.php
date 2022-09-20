@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
  <div class="bg-[#d8b64b] h-80">
      <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
<p class="relative top-[50px] text-2xl text-white text-center">Change Password</p>
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