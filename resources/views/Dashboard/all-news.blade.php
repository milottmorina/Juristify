
    <title>News</title>
    <div>
        @include('layouts.dashboardHeader')
        <div class="flex overflow-hidden bg-white pt-16">
           @include('layouts.sidebarDashboard')
           <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
           <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
              <main>
                 <div class="pt-6 px-4">
                  
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                    {{ App\Models\news::get()->count() }}
                                </span>
                                <h3 class="text-base font-normal text-gray-500">All News</h3>
                             </div>
                            
                          </div>
                       </div>
                  
                    </div>
                    <div class="flex justify-center pt-4">
                        <form class="w-3/5 " action="{{ route('news.findDashboard') }}" method="GET" role="search">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <input type="search" name="term" id="default-search" class="block p-4 ml-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="     Search title..." required="">
                                <a href="{{route('news.findDashboard')}}" >
                                <button type="submit" class="text-white absolute right-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                </a>
                            </div>
                        </form>
                        
<!-- Modal toggle -->
<button class="ml-5 h-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
    Create News
  </button>
  
  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <form class="divide-y divide-gray-200 lg:col-span-9" action="{{route('news.store')}}" method="POST" enctype='multipart/form-data'>
             
                    @csrf
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                        <div class="flex justify-center items-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col justify-center items-center w-full h-32 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 2MB)</p>
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
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Kategoria</label>
                                <input required type="text" name="kategoria" id="kategoria" autocomplete="given-name"
                                    class="@error('kategoria') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('kategoria')
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
                                <textarea required type="text" rows="3" name="pershkrimi" id="first-name" autocomplete="given-name"
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
                
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                  <button data-modal-toggle="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                 </form> 
                 <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
              </div>
          </div>
      </div>
  </div>
  
                        </div>
                        </div>

                        
                      <section class="text-gray-600 body-font">
                        
                          <div class="container lg:px-5 pb-24 mt-4 mx-auto max-w-7x1">
                          
                            <div class="flex flex-wrap -m-4">
                          
                              @foreach ($news as $n)
                              @php
                              $link = explode('/', $n->img);
                              
                          @endphp
                      
                              <div class="xl:w-1/3 md:w-1/2 p-4"> 
                                 <a data-modal-toggle="defaultModal{{$n->id}}">
                                <div class="bg-white p-6 rounded-lg">
                                  <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="{{ asset('storage/news/' . $link[2]) }}" alt="Image Size 720x400">
                                  <h3 class="tracking-widest text-[#d9b64c] text-xs font-medium title-font ">{{$n->kategoria}} / {{date('d F, Y', strtotime($n->created_at))}}</h3>
                                  <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                    @if (strlen($n->titulli)>=37)
                                    {{substr($n->titulli,0,37)}}... 
                                    @else
                                    {{$n->titulli}}
                                    @endif
                                </h2>
                                  <p class="leading-relaxed text-base"> {{ substr($n->pershkrimi, 0, 100) }}...</p>
                                </div></a>
                              </div>


                              
<!-- Modal toggle -->

 
 <!-- Main modal -->
 <div id="defaultModal{{$n->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
     <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <!-- Modal header -->
             <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                     {{$n->titulli}}
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$n->id}}">
                     <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-6 space-y-6">
               <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="{{ asset('storage/news/' . $link[2]) }}" alt="Image Size 720x400">

                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                  {{$n->pershkrimi}}
               </p>
             </div>
             <!-- Modal footer -->
             <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                 <button data-modal-toggle="medium-modal{{$n->id}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                 <button data-modal-toggle="popup-modal{{$n->id}}" type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Delete</button>
                 <button data-modal-toggle="defaultModal{{$n->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
             </div>
         </div>
     </div>
 </div>
 
 

 
 <div id="popup-modal{{$n->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
     <div class="relative p-4 w-full max-w-md h-full md:h-auto">
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{$n->id}}">
                 <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                 <span class="sr-only">Close modal</span>
             </button>
             <div class="p-6 text-center">
                 <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                 <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this?</h3>
                 <a href="{{ route('news.delete', $n->id) }}">
                 <button data-modal-toggle="popup-modal{{$n->id}}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                     Yes, I'm sure
                 </button>
               </a>
                 <button data-modal-toggle="popup-modal{{$n->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
             </div>
         </div>
     </div>
 </div>


 <div id="medium-modal{{$n->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-fullmd:inset-0 h-modal md:h-full justify-center items-center">
   <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
       <!-- Modal content -->
       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           <!-- Modal header -->

           <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
               <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                   {{$n->titulli}}
               </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="medium-modal{{$n->id}}">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Close modal</span> 
               </button>
           </div>
           <!-- Modal body -->
           <form class="" 
           action="{{route('news.update',$n->id)}}" 
           method="POST" enctype='multipart/form-data'>
             <!-- Profile section -->
             @csrf
           <div class="p-6 space-y-6">
            <img class="lg:h-20 xl:h-30 md:h-30  xs:h-30  rounded  object-cover object-center mb-6" src="{{ asset('storage/news/' . $link[2]) }}" alt="Image Size 720x400">

               <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                  
                  <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Image</label>
                  <input name="img" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="file" >
                  <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Title</label>
               <input name="titulli" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" value="{{$n->titulli}}">
               <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kategoria</label>
                  <input name="kategoria" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" value="{{$n->kategoria}}">
<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
<textarea name="pershkrimi" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message...">
   {{$n->pershkrimi}}
</textarea>

               </p>
             
           </div>
           <!-- Modal footer -->
           <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
               <button data-modal-toggle="medium-modal{{$n->id}}" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
               <form>
               <button data-modal-toggle="medium-modal{{$n->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
           </div>
       </div>
   </div>
</div>
 
                                @endforeach
                        
                             
                             
                            </div>
                            <div class="flex justify-center items-center p-3">
                            {{$news->links()}}
                          </div>
                          </div>
                        </section>
                      
                 </div>
              </main>
       
           
        </div>
        <p class="text-center text-sm text-gray-500 my-10">
            <a href="#" class="hover:underline" target="_blank">Student's Forum</a>. All rights reserved.
         </p>
      </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
        
     </div>