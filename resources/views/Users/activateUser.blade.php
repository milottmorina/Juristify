@include('layouts.app')


<div class="overflow-x-auto relative shadow-md sm:rounded-lg lg:m-32">
    
    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        <h1 class="p-3 text-lg font-semibold">All Users</h1>
        <p class="mt-1 text-sm p-3 font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
    </caption>
    <div class="lg:flex lg:justify-start sm:block">
        <div class="mb-3 lg:ml-3 xl:w-96 sm:full">
          <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
            <form action="{{ route('user.find') }}" method="GET" role="search"  class="flex">
            <input type="search" name="term" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Search by name or surname" aria-label="Search" aria-describedby="button-addon2" required>
            <a href="{{route('user.find')}}" >
            <button class="inline-block px-6 py-2.5 bg-green-600 hover:bg-green-900 text-white font-medium text-xs leading-tight uppercase rounded  flex items-center" type="submit" id="button-addon2">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button></a>
            </form>
          </div>
          
        </div>
        <div class="ml-2 ">
            <form action="{{ route('user.verified') }}" method="GET" role="search" >

            <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Verified Users</button>
            </form>
    </div>
        <div class="ml-2">
            <form action="{{ route('user.nonverified') }}" method="GET" role="search" >
            <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Not Verified Users</button>
            </form>
        </div>
            <div class="ml-2">
                <form action="{{ route('user.admin') }}" method="GET" role="search" >
                <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Admin Users</button>
                </form>
            </div>
                <div class="ml-2">
                    <form action="{{ route('user.default') }}" method="GET" role="search" >

                    <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Default Users</button>
                    </form>
                </div>
      </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        @if (Session::has('msg'))
        <div class=" text-center text-green-600 ">
           <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
              <span class="font-medium">{!! \Session::get('msg') !!}</span> 
            </div>
        </div>
        @endif
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 text-center">
                    Emri
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Mbiemri
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Data Lindjes
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Universiteti
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Gjinia
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    NUmri tel.
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Rruga
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Verifikuar
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Email
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Role
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Imazhi
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                  Verifiko
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Ndrysho rolin
                  </th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
            @php
            $link = explode('/', Auth::user()->img);
            
            @endphp
         
           
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6 capitalize text-center">
                    {{$u->emri}}
                </td>
                <td class="py-4 px-6 capitalize text-center">
                    {{$u->mbiemri}}
                </td>
                <td class="py-4 px-14 capitalize text-center" >
                    {{$u->dataLindjes}}
                </td>
                <td class="py-4 px-6 overflow-clip capitalize text-center">
                    {{$u->universiteti}}
                </td>
                <td class="py-4 px-6 overflow-clip capitalize text-center">
                    {{$u->gjinia}}
                </td>
                <td class="py-4 px-6 overflow-clip capitalize text-center">
                    {{$u->numriTel}}
                </td>
                <td class="py-4 px-6 overflow-clip capitalize text-center w-full">
                    {{$u->rruga}}
                </td>
                <td class="py-4 px-6 overflow-clip uppercase text-center">
                    @if($u->verifikuar!='po')
                    <svg class="w-5 h-5 text-red-500 text-center" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    @else
                    <svg class="w-5 h-5 text-green-500 text-center" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    @endif
                </td>
                <td class="py-4 px-6 overflow-clip">
                    {{$u->email}}
                </td>
                <td class="py-4 px-6 overflow-clip uppercase">
                    @if($u->role!='admin')
                    <p class="bg-red-700 text-white rounded p-1 text-center">{{$u->role}}</p>
                    @else
                    <p class="bg-green-700 text-white rounded p-1 text-center">{{$u->role}}</p>
                    @endif
                </td>
  <td class="py-4 px-6 overflow-clip">
                    @if ($u->img!="public/noProfilePhoto/nofoto.jpg")  
                    <img class="w-10 h-10 rounded-full"  src="/storage/img/{{$link[2]}}" alt="Rounded avatar">
                    @else
                    <img class="w-10 h-10 rounded-full" src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="Rounded avatar">
                  
                    @endif
                  
                </td>
                <td class="py-4 px-6 overflow-clip uppercase">
                    @if ($u->verifikuar!='po')
                    <button type="button" data-modal-toggle="popup-modal{{$u->id}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Verifiko</button>
                    @else
                    <button type="button" data-modal-toggle="popup-modali{{$u->id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">C'Verifiko</button>

                    @endif
                </td>
                <td class="py-4 px-6 overflow-clip uppercase">
                    @if($u->role!='admin')
                    <button type="button" data-modal-toggle="popup-modalAdmin{{$u->id}}" class="focus:outline-none text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Beje ADMIN</button>
                    @else
                    <button type="button" data-modal-toggle="popup-modaliUser{{$u->id}}" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Beje USER</button>
                    @endif
                </td>
               
            </tr>

            <div id="popup-modalAdmin{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modalAdmin{{$u->id}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                          <form action="{{route('user.makeadmin',$u->id)}}" method="post">
                              @csrf
                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">A jeni i sigurt qe doni t'ia heqni privilegjet e adminit?</h3>
                            <button data-modal-toggle="popup-modalAdmin{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Po, i sigurt
                            </button></form>
                            <button data-modal-toggle="popup-modalAdmin{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Jo, anulo</button>
                        </div>
                    </div>
                </div>
            </div>  
            <div id="popup-modaliUser{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modaliUser{{$u->id}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                          <form action="{{route('user.defaultuser',$u->id)}}" method="post">
                              @csrf
                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">A jeni i sigurt qe doni t'ia heqni privilegjet e adminit?</h3>
                            <button data-modal-toggle="popup-modaliUser{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Po, i sigurt
                            </button></form>
                            <button data-modal-toggle="popup-modaliUser{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Jo, anulo</button>
                        </div>
                    </div>
                </div>
            </div> 

  <div id="popup-modal{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{$u->id}}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                <form action="{{route('user.verifiko',$u->id)}}" method="post">
                    @csrf
                  <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">A jeni i sigurt qe doni ta verifikoni kete user?</h3>
                  <button data-modal-toggle="popup-modal{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Po, i sigurt
                  </button></form>
                  <button data-modal-toggle="popup-modal{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Jo, anulo</button>
              </div>
          </div>
      </div>
  </div>

  <div id="popup-modali{{$u->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modali{{$u->id}}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
              <form action="{{route('user.cverifiko',$u->id)}}" method="post">
                  @csrf
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">A jeni i sigurt qe doni ta c'verifikoni kete user?</h3>
                <button data-modal-toggle="popup-modali{{$u->id}}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Po, i sigurt
                </button></form>
                <button data-modal-toggle="popup-modali{{$u->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Jo, anulo</button>
            </div>
        </div>
    </div>
</div>
  
            @endforeach
        </tbody>
       
    </table>
     {{$users->links()}}
</div>
@include('layouts.footer')