@include('layouts.app')



<div class="max-w-screen-xl mx-auto">

    <!-- header ends here -->
    @php
    $link = explode('/', $blogs->img);
    $linkUser=explode('/',$blogs->user->img);
@endphp
    <main class="">

      <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
        <div class="absolute left-0 bottom-0 w-full h-full z-10"
          style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
        <img src="{{ asset('storage/blog/' . $link[2]) }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
        <div class="p-4 absolute bottom-0 left-0 z-20">
          <p 
            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center text-[#d8b64b] justify-center mb-2">{{$blogs->kategoria}}</p>
          <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
            {{$blogs->titulli}}
          </h2>
          <div class="flex mt-3">
            @if ($blogs->user->img!="public/noProfilePhoto/nofoto.jpg")  
            <img class="h-10 w-10 rounded-full mr-2 object-cover"  src="/storage/img/{{$linkUser[2]}}" alt="Rounded avatar">
            @else
            <img class="h-10 w-10 rounded-full mr-2 object-cover" src="{{asset('/noProfilePhoto/'.$linkUser[2])}}" alt="Rounded avatar">
          
            @endif
 
            <div>
              <p class="font-semibold text-gray-200 text-sm capitalize">{{$blogs->user->emri." ".$blogs->user->mbiemri}}</p>
              <p class="font-semibold text-gray-400 text-xs"> {{date('d F, Y', strtotime($blogs->created_at))}} </p>
            </div>
          </div>
        </div>
      </div>

      <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
        <h2 class="text-4xl font-semibold text-black leading-tight">
          {{$blogs->titulli}}
        </h2>
        <p class="pb-6">{{$blogs->pershkrimi}}</p>
        <hr>
        <h1 class="flex items-start py-2 mx-4" >Drop a Comment</h1>
        
<form method="post" action="{{route('comment.store')}}">
  @if (Session::has('msg'))
  <div class=" text-center text-green-600 ">
     <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">{!! \Session::get('msg') !!}</span> 
      </div>
  </div>
  @endif
  @csrf
  <label for="chat" class="sr-only">Your message</label>
  <div class="flex items-start py-2 bg-gray-50 rounded-lg dark:bg-gray-700">
    <input type="number" class="hidden" name="blog_id" value="{{$blogs->id}}" />
      <textarea id="chat" name="pershkrimi" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
          <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
          <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
          <span class="sr-only">Send message</span>
      </button>
  </div>
</form>
@foreach ($comments as $c)
  
@php
    $linkCommenter=explode('/',$c->user->img);
@endphp
    

        <div class=" text-black dark:text-gray-200 p-4 antialiased flex ">
          @if ($c->user->img!="public/noProfilePhoto/nofoto.jpg")  
                  <img class="h-10 w-10 rounded-full mr-2 object-cover"  src="/storage/img/{{$linkUser[2]}}" alt="Rounded avatar">
  @else
          <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="{{asset('/noProfilePhoto/'.$linkCommenter[2])}}"/>

          @endif
          <div>
            <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
              <div class="font-semibold text-sm leading-relaxed capitalize">{{$c->user->emri." ".$c->user->mbiemri}}</div>
              <div class="text-normal leading-snug md:leading-normal">
                {{$c->pershkrimi}}
            </div>
            </div>
            <div class="flex">
            <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">{{$c->created_at}}</div>
            @if (Auth::user() && Auth::user()->id===$c->user_id)
            <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400"><a class="text-primary">Edit</a></div>
            <div class="text-sm ml-4 mt-0.5 "><a data-modal-toggle="popup-modal{{$c->id}}" class="text-red-600 hover:text-red-900">Delete</a></div>
          @endif
          </div>
           
          </div>
        </div>
        <div id="popup-modal{{$c->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
          <div class="relative p-4 w-full max-w-md h-full md:h-auto">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{$c->id}}">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-6 text-center">
                      <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                      <a href="{{route('comment.delete',$c->id)}}">
                      <button data-modal-toggle="popup-modal{{$c->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          Yes, I'm sure
                      </button></a>
                      <button data-modal-toggle="popup-modal{{$c->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                  </div>
              </div>
          </div>
      </div>
        @endforeach
   

      </div>
      
    </main>
    

   
  </div>



@include('layouts.footer')