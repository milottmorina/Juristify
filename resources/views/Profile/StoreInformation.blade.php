@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
    <div class="bg-[#d8b64b] h-44">
        <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
        <p class="relative top-[50px] text-2xl text-white text-center">Information</p>
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
             

                <form class="divide-y divide-gray-200 lg:col-span-9" action="{{route('info.store')}}" method="POST" enctype='multipart/form-data'>
             
                    @csrf
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                        <div>
                            <h2 class="text-lg leading-6 font-medium text-gray-900">Upload File</h2>
                        </div>
                        @if (Session::has('msg'))
                            <div class=" text-center text-green-600 ">
                                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                    role="alert">
                                    <span class="font-medium">{!! \Session::get('msg') !!}</span>
                                </div>
                            </div>
                        @endif


                        <div class="flex justify-center items-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input required id="dropzone-file" type="file" class="@error('img') is-invalid @enderror hidden" name="img">
                                @error('img')
                                <span class="invalid-feedback " role="alert">
                                    <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                </span>
                            @enderror
                            </label>
                        </div>

                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Title</label>
                                <input required type="text" name="titulli" id="titulli" autocomplete="given-name"
                                    class="@error('titulli') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('titulli')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Emri Kompanis</label>
                                <input required type="text" name="emriKompanis" id="emriKompanis" autocomplete="given-name"
                                    class="@error('titulli') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('emriKompanis')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Kategoria</label>
                                <input required type="text" name="kategoria" id="kategoria" autocomplete="given-name"
                                    class="@error('kategoria') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('kategoria')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Lokacioni</label>
                                <input required type="text" name="lokacioni" id="lokacioni" autocomplete="given-name"
                                    class="@error('lokacioni') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('lokacioni')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Data Skadimit</label>
                                <input required type="number" name="dataSkadimit" id="dataSkadimit" autocomplete="given-name"
                                    class="@error('dataSkadimit') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('dataSkadimit')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Vende te lira</label>
                                <input required type="number" name="vende" id="vende" autocomplete="given-name"
                                    class="@error('vende') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('vende')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6 ">
                                <label for="first-name"
                                    class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea type="text" rows="4" name="pershkrimi" id="first-name" required autocomplete="given-name"
                                    class="@error('pershkrimi') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                  </textarea>
                  @error('pershkrimi')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                        <a href="/profile/create-info">
                            <button type="button"
                                class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</button>
                        </a>
                        <button type="submit"
                            class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')
