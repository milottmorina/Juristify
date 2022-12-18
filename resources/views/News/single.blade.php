@include('layouts.app')



<div class="max-w-screen-xl mx-auto">

    <!-- header ends here -->
    @php
    $link = explode('/', $news->img);
    $linkUser=explode('/',$news->user->img);
@endphp
    <main class="">

      <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
        <div class="absolute left-0 bottom-0 w-full h-full z-10"
          style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
        <img src="/storage/news/{{ $link[2] }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
        <div class="p-4 absolute bottom-0 left-0 z-20">
          <p 
            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center text-[#d8b64b] justify-center mb-2">{{$news->category}}</p>
          <h2 class="text-2xl font-semibold text-gray-100 leading-tight">
            {{$news->title}}
          </h2>
          <div class="flex mt-3">
            @if ($news->user->img!="public/noProfilePhoto/nofoto.jpg")  
            <img class="h-10 w-10 rounded-full mr-2 object-cover"  src="/storage/img/{{ $linkUser[2] }}" alt="Rounded avatar">
            @else
            <img class="h-10 w-10 rounded-full mr-2 object-cover" src="{{asset('/noProfilePhoto/'.$linkUser[2])}}" alt="Rounded avatar">
          
            @endif
 
            <div>
              <p class="font-semibold text-gray-200 text-sm capitalize">{{$news->user->name." ".$news->user->surname}}</p>
              <p class="font-semibold text-gray-400 text-xs"> {{date('d F, Y', strtotime($news->created_at))}} </p>
            </div>
          </div>
        </div>
      </div>

      <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
        <h2 class="text-4xl font-semibold text-black leading-tight">
          {{$news->title}}
        </h2>
        <p class="pb-6">{{$news->description}}</p>

        
      </div>
  
    </main>
    

   
  </div>
@include('layouts.footer')
