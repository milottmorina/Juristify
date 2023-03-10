@include('layouts.app')

<div class="grid sm:grid-cols-3 grid-cols-1 gap-3 bg-[#d8b64b] sm:h-64 lg:h-48 content-center">
  <div class="flex justify-center">
    <img class="w-36 " src="{{ asset('storyset/Blogging-cuate.png') }}" alt="">
  </div>

  <div>
    <h1 class=" text-6xl text-white text-center mt-4">Juristify</h1>
    <p class=" text-2xl text-white text-center">Blog</p>
  </div>
  <div class="flex justify-center">
    <div data-popover="" id="popover-description" role="tooltip"
      class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 "
      style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 410.4px, 0px);"
      data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
      <div class="p-3 space-y-2">
        <h3 class="font-semibold text-gray-900 ">Activity growth - Incremental</h3>
        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a
          growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
        <h3 class="font-semibold text-gray-900 ">Calculation</h3>
        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in
          period n contain all activities up to period n, plus the activities generated by your community in
          period.</p>
      </div>
      <div data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(0px, 0px, 0px);">
      </div>
    </div>

  </div>
</div>
<section class="text-gray-600 body-font">
  <div class="container lg:px-5 pb-24 mt-4 mx-auto max-w-7x1">
    <div id="msg" class="mt-5 flex justify-center">
      @if (Session::has('msg'))
      <div class="text-center text-green-600 ">
          <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
              role="alert">
              <span class="font-medium">{!! \Session::get('msg') !!}</span>
          </div>
      </div>
      @endif
    </div>
    <div class="m-2.5 w-full flex justify-center">
      <button
      class="block mr-2 text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
      type="button" data-modal-toggle="defaultModal">
      Create Blog
  </button>
  <div id="defaultModal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <div class="relative bg-white rounded-lg shadow ">
              <div
                  class="flex justify-between items-start p-4 rounded-t border-b ">
                  <h3 class="text-xl font-semibold text-gray-900 ">
                      Create a Blog
                  </h3>
                  <button type="button"
                      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
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
              <div class="p-6 space-y-6">
                  <form class="lg:col-span-9"
                      action="{{ route('blog.store') }}" method="POST"
                      enctype='multipart/form-data'>

                      @csrf
                      <div class="py-6 px-4 sm:p-6 lg:pb-8">
                          @if (Session::has('msg'))
                          <div class=" text-center text-green-600 ">
                              <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
                                  role="alert">
                                  <span class="font-medium">{!! \Session::get('msg')
                                      !!}</span>
                              </div>
                          </div>
                          @endif
                          <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-12">
                              <label for="first-name"
                                  class="block text-sm font-medium text-gray-700">Upload Image</label>
                                  <input required id="dropzone-file" type="file"
                                      class="@error('img') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm"
                                      name="img">
                                  @error('img')
                                  <span class="invalid-feedback " role="alert">
                                      <p class="text-xs text-red-600 ml-2">
                                          {{ $message }}</p>
                                  </span>
                                  @enderror
                            </div>
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
                                      <p class="text-xs text-red-600 ml-2">
                                          {{ $message }}</p>
                                  </span>
                                  @enderror
                              </div>
                              <div class="col-span-12 sm:col-span-6">
                                  <label for="first-name"
                                      class="block text-sm font-medium text-gray-700">category</label>
                                  <input required type="text" name="category" id="category"
                                      autocomplete="given-name"
                                      class="@error('category') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                  @error('category')
                                  <span class="invalid-feedback " role="alert">
                                      <p class="text-xs text-red-600 ml-2">
                                          {{ $message }}</p>
                                  </span>
                                  @enderror
                              </div>
                          </div>


                          <div class="mt-6 grid grid-cols-12 gap-6">
                              <div class="col-span-12 sm:col-span-12 ">
                                  <label for="first-name"
                                      class="block text-sm font-medium text-gray-700">Description</label>
                                  <textarea required type="text" rows="3" name="description"
                                      id="first-name" autocomplete="given-name"
                                      class="@error('description') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
</textarea>
                                  @error('description')
                                  <span class="invalid-feedback " role="alert">
                                      <p class="text-xs text-red-600 ml-2">
                                          {{ $message }}</p>
                                  </span>
                                  @enderror
                              </div>

                          </div>
                      </div>

              </div>
              <div
                  class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 ">
                  <button data-modal-toggle="defaultModal" type="submit"
                      class="text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create</button>
                  </form>
                  <button data-modal-toggle="defaultModal" type="button"
                      class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Decline</button>
              </div>
          </div>
      </div>
  </div>
      <form action="{{ route('blog.find') }}" method="GET" role="search">
        <div class="max-w-xl">
          <div class="flex space-x-4">
            <div class="flex rounded-md overflow-hidden w-full">
              <input type="text" name="term" class="w-full rounded-md rounded-r-none" />
              <a href="{{ route('blog.find') }}">
                <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
              </a>
            </div>
          </div>
        </div>
      </form>
      <a href={{ route('blog.view') }}>
        <button class="bg-transparent px-6 text-lg font-semibold py-4 rounded-md">Clear</button></a>
    </div>
    <div class="flex flex-wrap mx-[20px]">

      @foreach ($blogs as $b)
      @php
      $link = explode('/', $b->img);

      @endphp

      <div class="xl:w-1/3 md:w-1/2 p-4">
        <a href="{{ route('blog.show', $b->id) }}">
          <div class="bg-white p-6 rounded-lg shadow-xl">
            <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6"
              src="{{$b->img}}" alt="Image Size 720x400">
            <h3 class="tracking-widest  text-[#d8b64b] text-xs font-medium title-font">
              {{ $b->category }}</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $b->title }}</h2>
            <p class="leading-relaxed text-base"> {{ substr($b->description, 0, 45) }}...</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <div class="grid place-items-center mt-3">
      {{ $blogs->links() }}
    </div>
  </div>
</section>

<script>
      setTimeout(() => {
    const msg = document.getElementById('msg');
    msg.style.display = 'none';
    }, 4500);
</script>
@include('layouts.footer')