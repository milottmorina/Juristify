@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
    <div class="bg-[#d8b64b] h-44">
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
                            <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be
                                careful what you share.</p>
                        </div>
                    </div>
                    @if (Session::has('msg'))
                    <div class=" text-center text-green-600 ">
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
                            role="alert">
                            <span class="font-medium">{!! \Session::get('msg') !!}</span>
                        </div>
                    </div>
                    @endif
                    <div class="p-4 w-full flex justify-center">
                        <form action="{{ route('file.findMyFile') }}" method="GET" role="search">
                          <div class="max-w-xl">
                            <div class="flex space-x-4">
                              <div class="flex rounded-md overflow-hidden w-full">
                                <input type="text" name="term" class="w-full rounded-md rounded-r-none" />
                                <a href="{{ route('file.findMyFile') }}">
                                  <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </form>
                        <a href={{ route('user.uploads') }}>
                          <button class="bg-transparent px-6 text-lg font-semibold py-4 rounded-md">Clear</button></a>
                      </div>
                    <div class="flex overflow-x-scroll p-10 hide-scroll-bar ">

                        <div class="flex flex-nowrap md:ml-20 mr-10 ">


                            <div class="inline-flex px-3 ">
                                @foreach ($files as $f)
                                @php
                                $cv = explode('/', $f->file);
                                @endphp




                                <div>
                                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{$f->id}}"
                                        class="ml-3 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none"
                                        type="button">
                                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                            </path>
                                        </svg>
                                        Edit & Delete</button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdownDots{{$f->id}}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                        <ul class="py-1 text-sm text-gray-700"
                                            aria-labelledby="dropdownMenuIconButton">
                                            <li>
                                                <a data-modal-toggle="defaultModal{{$f->id}}"
                                                    class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                            </li>
                                            <li>
                                                <a class="block py-2 px-4 hover:bg-gray-100"
                                                    type="button" data-modal-toggle="popup-modal{{$f->id}}">
                                                    Delete
                                                </a>
                                            </li>

                                        </ul>

                                    </div>


                                    <div class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md
               hover:shadow-xl transition-shadow duration-300
              ease-in-out mx-3.5 flex justify-center items-center">

                                        <a href="/storage/dokumentet/{{ $cv[2] }}" download>
                                            <img class="ml-2 justify-center"
                                                src="{{ asset('/noProfilePhoto/docs.png') }}" width="100px" />
                                            <p class="block text-center">{{$f->title}}</p>
                                            @if ($f->status===1)
                                            <div class="text-center">
                                                <h3
                                                    class="tracking-widest rounded  bg-green-400 text-white p-1 text-xs font-medium title-font">
                                                    ACTIVE</h3>
                                            </div>
                                            @else
                                            <div class="text-center">
                                                <h3
                                                    class="tracking-widest rounded  bg-red-400 text-white p-1 text-xs font-medium title-font">
                                                    NON-ACTIVE</h3>
                                            </div>
                                            @endif
                                            <p class="hidden text-center hover:block">{{$f->description}}</p>
                                        </a>

                                    </div>
                                </div>
                                <div id="popup-modal{{$f->id}}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                data-modal-toggle="popup-modal{{$f->id}}">
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
                                                <a href="{{ route('file.destroy', $f->id) }}">
                                                    <button data-modal-toggle="popup-modal{{$f->id}}" type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button></a>
                                                <button data-modal-toggle="popup-modal{{$f->id}}" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal toggle -->


                                <!-- Main modal -->
                                <div id="defaultModal{{$f->id}}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-start p-4 rounded-t border-b">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Edit
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                    data-modal-toggle="defaultModal{{$f->id}}">
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
                                            <form action="{{route('file.update',$f->id)}}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="p-6 space-y-6">
                                                    <div class="flex justify-center items-center w-full">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col justify-center items-center w-full h-40 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                                                            <div
                                                                class="flex flex-col justify-center items-center pt-5 pb-6">
                                                                <svg aria-hidden="true"
                                                                    class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                                    </path>
                                                                </svg>
                                                                <p
                                                                    class="mb-2 text-sm text-gray-500">
                                                                    <span class="font-semibold">Click to upload</span>
                                                                    or drag and drop</p>
                                                                <p class="text-xs text-gray-500">PDF
                                                                    OR DOCX (MAX.
                                                                    2MB)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file"
                                                                class="@error('file') is-invalid @enderror hidden "
                                                                name="file">
                                                            @error('file')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                                            </span>
                                                            @enderror
                                                        </label>

                                                    </div>
                                                    <div class="flex">
                                                        <i class="fa-solid fa-file text-[#d8b64b] mr-1 fs-4"></i><a
                                                            class="fs-4 underline text-[#d8b64b]"
                                                            href="/storage/dokumentet/{{ $cv[2] }}"
                                                            download>{{$f->title}}</a>

                                                    </div>
                                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                                        <div class="col-span-12 sm:col-span-12">
                                                            <label for="first-name"
                                                                class="block text-sm font-medium text-gray-700">Title</label>
                                                            <input type="text" name="title" id="title"
                                                                autocomplete="given-name" value="{{$f->title}}"
                                                                class="@error('title') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">

                                                            @error('title')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                                        <div class="col-span-12 sm:col-span-12 ">
                                                            <label for="first-name"
                                                                class="block text-sm font-medium text-gray-700">Description</label>
                                                            <textarea type="text" rows="4" maxlength="5000"
                                                                name="description" id="first-name"
                                                                autocomplete="given-name"
                                                                class=" @error('description') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">{{$f->description}}</textarea>

                                                            @error('description')
                                                            <span class="invalid-feedback " role="alert">
                                                                <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                                                    <button data-modal-toggle="defaultModal{{$f->id}}" type="submit"
                                                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                                                    <button data-modal-toggle="defaultModal{{$f->id}}" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

@include('layouts.footer')