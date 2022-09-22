
@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
    <div class="bg-[#d8b64b] h-60">
        <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
        <p class="relative top-[50px] text-2xl text-white text-center">Information</p>
    </div>

</div>
<div class="w-full  shadow p-5 rounded-lg bg-white">
    <div class="relative">
      <div class="absolute flex items-center ml-2 h-full">
        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
        </svg>
      </div>
  
      <input type="text" placeholder="Search by listing, location, bedroom number..." class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
        </div>
  
      <div class="flex items-center justify-between mt-4">
        <p class="font-medium">
          Filters
        </p>
  
        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
          Reset Filter
        </button>
      </div>
  
      <div>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">All Type</option>
            <option value="for-rent">For Rent</option>
            <option value="for-sale">For Sale</option>
          </select>
  
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">Furnish Type</option>
            <option value="fully-furnished">Fully Furnished</option>
            <option value="partially-furnished">Partially Furnished</option>
            <option value="not-furnished">Not Furnished</option>
          </select>
  
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">Any Price</option>
            <option value="1000">RM 1000</option>
            <option value="2000">RM 2000</option>
            <option value="3000">RM 3000</option>
            <option value="4000">RM 4000</option>
          </select>
  
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">Floor Area</option>
            <option value="200">200 sq.ft</option>
            <option value="400">400 sq.ft</option>
            <option value="600">600 sq.ft</option>
            <option value="800 sq.ft">800</option>
            <option value="1000 sq.ft">1000</option>
            <option value="1200 sq.ft">1200</option>
          </select>
        </div>
      </div>

      <div class="pt-6 pb-12 flex">  
        <div id="card" class="md:w-3/4">
         
          <!-- container for all cards -->
          <div class="container w-100 md:w-4/5 mx-auto flex flex-col">
            <!-- card -->
            @foreach ($infos as $i)
              
      
            @php
            $link = explode('/',$i->img);
            
            @endphp
           
      
            
<a data-modal-toggle="defaultModal{{$i->id}}"  class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
  <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('storage/info/'.$link[2])}}" alt="">
  <div class="flex flex-col justify-between p-4 leading-normal">
    <div class="flex justify-between">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$i->titulli}}</h5>
      <p class="justify-end bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-clock"></i>{{" ". $i->dataSkadimit}} dite te mbetura</p></div>  
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{substr($i->pershkrimi, 0, 237)}}...</p>
      <div class="flex justify-start">
        <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-briefcase"></i>{{" ".$i->emriKompanis}}</p>
        <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-tag"></i>{{" ". $i->kategoria}}</p>
        <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-location-dot"></i>{{" ". $i->lokacioni}}</p>
      </div>
     </div>
  
</a>





<!-- Main modal -->
<div id="defaultModal{{$i->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    More Information
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$i->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
              <div class="lg:flex justify-between">
              <div class="lg:flex justify-start">
              <img class="object-cover w-full h-72 rounded-t-lg md:h-auto md:w-36 md:rounded-none md:rounded-l-lg" src="{{asset('storage/info/'.$link[2])}}" alt="">
              <h1 class="font-bold text-2xl relative lg:top-10">{{$i->titulli}}</h1>
            </div>  
            <div class="">
              <p class="lg:justify-end bg-gray-200 rounded p-1  "><i class="fa-solid fa-clock"></i>{{" ". $i->dataSkadimit}} dite te mbetura</p></div>  
            </div>
          </div>
            <div class="flex justify-start ml-6">
              <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-person-circle-plus"></i>{{" ".$i->vende}} vende te lira</p>

              <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-briefcase"></i>{{" ".$i->emriKompanis}}</p>
              <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-tag"></i>{{" ". $i->kategoria}}</p>
              <p class="mr-5 bg-gray-200 rounded h-50 p-1"><i class="fa-solid fa-location-dot"></i>{{" ". $i->lokacioni}}</p>
            </div>
            <p class="font-bold text-base leading-relaxed ml-6 mt-3">{{$i->titulli}}</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 p-4">{{$i->pershkrimi}}</p>
             
            </div>
            <!-- Modal footer -->
           
        </div>
    </div>
</div>

            @endforeach
            <!--/ card-->
          </div><!--/ flex-->
        </div>
        <div>

        </div>
      </div>
    </div>
  

    @include('layouts.footer')