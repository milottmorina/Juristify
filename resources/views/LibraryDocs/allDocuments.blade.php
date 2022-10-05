@include('layouts.app')


<div class="grid sm:grid-cols-3 grid-cols-1 gap-3 bg-[#d8b64b] sm:h-64 lg:h-48 content-center">
    <div class="flex justify-center">
        <img class="w-36 " src="{{asset('storyset/Uploading-amico.png')}}" alt="" >
    </div>
   
    <div > <h1 class=" text-6xl text-white text-center mt-4">Juristify</h1>
        <p class=" text-2xl text-white text-center">Library</p>
    </div>
    <div class="flex justify-center">        
<a data-popover-target="popover-description" class="flex items-center text-sm font-light text-white  dark:text-white">What can I find here click me <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="ml-2 w-4 h-4 text-white hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button></a>
<div data-popover="" id="popover-description" role="tooltip" class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 410.4px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
    <div class="p-3 space-y-2">
        <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
    </div>
    <div data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(0px, 0px, 0px);"></div>
</div>

    </div>
  </div>
  <div class="flex justify-center mt-3">
<form class="w-3/5 " action="{{ route('file.find') }}" method="GET" role="search">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
    <div class="relative">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" name="term" id="default-search" class="block p-4 ml-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="     Search title..." required="">
        <a href="{{route('file.find')}}" >
        <button type="submit" class="text-white absolute right-2.5 bottom-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </a>
    </div>
</form>
</div>
<div class="flex overflow-x-scroll p-10 hide-scroll-bar ">
    <div class="flex flex-nowrap md:ml-20 mr-10 ">
        <div class="inline-flex px-3 ">
            
            @foreach ($files as $f)
                @php
                    $cv = explode('/', $f->dokumenti);
                    $photo=explode('/',$f->user->img);
                @endphp
                <div>
                    <a href="/storage/dokumentet/{{ $cv[2] }}" download>
                        <div
                            class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md
hover:shadow-xl transition-shadow duration-300
ease-in-out mx-3.5 flex justify-center items-center">
                            <img class="ml-2" src="{{ asset('/noProfilePhoto/docs.png') }}" width="100px" />
                        </div>
                    </a>
                    <h3 class="block text-center text-lg mx-4  font-bold capitalize max-w-[230px]">{{ $f->titulli }}</h3>
                    @if ($f->user->img!="public/noProfilePhoto/nofoto.jpg")  
                    <div class="flex p-2 ml-3">
                    <img class="w-10 h-10 rounded-full object-cover"  src="/storage/img/{{$photo[2]}}" alt="Rounded avatar">
                    <p class="capitalize mt-2 ml-1">{{$f->user->emri." ".$f->user->mbiemri}}</p>
                    </div>
                    @else
                    <div class="flex p-2 ml-3">
                    <img class="w-10 h-10 rounded-full object-cover" src="{{asset('/noProfilePhoto/'.$photo[2])}}" alt="Rounded avatar">
                    <p class="capitalize mt-2 ml-1">{{$f->user->emri." ".$f->user->mbiemri}}</p>
                 </div>
                    @endif
                    <p class="block text-justify mx-4 max-w-[230px]">{{$f->pershkrimi}}</p>
                    
                  
               
                </div>

            @endforeach
        </div>
    </div>
</div>
<div class="flex justify-center items-center p-3">
    {{ $files->links() }}</div>
@include('layouts.footer')
