@include('layouts.app')

<div class="relative flex justify-center bg-teal-600">
    <div class="bg-teal-600 h-80">
        <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
        <p class="relative top-[50px] text-2xl text-white text-center">Recent Uploads</p>
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

                <div class="divide-y divide-gray-200 lg:col-span-9">
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                        <div>
                          <h2 class="text-lg leading-6 font-medium text-gray-900">Recent Uploads</h2>
                          <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                        </div>
                    </div>


                    <div class="flex overflow-x-scroll p-10 hide-scroll-bar ">
                        <div class="flex flex-nowrap md:ml-20 mr-10 ">
                            <div class="inline-flex px-3 ">
                                @for ($i = 0; $i < 6; $i++)
                                    <div
                                        class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md
               hover:shadow-xl transition-shadow duration-300
              ease-in-out mx-3.5 flex justify-center items-center">
                                        <img class="ml-2" src="{{ asset('/noProfilePhoto/docs.png') }}"
                                            width="100px" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

@include('layouts.footer')
