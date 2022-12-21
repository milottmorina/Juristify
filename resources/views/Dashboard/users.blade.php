 <title>Users</title>
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
                                {{$us}}
                            </span>
                            <h3 class="text-base font-normal text-gray-500">All Users</h3>
                         </div>
                      </div>
                   </div>
                   <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <div class="flex items-center">
                         <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                {{$usNac}}
                            </span>
                            <h3 class="text-base font-normal text-gray-500">Non-active Users </h3>
                         </div>
                      </div>
                   </div>
                   <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <div class="flex items-center">
                         <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                {{$usAc}}
                            </span>
                            <h3 class="text-base font-normal text-gray-500">Active Users</h3>
                         </div>
                      
                      </div>
                   </div>
                </div>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5 bg-white">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white ">
                        <h1 class="p-3 text-lg font-semibold">All Users</h1>
                        <p class="mt-1 text-sm p-3 font-normal text-gray-500 ">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                    </caption>
                    <div class="lg:flex lg:justify-start sm:block">
                        <div class="mb-3 lg:ml-3 xl:w-96 sm:full">
                          <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                            <form action="{{ route('user.find') }}" method="GET" role="search"  class="flex">
                            <input type="search" name="term" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Search by name or surname" aria-label="Search" aria-describedby="button-addon2">
                            <a href="{{route('user.find')}}" >
                            <button class="inline-block px-6 py-2.5 bg-[#374151] hover:bg-[#374151] text-white font-medium text-xs leading-tight uppercase rounded  flex items-center" type="submit" id="button-addon2">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                              </svg>
                            </button></a>
                            </form>
                          </div>
                        </div>
                        <div class="ml-2 ">
                            <form action="{{ route('user.verified') }}" method="GET" role="search" >
                
                            <button type="submit" class="focus:outline-none text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Verified Users</button>
                            </form>
                    </div>
                        <div class="ml-2">
                            <form action="{{ route('user.nonverified') }}" method="GET" role="search" >
                            <button type="submit" class="focus:outline-none text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Not Verified Users</button>
                            </form>
                        </div>
                            <div class="ml-2">
                                <form action="{{ route('user.admin') }}" method="GET" role="search" >
                                <button type="submit" class="focus:outline-none text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Admin Users</button>
                                </form>
                            </div>
                                <div class="ml-2">
                                    <form action="{{ route('user.default') }}" method="GET" role="search" >
                
                                    <button type="submit" class="focus:outline-none text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Default Users</button>
                                    </form>
                                </div>
                      </div>
                    <table class="w-full text-sm text-left text-gray-500 ">
                        @if (Session::has('msg'))
                        <div class=" text-center text-green-600 ">
                           <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg " role="alert">
                              <span class="font-medium">{!! \Session::get('msg') !!}</span> 
                            </div>
                        </div>
                        @endif
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Full Name
                                </th>
                               
                                <th scope="col" class="py-3 px-6 text-center">
                                    Gender
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    University
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Email
                                </th>

                                 <th scope="col" class="py-3 px-6 text-center">
                                    Verified
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Role
                                </th>
                              <th scope="col" class="py-3 px-6 text-center">
                                    Details
                                </th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            @php
                            $link = explode('/', $u->img);
                            $linkId = explode('/',$u->id_card)
                            @endphp
                            <tr class="bg-white border-b ">
                                <td class="py-4 px-6 capitalize text-center">
                                    {{$u->name." ".$u->surname}}
                                </td>
                                 <td class="py-4 px-6 overflow-clip capitalize text-center">
                                    {{$u->gender}}
                                </td>
                                <td class="py-4 px-6 overflow-clip capitalize text-center">
                                    {{$u->university}}
                                </td>
                                <td class="py-4 px-6 overflow-clip">
                                    {{$u->email}}
                                </td>
                                <td class="py-4 px-6 overflow-clip uppercase text-center">
                                    @if($u->verified!=true)
                                    <svg class="w-5 h-5 text-red-500 text-center" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    @else
                                    <svg class="w-5 h-5 text-green-500 text-center" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    @endif
                                </td>
                                <td class="py-4 px-6 overflow-clip uppercase">
                                    @if($u->role!=true)
                                    <p class="bg-red-700 text-white rounded p-1 text-center">USER</p>
                                    @else
                                    <p class="bg-green-700 text-white rounded p-1 text-center">ADMIN</p>
                                    @endif
                                </td>
                               <td>
                                <button class="block text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button" data-modal-toggle="defaultModal{{$u->id}}">
                                    VIEW DETAILS
                                   </button> 
                               </td>
                            </tr>
                
                            <div id="popup-modalAdmin{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="popup-modalAdmin{{$u->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                          <form action="{{route('user.makeadmin',$u->id)}}" method="post">
                                              @csrf
                                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to give admin privileges?</h3>
                                            <button data-modal-toggle="popup-modalAdmin{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes
                                            </button></form>
                                            <button data-modal-toggle="popup-modalAdmin{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div id="popup-modaliUser{{$u->id}}" tabindex="-2" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modaliUser{{$u->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                          <form action="{{route('user.defaultuser',$u->id)}}" method="post">
                                              @csrf
                                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to remove admin privileges?</h3>
                                            <button data-modal-toggle="popup-modaliUser{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes
                                            </button></form>
                                            <button data-modal-toggle="popup-modaliUser{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div id="defaultModal{{$u->id}}" tabindex="-2" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center">
                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <!-- Modal header -->
                                        <div class="flex justify-between items-start p-4 rounded-t border-b">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                Details about {{$u->name." ".$u->surname}}
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal{{$u->id}}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <div class="flex flex-col items-center ">
                                                @if ($u->img!="public/noProfilePhoto/nofoto.jpg")  
                                                <img class="mb-3 w-24 h-24 rounded-full shadow-lg object-cover"  src="{{$u->img}}" alt="Rounded avatar">
                                                @else
                                                <img class="mb-3 w-24 h-24 rounded-full shadow-lg object-cover" src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="Rounded avatar">
                                              
                                                @endif
                                                <h5 class="mb-1 text-xl font-medium text-gray-900">{{$u->name . " ".$u->surname}}</h5>
                                                <div class="flex">
                                                    <span>Email:</span><span class="text-sm text-gray-500 uppercase font-bold mt-0.5 ml-1">
                                                        {{$u->email}}
                                                    </span></div>
                                                    <div class="flex">
                                                        <span>Phone No:</span><span class="text-sm text-gray-500 uppercase font-bold mt-0.5 ml-1">
                                                            {{$u->phoneNo}}
                                                        </span></div>
                                                <div class="flex">
                                                <span>Role:</span><span class="text-sm text-gray-500 uppercase font-bold mt-0.5 ml-1">
                                                    @if($u->role!=true)
                                                    <p class="bg-red-700 text-white rounded p-1 text-center">USER</p>
                                                    @else
                                                    <p class="bg-green-700 text-white rounded p-1 text-center">ADMIN</p>
                                                    @endif    
                                                </span></div>
                                                <div class="flex">
                                                    <span>Verified:</span><span class="text-sm text-gray-500 uppercase font-bold mt-0.5 ml-1">     @if($u->verified!=1)
                                                        <svg class="w-5 h-5 text-red-500 text-center" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        @else
                                                        <svg class="w-5 h-5 text-green-500 text-center" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                        @endif</span></div>
                                                        <span>ID Card:</span>

                                                        <img src="{{$u->id_card}}" width="150px" alt="" alt="id">
                                            
                                        
                                                    
                                                <div class="flex space-x-3 md:mt-6">
                                                    <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white rounded-lg">
                                                        @if ($u->verified!=true)
                                                        <a  data-modal-toggle="popup-modal{{$u->id}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">VERIFY</a>
                                                        @else
                                                        <a data-modal-toggle="popup-modali{{$u->id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-5 py-2.5 mr-2 mb-2 ">UN-VERIFY</a>
                                                        @endif
                                                    </a>
                                                    <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white rounded-lg">
                                                        @if($u->role!=1)
                                                        <a data-modal-toggle="popup-modalAdmin{{$u->id}}" class="focus:outline-none text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">MAKE ADMIN</a>
                                                        @else
                                                        <a data-modal-toggle="popup-modaliUser{{$u->id}}" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">MAKE USER</a>
                                                        @endif  
                                                    </a>
                                                    
                                                    </div>
                                                 
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                                            <button data-modal-toggle="defaultModal{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                  <div id="popup-modal{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                          <div class="relative bg-white rounded-lg shadow">
                              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="popup-modal{{$u->id}}">
                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                              <div class="p-6 text-center">
                                <form action="{{route('user.verifiko',$u->id)}}" method="post">
                                    @csrf
                                  <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                  <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to verify this?</h3>
                                  <button data-modal-toggle="popup-modal{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                      Yes
                                  </button></form>
                                  <button data-modal-toggle="popup-modal{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No</button>
                              </div>
                          </div>
                      </div>
                  </div>
                
                  <div id="popup-modali{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <div class="relative bg-white rounded-lg shadow ">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modali{{$u->id}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                              <form action="{{route('user.cverifiko',$u->id)}}" method="post">
                                  @csrf
                                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to unverify this user?</h3>
                                <button data-modal-toggle="popup-modali{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes
                                </button></form>
                                <button data-modal-toggle="popup-modali{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                  
                            @endforeach
                        </tbody>
                       
                    </table>
                     {{$users->links()}}
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
