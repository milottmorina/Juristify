
@include('layouts.app')
<div class="grid sm:grid-cols-3 grid-cols-1 gap-3 bg-[#d8b64b] sm:h-64 lg:h-48 content-center">
  <div class="flex justify-center">
      <img class="w-36 " src="{{asset('storyset/News-amico.png')}}" alt="" >
  </div>
 
  <div > <h1 class=" text-6xl text-white text-center mt-4">Juristify</h1>
      <p class=" text-2xl text-white text-center">News</p>
  </div>
  <div class="flex justify-center">        
<div data-popover="" id="popover-description" role="tooltip" class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 410.4px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
  <div class="p-3 space-y-2">
      <h3 class="font-semibold text-gray-900 ">Activity growth - Incremental</h3>
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
          <form  action="{{ route('news.find') }}" method="GET" role="search">
            <div class="max-w-xl">
              <div class="flex space-x-4">
                <div class="flex rounded-md overflow-hidden w-full">
                  <input type="text" name="term" class="w-full rounded-md rounded-r-none" />
                  <a href="{{route('news.find')}}" >
                  <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
                  </a>
                </div>
               
              </div>
            </div>
          </form>
           <a href={{route('news.view')}}>
                <button class="bg-transparent px-6 text-lg font-semibold py-4 rounded-md">Clear</button></a>
        </div>          
       
      <div class="flex flex-wrap mx-[20px]">
    
        @foreach ($news as $n)
        <div class="xl:w-1/3 md:w-1/2 p-4"> 
           <a href="{{route('news.show',$n->id)}}">
          <div class="bg-white p-6 rounded-lg shadow-xl">
            <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full  object-contain object-center mb-6" src="{{$n->img }}" alt="Image Size 720x400">
            <h3 class="tracking-widest text-[#d8b64b] text-xs font-medium title-font ">{{$n->category}} / {{date('d F, Y', strtotime($n->created_at))}}</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4"> @if (strlen($n->title)>=37)
              {{substr($n->title,0,37)}}... 
              @else
              {{$n->title}}
              @endif</h2>
            <p class="leading-relaxed text-base"> {{ substr($n->description, 0, 45) }}...</p>
          </div></a>
        </div>
          @endforeach
  
       
       
      </div>
      <div class="flex justify-center items-center p-3">
        {{$news->links()}}
    </div>
    </div>
  </section>


  @include('layouts.footer')