
    <title>Dashboard</title>
    <div>
        @include('layouts.dashboardHeader')
        <div class="flex overflow-hidden bg-white pt-16">
           @include('layouts.sidebarDashboard')
           <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
           <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
              <main>
                 <div class="pt-6 px-4">
                   <h1 class="text-2xl font-bold ml-1">Users</h1>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\information::get()->count() }}
    
                                </span>
                                <h3 class="text-base font-normal text-gray-500">All Informations</h3>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="px-5">
                        <form action="{{ route('info.findDashboard') }}" method="GET" role="search">
                            <div class="flex justify-center">
                               <div class="">
                                <label>Kategoria</label>
                                <select id="small" name="cat" class="block p-2.5 w-full rounded-l z-20 text-sm text-gray-900 bg-gray-50  border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500">
                                   <option></option>
                                    @foreach ($categories as $c)
                                    <option value="{{$c->kategoria}}">{{$c->kategoria}}</option>
                                      @endforeach            
                                  </select></div>
                                  <div class="w-50">
                                    <label>Lokacioni</label>
                                  <select id="small" name="loc" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50  border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500">
                                    <option></option>
                                    @foreach ($citys as $c)
                                     <option value="{{$c->lokacioni}}">{{$c->lokacioni}}</option>
                                       @endforeach            
                                   </select>
                                  </div>
                                
                                <div class="relative w-50">
                                    <label>Titulli i Shpalljes</label>
                                    <input type="search" name="term" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." >
                                    
                                    <a href="{{route('info.findDashboard')}}" >
                                    <button type="submit" class="absolute top-[24px] right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                        </div>
                 </div>
          
                 <div class="pt-6 px-4 pb-12 flex">
                    
                    <div id="card" class="md:w-3/4">
             @foreach ($infos as $i)
                  
                        @php
                        $link = explode('/', $i->img);
                        
                    @endphp
                  
                            <a data-modal-toggle="defaultModal{{$i->id}}" class="flex flex-col items-center bg-white mb-4 rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('storage/info/' . $link[2]) }}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$i->titulli}}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ substr($i->pershkrimi, 0, 237) }}... </p>
                                    <span class="flex items-center justify-start text-gray-500 mt-3">
                                                                
                                        <i class="fa-solid fa-briefcase mr-1"></i>{{' ' . $i->emriKompanis }}
                                        <i class="fa-solid fa-tag mr-1 ml-5"></i>{{ ' ' . $i->kategoria }}
                                        <i class="fa-solid fa-location-pin ml-5"></i>{{ ' ' . $i->lokacioni }}
                               
                                    </span>
                                </div>
                            </a>
            
            
                            
            <!-- Modal toggle -->

  
 
              
              <!-- Main modal -->
              <div id="defaultModal{{$i->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                  <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                          <!-- Modal header -->
                          <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                  {{$i->titulli}}
                              </h3>
                              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$i->id}}">
                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                          </div>
                          <!-- Modal body -->
                          <div class="p-6 space-y-6">
                            <div class="flex justify-center">
                            <img class="object-cover justify-center w-50 rounded-t-lg " src="{{ asset('storage/info/' . $link[2]) }}" alt="">
                           
                        </div>
                         <h1 class="font-bold text-2xl ml-3 text-center">{{$i->titulli}}</h1>
                         <hr>
                         <span class="flex items-center justify-center text-gray-500  ">
                                                                
                            <i class="fa-solid fa-briefcase mr-1"></i>{{' ' . $i->emriKompanis }}
                            <i class="fa-solid fa-tag mr-1 ml-5"></i>{{ ' ' . $i->kategoria }}
                            <i class="fa-solid fa-location-pin ml-5"></i>{{ ' ' . $i->lokacioni }}
                   
                        </span>
                         <hr>
                              <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                {{$i->pershkrimi}}
                            </p>
                            <button data-modal-toggle="popup-modal{{$i->id}}" type="button" class="text-white bg-red-400 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                            <button data-modal-toggle="authentication-modal{{$i->id}}"  type="button" class="text-white bg-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>

                          </div>
                          <!-- Modal footer -->
                          <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                              <button data-modal-toggle="defaultModal{{$i->id}}" type="button" class="text-white bg-[#374151] hover:bg-[#374159] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Mbyll</button>
                          </div>
                      </div>
                  </div>
              </div>


               <div id="popup-modal{{$i->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{$i->id}}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                  <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this?</h3>
                  <a href={{route('info.delete',$i->id)}}>
                  <button data-modal-toggle="popup-modal{{$i->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Yes, I'm sure
                  </button>
                  </a>
                  <button data-modal-toggle="popup-modal{{$i->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
              </div>
          </div>
      </div>
  </div>


  

  
  <!-- Main modal -->
  <div id="authentication-modal{{$i->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal{{$i->id}}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="py-6 px-6 lg:px-8">
                  <form class="space-y-6" method="POST" action="{{route('info.update',$i->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex">
                      <div class="m-1">
                          <label for="titulli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titulli</label>
                          <input type="text" value="{{$i->titulli}}" name="titulli" id="titulli" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required="">
                      </div>
                      <div class="m-1">
                          <label for="emriKompanis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Emri Kompanis</label>
                          <input type="text" value="{{$i->emriKompanis}}" name="emriKompanis" id="emriKompanis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required="">
                      </div>
                    </div>
                      <div class="flex">
                      <div class="m-1">
                        <label for="kategoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kategoria</label>
                        <input type="text" name="kategoria" id="kategoria" value="{{$i->kategoria}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="m-1">
                        <label for="lokacioni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lokacioni</label>
                        <input type="text" name="lokacioni" id="lokacioni" value="{{$i->lokacioni}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                      </div>
                    <div class="flex">
                    <div class="m-1">
                        <label for="dataSkadimit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data Skadimit</label>
                        <input type="number" name="dataSkadimit" value="{{$i->dataSkadimit}}" id="dataSkadimit"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="m-1" >
                        <label for="vende" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vende Te Lira</label>
                        <input type="number" name="vende" id="vende" value="{{$i->vende}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    </div>
                 
                    <div class="m-1">
                        <label for="pershkrimi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pershkrimi</label>
                        <input type="text" name="pershkrimi" id="pershkrimi"  value="{{$i->pershkrimi}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="m-1">
                        <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto</label>
                        <input type="file" name="img" id="img" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                
                    <img class="object-cover w-20 h-20 rounded-t-lg " src="{{ asset('storage/info/' . $link[2]) }}" alt="">

                      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                      
                  </form>
              </div>
          </div>
      </div>
  </div> 
  
  
                        @endforeach
                        <!--/ card-->
                        
            
            
                    </div>
                    <!--/ flex-->
                </div>
              </main>
              <p class="text-center text-sm text-gray-500 my-10">
                 <a href="#" class="hover:underline" target="_blank">Student's Forum</a>. All rights reserved.
              </p>
           </div>
        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
     </div>