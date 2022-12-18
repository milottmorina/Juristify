@include('layouts.app')


<div class="grid sm:grid-cols-3 grid-cols-1 gap-3 bg-[#d8b64b] sm:h-64 lg:h-48 content-center">
    <div class="flex justify-center">
        <img class="w-36 " src="{{asset('storyset/Uploading-amico.png')}}" alt="" >
    </div>
   
    <div > <h1 class=" text-6xl text-white text-center mt-4">Juristify</h1>
        <p class=" text-2xl text-white text-center">Library</p>
    </div>
    <div class="flex justify-center">        

<div data-popover="" id="popover-description" role="tooltip" class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 410.4px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
    <div class="p-3 space-y-2">
        <h3 class="font-semibold text-gray-900 ">Activity growth - Incremental</h3>
        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
        <h3 class="font-semibold text-gray-900 ">Calculation</h3>
        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
    </div>
    <div data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(0px, 0px, 0px);"></div>
</div>

    </div>
  </div>
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
          type="button" data-modal-toggle="updateModal">
          Upload File
      </button>
    <form  action="{{ route('file.find') }}" method="GET" role="search">
      <div class="max-w-xl">
        <div class="flex space-x-4">
      
          <div class="flex rounded-md overflow-hidden w-full">
            <input type="text" name="term" class="w-full rounded-md rounded-r-none" />
            <a href="{{route('file.find')}}" >
            <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
            </a>
          </div>
        </div>
      </div>
    </form>
    <div id="updateModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div
                class="flex justify-between items-start p-4 rounded-t border-b ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Upload File
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="updateModal">
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
                    action="{{route('file.store')}}" method="POST"
                    enctype='multipart/form-data'>
                    @csrf
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                      <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-12">
                          <label for="first-name"
                          class="block text-sm font-medium text-gray-700">Upload File</label>
                                <input id="dropzone-file" type="file"
                                    class="@error('file') is-invalid @enderror block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm"
                                    name="file">
                                @error('file')
                                <span class="invalid-feedback " role="alert">
                                    <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                </span>
                                @enderror
                        </div>
                      </div>
                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-12">
                                <label for="first-name"
                                    class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title"
                                    autocomplete="given-name"
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
                                <textarea type="text" rows="4" name="description"
                                    id="first-name" autocomplete="given-name"
                                    class=" @error('description') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm"></textarea>

                                @error('description')
                                <span class="invalid-feedback " role="alert">
                                    <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div
                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                <button data-modal-toggle="updateModal" type="submit"
                    class="text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Upload</button>
                
                <button data-modal-toggle="updateModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
           </form> </div>
        </div>
    </div>
</div>
    <a href={{route('all.uploads')}}>
      <button class="bg-transparent px-6 text-lg font-semibold py-4 rounded-md">Clear</button></a>
  </div>
<div class="flex overflow-x-scroll p-10 hide-scroll-bar ">
    <div class="flex flex-nowrap md:ml-20  ">
        <div class="inline-flex px-3 ">
            @foreach ($files as $f)
                @php
                    $photo=explode('/',$f->user->img);
                    $link = explode('/', $f->file);
                @endphp
                <div>
                    <a href="/storage/files/{{ $link[2] }}" download>
                        
                        <div
                            class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md
hover:shadow-xl transition-shadow duration-300
ease-in-out mx-3.5 flex justify-center items-center">
                            <img class="ml-2" src="{{ asset('/noProfilePhoto/docs.png') }}" width="100px" />
                        </div>
                    </a>
                    <h3 class="block text-center text-lg mx-4  font-bold capitalize max-w-[230px]">{{ $f->title }}</h3>
                    @if ($f->user->img!="public/noProfilePhoto/nofoto.jpg")  
                    <div class="flex p-2 ml-3">
                    <img class="w-10 h-10 rounded-full object-cover"  src="/storage/img/{{ $photo[2] }}" alt="Rounded avatar">
                    <p class="capitalize mt-2 ml-1">{{$f->user->name." ".$f->user->surname}}</p>
                    </div>
                    @else
                    <div class="flex p-2 ml-3">
                    <img class="w-10 h-10 rounded-full object-cover" src="{{asset('/noProfilePhoto/'.$photo[2])}}" alt="Rounded avatar">
                    <p class="capitalize mt-2 ml-1">{{$f->user->name." ".$f->user->surname}}</p>
                 </div>
                    @endif
                    <p class="block text-justify mx-4 max-w-[230px]" id="dots{{$f->id}}">  {{substr($f->description,0,20)}}... <button class="text-red-400" id="myBtn{{$f->id}}" onclick="myFunction({{$f->id}})">read more</button>
                    <p  class="block text-justify mx-4 max-w-[230px]" style="display:none" id="more{{$f->id}}"> 
                    {{$f->description}} <button class="text-red-400" id="myBtn{{$f->id}}" onclick="myFunction({{$f->id}})">read less</button>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="flex justify-center items-center p-3">
    {{ $files->links() }}</div>
    
@include('layouts.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function myFunction(id) {
      var dots = document.getElementById("dots"+id);
      var moreText = document.getElementById("more"+id);
      var btnText = document.getElementById("myBtn"+id);
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "read less"; 
        moreText.style.display = "block";
      }
    }
    setTimeout(() => {
    const msg = document.getElementById('msg');
    msg.style.display = 'none';
    }, 4500);
    </script>
