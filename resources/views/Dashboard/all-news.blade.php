<title>News</title>
<div>
    @include('layouts.dashboardHeader')
    <div class="flex overflow-hidden bg-white pt-16">
        @include('layouts.sidebarDashboard')
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">

                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                        {{ $nw }}
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">All News</h3>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="flex justify-center pt-4">
                            <form class=""  action="{{ route('news.findDashboard') }}" method="GET" role="search">
                              <div class="max-w-xl">
                                <div class="flex space-x-4">
                                  <div class="flex rounded-md overflow-hidden w-full">
                                    <input type="text" name="term" class="border-2 w-full rounded-md rounded-r-none" />
                                    <a href="{{route('news.findDashboard')}}" >
                                    <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
                                    </a>
                                  </div>
                               
                                </div>
                              </div>
                            </form> 
                              <a href={{route('news.all')}}>
                                  <button class="bg-white px-6 text-lg font-semibold py-4 rounded-md">Clear</button>
                                </a>
                        <button
                            class="ml-5 h-10 block text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button" data-modal-toggle="defaultModal">
                            Create News
                        </button>

                        <!-- Main modal -->
                        <div id="defaultModal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div
                                        class="flex justify-between items-start p-4 rounded-t border-b">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Create News
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-toggle="defaultModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <form class="divide-y divide-gray-200 lg:col-span-9"
                                            action="{{ route('news.store') }}" method="POST"
                                            enctype='multipart/form-data'>

                                            @csrf
                                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="dropzone-file"
                                                        class="flex flex-col justify-center items-center w-full h-32 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                                                        <div
                                                            class="flex flex-col justify-center items-center pt-5 pb-6">
                                                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                                </path>
                                                            </svg>
                                                            <p class="mb-2 text-sm text-gray-500 ">
                                                                <span class="font-semibold">Click to upload</span> or
                                                                drag and drop</p>
                                                            <p class="text-xs text-gray-500 ">PNG, JPG
                                                                (MAX. 4MB)</p>
                                                        </div>
                                                        <input required id="dropzone-file" type="file"
                                                            class="@error('img') is-invalid @enderror hidden"
                                                            name="img">

                                                        @error('img')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                                            </span>
                                                        @enderror
                                                    </label>
                                                </div>

                                                <div class="mt-6 grid grid-cols-12 gap-6">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <label for="first-name"
                                                            class="block text-sm font-medium text-gray-700">Title</label>
                                                        <input required type="text" name="title" id="title"
                                                            autocomplete="given-name"
                                                            class="@error('title') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">

                                                        @error('title')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}
                                                                </p>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <label for="first-name"
                                                            class="block text-sm font-medium text-gray-700">Category</label>
                                                        <input required type="text" name="category" id="category"
                                                            autocomplete="given-name"
                                                            class="@error('category') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                                        @error('category')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}
                                                                </p>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="mt-6 grid grid-cols-12 gap-6">
                                                    <div class="col-span-12 sm:col-span-12 ">
                                                        <label for="first-name"
                                                            class="block text-sm font-medium text-gray-700">Description</label>
                                                        <textarea required type="text" rows="3" name="description" id="first-name" autocomplete="given-name"
                                                            class="@error('description') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                  </textarea>
                                                        @error('description')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}
                                                                </p>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>

                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 ">
                                        <button data-modal-toggle="defaultModal" type="submit"
                                            class="text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create</button>
                                        </form>
                                        <button data-modal-toggle="defaultModal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <section class="text-gray-600 body-font">

                    <div class="container lg:px-5 pb-24 mt-4 mx-auto max-w-7x1">

                        <div class="flex flex-wrap -m-4">

                            @foreach ($news as $n)
                                @php
                                    $link = explode('/', $n->img);
                                    
                                @endphp

                                <div class="xl:w-1/3 md:w-1/2 p-4">
                                    <a data-modal-toggle="defaultModal{{ $n->id }}">
                                        <div class="bg-white p-6 rounded-lg">
                                            <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6"
                                                src="{{ $n->img }}"
                                                alt="Image Size 720x400">
                                            <h3 class="tracking-widest text-[#d9b64c] text-xs font-medium title-font ">
                                                {{ $n->category }} / {{ date('d F, Y', strtotime($n->created_at)) }}
                                            </h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                                @if (strlen($n->title) >= 37)
                                                    {{ substr($n->title, 0, 37) }}...
                                                @else
                                                    {{ $n->title }}
                                                @endif
                                            </h2>
                                            <p class="leading-relaxed text-base">
                                                {{ substr($n->description, 0, 100) }}...</p>
                                        </div>
                                    </a>
                                </div>



                                <!-- Modal toggle -->


                                <!-- Main modal -->
                                <div id="defaultModal{{ $n->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-start p-4 rounded-t border-b">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    {{ $n->title }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                    data-modal-toggle="defaultModal{{ $n->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                                                <button data-modal-toggle="medium-modal{{ $n->id }}"
                                                    type="button"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                                                <button data-modal-toggle="popup-modal{{ $n->id }}"
                                                    type="button"
                                                    class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Delete</button>
                                                <button data-modal-toggle="defaultModal{{ $n->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Decline</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="popup-modal{{ $n->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
                                    aria-hidden="true">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                data-modal-toggle="popup-modal{{ $n->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true"
                                                    class="mx-auto mb-4 w-14 h-14 text-gray-400"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">
                                                    Are you sure you want to delete this?</h3>
                                                <a href="{{ route('news.delete', $n->id) }}">
                                                    <button data-modal-toggle="popup-modal{{ $n->id }}"
                                                        type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </a>
                                                <button data-modal-toggle="popup-modal{{ $n->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="medium-modal{{ $n->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-fullmd:inset-0 h-modal md:h-full justify-center items-center">
                                    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow ">
                                            <!-- Modal header -->

                                            <div
                                                class="flex justify-between items-center p-5 rounded-t border-b ">
                                                <h3 class="text-xl font-medium text-gray-900 ">
                                                    {{ $n->title }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                                    data-modal-toggle="medium-modal{{ $n->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="" action="{{ route('news.update', $n->id) }}"
                                                method="POST" enctype='multipart/form-data'>
                                                <!-- Profile section -->
                                                @csrf
                                                <div class="p-6 space-y-6">
                                                    <img class="lg:h-20 xl:h-30 md:h-30  xs:h-30  rounded  object-cover object-center mb-6"
                                                        src="{{ $n->img }}"
                                                        alt="Image Size 720x400">

                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 ">

                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Image</label>
                                                        <input name="img"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                            type="file">
                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                                                        <input name="title"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                            type="text" value="{{ $n->title }}">
                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">category</label>
                                                        <input name="category"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                            type="text" value="{{ $n->category }}">
                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Your
                                                            Message</label>
                                                        <textarea name="description" id="message" rows="4"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                            placeholder="Your message...">
   {{ $n->description }}
</textarea>

                                                    </p>

                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                                                    <button data-modal-toggle="medium-modal{{ $n->id }}"
                                                        type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Save</button>
                                                    <form>
                                                        <button data-modal-toggle="medium-modal{{ $n->id }}"
                                                            type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Decline</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-center items-center p-3">
                            {{ $news->links() }}
                        </div>
                    </div>
                </section>

        </div>
        </main>


    </div>
    <p class="text-center text-sm text-gray-500 my-10">
        <a href="#" class="hover:underline" target="_blank">Student's Forum</a>. All rights reserved.
    </p>
</div>
<script src="https://buttons.github.io/buttons.js"></script>
<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>

</div>
