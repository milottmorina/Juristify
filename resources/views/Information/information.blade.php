@include('layouts.app')
<div class="grid sm:grid-cols-3 grid-cols-1 gap-3 bg-[#d8b64b] sm:h-64 lg:h-48 content-center">
    <div class="flex justify-center">
        <img class="w-36 " src="{{asset('storyset/Hiring-amico.png')}}" alt="" >
    </div>
    <div > <h1 class=" text-6xl text-white text-center mt-4">Juristify</h1>
        <p class=" text-2xl text-white text-center">Information</p>
    </div>
    <div class="flex justify-center">        
  <div data-popover="" id="popover-description" role="tooltip" class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 410.4px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
    <div class="p-3 space-y-2">
        <h3 class="font-semibold text-gray-900">Activity growth - Incremental</h3>
        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
        <h3 class="font-semibold text-gray-900">Calculation</h3>
        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
    </div>
    <div data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(0px, 0px, 0px);"></div>
  </div>
    </div>
  </div>
  <section class="text-gray-600 body-font">
    <div class="container lg:px-5 pb-24 mt-4 mx-auto max-w-7x1">
        <div class="m-2.5 w-full flex justify-center">
          <form  action="{{ route('info.find') }}" method="GET" role="search">
            <div class="max-w-xl">
              <div class="flex space-x-4">
                <div class="flex rounded-md overflow-hidden w-full">
                  <input type="text" name="term" class="w-full rounded-md rounded-r-none" />
                  <a href="{{route('info.find')}}" >
                  <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
                  </a>
                </div>
              </div>
            </div>
          </form>
             <a href={{route('infos.view')}}>
                <button class="bg-transparent px-6 text-lg font-semibold py-4 rounded-md">Clear</button></a>
        </div>
        <div class="grid lg:grid-cols-2 gap-4 mt-5">   
@foreach ($infos as $i) 
@php
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
date_default_timezone_set("Europe/Belgrade");
$earlier = new DateTime(date("Y-m-d"));
$later = new DateTime($i->expiration_date);
$pos_diff = $earlier->diff($later)->format("%r%a");
$link=explode('/',$i->img);
@endphp
<a data-modal-toggle="defaultModal{{$i->id}}" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w hover:bg-gray-100">
    <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/storage/info/{{ $link[2] }}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ substr($i->title, 0, 12) }}... </h5>
        <span class="flex justify-between bg-[{{$color}}] text-white p-2 rounded">
         <span class="flex">
                  <i class="fa-solid fa-tag bg-[{{$color}}] ml-2  mt-1 mr-1  text-white"></i>{{' '.$i->category}}
                  <i class="fa-solid fa-circle-nodes bg-[{{$color}}] ml-2  mt-1 mr-1  text-white"></i>{{'  Free places:'}}{{' '.$i->free_places}}
                  <i class="fa-solid fa-calendar-days mt-1 ml-2 mr-1 bg-[{{$color}}] text-white"></i>{{'  Days left:'}} {{$pos_diff }} 
                </span>
        </span>
        <p class="mb-3 font-normal text-gray-700">{{ substr($i->description, 0, 100) }}...<span class="font-bold text-[#374151]">read more</span> </p>
    </div>
</a>
<div id="defaultModal{{$i->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900 ">
                   {{$i->title}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="defaultModal{{$i->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <span class="grid lg:grid-cols-2 lg:gap-1 text-gray-500">

                    <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                                                
                        <i class="fa-solid fa-briefcase mr-1 bg-[{{$color}}] text-white"></i>{{' ' . $i->company_name }}
                    </span>
                    <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                        <i class="fa-solid fa-tag mr-1  bg-[{{$color}}] text-white"></i>{{ ' ' . $i->category }}
                    </span>
                    <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                        <i class="fa-solid fa-location-pin mr-1  bg-[{{$color}}] text-white"></i>{{ ' ' . $i->location }}
                    </span>
                    <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                        <i class="fa-solid fa-calendar-days ml-1 mr-1 bg-[{{$color}}] text-white"></i>{{'  Days left:'}} {{$pos_diff }} 
                    </span>
                    </span>
                 {{$i->description}}
            </div>
            <!-- Modal footer -->
            <div class="p-3">
                <button data-modal-toggle="defaultModal{{$i->id}}" type="button" class="w-full text-white bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">CLOSE</button>          
            </div>
     </div>
    </div>
</div>
@endforeach 
        </div>
        <div class="flex justify-center mt-5">
{{$infos->links()}}
</div>
    </div>
  </section>
@include('layouts.footer')
