
    <title>Blogs</title>
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
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">2,340</span>
                                <h3 class="text-base font-normal text-gray-500">New products this week</h3>
                             </div>
                            
                          </div>
                       </div>
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">5,355</span>
                                <h3 class="text-base font-normal text-gray-500">Visitors this week</h3>
                             </div>
                          
                          </div>
                       </div>
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">385</span>
                                <h3 class="text-base font-normal text-gray-500">User signups this week</h3>
                             </div>
                          
                          </div>
                       </div>
                    </div>
                    
                    <div class="divide-y divide-gray-200 lg:col-span-9">
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                            <div>
                              <h2 class="text-lg leading-6 font-medium text-gray-900">Recent Uploads</h2>
                              <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>
                        </div>
                        @if (Session::has('msg'))
                        <div class=" text-center text-green-600 ">
                           <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                              <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                            </div>
                        </div>
                        @endif
                        <div class="flex justify-center pt-4">
                            <form class="w-3/5 " action="{{ route('blog.findDashboard') }}" method="GET" role="search">   
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input type="search" name="term" id="default-search" class="block p-4 ml-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="     Search title..." required="">
                                    <a href="{{route('blog.findDashboard')}}" >
                                    <button type="submit" class="text-white absolute right-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    </a>
                                </div>
                            </form>
                            </div>
                        <div class="flex overflow-x-scroll p-10 hide-scroll-bar ">
                            
                            <div class="flex flex-nowrap md:ml-20 mr-10 ">
                                
                                
                                <div class="inline-flex px-3 ">
                                 @foreach ($blogs as $f)
                                   @php
                                    $cv = explode('/', $f->img); 
                                     $link = explode('/', $f->user->img);
                                   @endphp
                          
                   
                            
                     
                          <div >
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{$f->id}}" class="ml-3 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                              Actions</button>
                              
                              <!-- Dropdown menu -->
                              <div id="dropdownDots{{$f->id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                  <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                    <li> 
                                          <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button" data-modal-toggle="defaultModal{{$f->id}}">
                                        Edit
                                      </a>
                                      <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button" data-modal-toggle="popup-modal{{$f->id}}">
                                        Delete
                                      </a>
                                      <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" >

                                        @if ($f->aktive!='po')
                                        <button class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-modal-toggle="p-modal{{$f->id}}">
                                            Aktivizo
                                          </button>                  
                                            @else
                                          <button class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button" data-modal-toggle="modal-p{{$f->id}}">
                                            C'aktivizo
                                          </button>
                                        @endif
                                      </a>
                                     
                                    </li>
                                    
                                  </ul>
                            
                              </div>
                        
    
                              <div class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md
                   hover:shadow-xl transition-shadow duration-300
                  ease-in-out mx-3.5 flex justify-center items-center">
                  
           <a >
                                            <img class=""  src="{{ asset('storage/blog/' . $cv[2]) }}"
                                                width="100px" />
                                              
                                                </a>
                                                
                                        </div>  
                                        
                                        <p class="block text-center font-bold">{{$f->titulli}}</p>
                                        @if ($f->aktive==="po")
                                        <div class="text-center w-[20%] ml-5">
                                              <h3
                                        class="w-50 tracking-widest rounded  bg-green-400 text-white p-1 text-xs font-medium title-font">
                                      AKTIVE</h3> 
                                    </div>
                                        @else
                                        <div class="text-center w-[30%] ml-5">
                                            <h3
                                      class="tracking-widest rounded  bg-red-400 text-white p-1 text-xs font-medium title-font">
                                    JO AKTIVE</h3>
                                        </div>
                                        @endif
                                        <div class="flex">
                                            
                                            <div class="ml-3">   @if ($f->user->img==="public/noProfilePhoto/nofoto.jpg")  
                                                <img class="relative rounded-full w-10 h-10 bottom-[-7px] object-cover" src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="">
                                                @else
                                                <img class="relative rounded-full w-10 h-10 bottom-[-7px] object-cover"  src="/storage/img/{{$link[2]}}" alt="Rounded avatar">
                                                @endif</div>
                                                <div>
                                        <p class="relative block text-center capitalize bottom-[-15px]">Author: 
                                         
                                            <span class="font-bold">{{$f->user->emri." ".$f->user->mbiemri}}</span></p></div>
                                        </div>
                                        <p class="block text-center p-5 text-justify max-w-[280px]">{{$f->pershkrimi}}</p>
                                    </div>
                                    <div id="popup-modal{{$f->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{$f->id}}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this?</h3>
                                                    <a href="{{ route('blog.delete', $f->id) }}">
                                                    <button data-modal-toggle="popup-modal{{$f->id}}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button></a>
                                                    <button data-modal-toggle="popup-modal{{$f->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="defaultModal{{$f->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Edit
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$f->id}}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form action="{{route('blog.update',$f->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="p-6 space-y-6">
                                                    <div class="flex justify-center items-center w-full">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col justify-center items-center w-full h-40 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                                    </path>
                                                                </svg>
                                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF OR DOCX (MAX.
                                                                    2MB)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file" class="@error('dokumenti') is-invalid @enderror hidden " name="dokumenti">
                                                          @error('dokumenti')
                                                        <span class="invalid-feedback " role="alert">
                                                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                                        </span>
                                                        @enderror </label> 
                                                     
                                                    </div>
                                                    <div class="flex">
                                                    
                                                    <img class=""  src="{{ asset('storage/blog/' . $cv[2]) }}"
                                                    width="100px" />
                                    
                                                   </div>
                                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                                        <div class="col-span-12 sm:col-span-12">
                                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Title</label>
                                                            <input type="text" name="titulli" id="titulli" autocomplete="given-name"
                                                                value="{{$f->titulli}}" class="@error('titulli') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                                                
                                                                @error('titulli')
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
                                                            <textarea type="text" rows="4" name="pershkrimi" id="first-name" autocomplete="given-name"
                                                                class=" @error('pershkrimi') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                             {{$f->pershkrimi}} </textarea>
                                             
                                              @error('pershkrimi')
                                              <span class="invalid-feedback " role="alert">
                                                  <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                              </span>
                                          @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                    <button data-modal-toggle="defaultModal{{$f->id}}" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                                    <button data-modal-toggle="defaultModal{{$f->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                </div>
                                            </form>
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div id="p-modal{{$f->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="p-modal{{$f->id}}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                  <form action="{{route('blog.verifiko',$f->id)}}" method="post">
                                                      @csrf
                                                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">A jeni i sigurt qe doni ta aktivizoni kete dokument?</h3>
                                                    <button data-modal-toggle="p-modal{{$f->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Po, jam i sigurt
                                                    </button>
                                                  </form>
                                                    <button data-modal-toggle="p-modal{{$f->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Jo, anulo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="modal-p{{$f->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modal-p{{$f->id}}">
                                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                  <span class="sr-only">Close modal</span>
                                              </button>
                                              <div class="p-6 text-center">
                                                  <form action="{{route('blog.cverifiko',$f->id)}}" method="post">
                                                      @csrf
                                                  <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">A jeni i sigurt qe doni ta caktivizoni kete file?</h3>
                                                  <button data-modal-toggle="modal-p{{$f->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                      Po, jam i sigurt
                                                  </button>
                                                  </form>
                                                  <button data-modal-toggle="modal-p{{$f->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Jo, anulo</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                        @endforeach
                                        
                                </div>
                        
                            </div> 
                                   
                        </div>
                        {{$blogs->links()}}
                    </div>
                 </div>
              </main>
       
              <p class="text-center text-sm text-gray-500 my-10">
                 <a href="#" class="hover:underline" target="_blank">JURISTIFY</a>. All rights reserved.
              </p>
           </div>
        </div>
  
     </div>
     <script async defer src="https://buttons.github.io/buttons.js"></script>
     <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>