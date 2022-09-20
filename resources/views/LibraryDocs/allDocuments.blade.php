
@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
    <div class="bg-[#d8b64b] h-60">
        <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
        <p class="relative top-[50px] text-2xl text-white text-center">Library</p>
    </div>
</div>

<div class="flex overflow-x-scroll p-10 hide-scroll-bar ">
                        
    <div class="flex flex-nowrap md:ml-20 mr-10 ">
        
        
        <div class="inline-flex px-3 ">
         @foreach ($files as $f)
           @php
            $cv = explode('/', $f->dokumenti);
           @endphp
  
   
    

  <div >
<a href="/storage/dokumentet/{{ $cv[2] }}" download>
      <div class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md
hover:shadow-xl transition-shadow duration-300
ease-in-out mx-3.5 flex justify-center items-center">


                    <img class="ml-2" src="{{ asset('/noProfilePhoto/docs.png') }}"
                        width="100px" />
               
                       
                   
                </div>  </a> 
                <h3 class="block text-center text-lg">{{$f->titulli}}</h3>
          
            </div>

                @endforeach
             
        </div> 
       
    </div>  
     
</div>
<div class="flex justify-center items-center p-3">
{{$files->links()}}</div>
    @include('layouts.footer')