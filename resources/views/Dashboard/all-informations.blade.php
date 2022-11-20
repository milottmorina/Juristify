
    <title>Dashboard</title>
    <div>
        @include('layouts.dashboardHeader')
        <div class="flex overflow-hidden bg-white pt-16">
           @include('layouts.sidebarDashboard')
           <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
              <div class="mt-5 w-full flex justify-center">
                <form class=""  action="{{ route('info.findDashboard') }}" method="GET" role="search">
                  <div class="max-w-xl">
                    <div class="flex space-x-4">
                      <div class="flex rounded-md overflow-hidden w-full">
                        <input type="text" name="term" class="border-2 w-full rounded-md rounded-r-none" />
                        <a href="{{route('info.findDashboard')}}" >
                        <button class="bg-[#374151] text-white px-6 text-lg font-semibold py-4 rounded-r-md">Search</button>
                        </a>
                      </div>
                   
                    </div>
                  </div>
                </form> 
                  <a href={{route('informations.view')}}>
                      <button class="bg-white px-6 text-lg font-semibold py-4 rounded-md">Clear</button>
                    </a>
                    <button class="ml-5 h-10 block text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="modalJuristify">
 Create Information
  </button>
              </div>

  
  <!-- Main modal -->
  <div id="modalJuristify" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Create Information
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modalJuristify">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <form class="lg:col-span-9" action="{{route('info.store')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                        <div class="flex justify-center items-center w-full">
                          

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload IMG</label>
                            <input class="@error('img') is-invalid @enderror block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="img" type="file">
                            
                            @error('img')
                                <span class="invalid-feedback " role="alert">
                                    <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                </span>
                            @enderror
                     
                        </div>

                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Title</label>
                                <input required type="text" name="title" id="title" autocomplete="given-name"
                                    class="@error('title') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('title')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                <input required type="text" name="company_name" id="company_name" autocomplete="given-name"
                                    class="@error('title') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('company_name')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Category</label>
                                <input required type="text" name="category" id="category" autocomplete="given-name"
                                    class="@error('category') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('category')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Location</label>
                                <input required type="text" name="location" id="location" autocomplete="given-name"
                                    class="@error('location') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('location')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                                <input required type="date"  min=<?php echo date('Y-m-d'); ?> name="expiration_date" id="expiration_date" autocomplete="given-name"
                                    class="@error('expiration_date') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('expiration_date')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Free Places</label>
                                <input required type="number" name="free_places" id="free_places" autocomplete="given-name"
                                    class="@error('free_places') is-invalid @enderror capitalize mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    @error('free_places')
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
                                <textarea type="text" rows="4" name="description" id="first-name" required autocomplete="given-name"
                                    class="@error('description') is-invalid @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                  </textarea>
                  @error('description')
                                    <span class="invalid-feedback " role="alert">
                                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="ml-5 h-10 mt-6 block text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                </form>
              </div>
              <!-- Modal footer -->
           
          </div>
      </div>
  </div>
  <div class="grid lg:grid-cols-2 gap-4 mt-5 p-3">   
    @foreach ($infos as $i) 
    @php
    $link = explode('/', $i->img);
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    date_default_timezone_set("Europe/Belgrade");
    $earlier = new DateTime(date("Y-m-d"));
    $later = new DateTime($i->expiration_date);
    $pos_diff = $earlier->diff($later)->format("%r%a");
    @endphp
    <a data-modal-toggle="defaultModal{{$i->id}}" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w hover:bg-gray-100">
        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('storage/info/' . $link[2]) }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ substr($i->title, 0, 12) }}... </h5>
            <span class="flex justify-between bg-[{{$color}}] text-white p-2 rounded">
                <span class="flex">
                  <i class="fa-solid fa-tag bg-[{{$color}}] ml-2  mt-1 mr-1  text-white"></i>{{' '.$i->category}}
                  <i class="fa-solid fa-circle-nodes bg-[{{$color}}] ml-2  mt-1 mr-1  text-white"></i>{{' '.$i->free_places}}
                  <i class="fa-solid fa-calendar-days mt-1 ml-2 mr-1 bg-[{{$color}}] text-white"></i>{{'  Days left:'}}
                  @if ($pos_diff<0)
                      {{'Done'}}
                  @else
                  {{$pos_diff }} 
                  @endif
                  
                </span>
            </span>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ substr($i->description, 0, 100) }}...<span class="font-bold text-[#374151]">read more</span> </p>
        </div>
    </a>
    <div id="defaultModal{{$i->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                       {{$i->title}}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$i->id}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <span class="grid lg:grid-cols-2 lg:gap-1 text-gray-500">
    
                        <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                                                    
                            <i class="fa-solid fa-briefcase mr-1 bg-[{{$color}}] text-white"></i>{{' ' . $i->company_name }}
                        </span>
                        <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                            <i class="fa-solid fa-tag mr-1  bg-[{{$color}}] text-white"></i>{{ ' ' . $i->category }}
                        </span>
                        <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                            <i class="fa-solid fa-location-pin mr-1  bg-[{{$color}}] text-white"></i>{{ ' ' . $i->location }}
                        </span>
                        <span class="flex items-center justify-start mr-2 mt-3 bg-[{{$color}}] text-white p-2 rounded">
                            <i class="fa-solid fa-calendar-days ml-1 mr-1 bg-[{{$color}}] text-white"></i>{{'  Days left:'}} {{$pos_diff }} 
                        </span>
                        </span>
                     {{substr($i->description,0,1000)}}...
                </div>
                <!-- Modal footer -->
                <div class="p-3">
                    <div class="mb-3">
                    <button data-modal-toggle="popup-modal{{$i->id}}" type="button" class="text-white bg-red-400 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                    <button data-modal-toggle="authentication-modal{{$i->id}}"  type="button" class="text-white bg-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                   </div> 
                   <button data-modal-toggle="defaultModal{{$i->id}}" type="button" class="w-full text-white bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CLOSE</button>          
                    
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
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                            <input type="text" value="{{$i->title}}" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required="">
                        </div>
                        <div class="m-1">
                            <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company Name</label>
                            <input type="text" value="{{$i->company_name}}" name="company_name" id="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required="">
                        </div>
                      </div>
                        <div class="flex">
                        <div class="m-1">
                          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                          <input type="text" name="category" id="category" value="{{$i->category}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                      </div>
                      <div class="m-1">
                          <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                          <input type="text" name="location" id="location" value="{{$i->location}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                      </div>
                        </div>
                      <div class="flex">
                      <div class="m-1">
                          <label for="expiration_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                          <input type="date" name="expiration_date" value="{{$i->expiration_date}}" id="expiration_date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                      </div>
                      <div class="m-1" >
                          <label for="free_places" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Free Places</label>
                          <input type="number" name="free_places" id="free_places" value="{{$i->free_places}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                      </div>
                      </div>
                   
                      <div class="m-1">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                          <textarea name="description" id="description" row="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">{{$i->description}}</textarea>
                      </div>
                      <div class="m-1">
                          <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto</label>
                          <input type="file" name="img" id="img" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                      </div>
                  
                      <img class="object-cover w-5 h-5 rounded-t-lg " src="{{ asset('storage/info/' . $link[2]) }}" alt="">
  
                        <button type="submit" class="w-full text-white bg-[#374151] hover:bg-[#374151] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> 
    @endforeach 
            </div>
            <div class="flex justify-center mt-5">
    {{$infos->links()}}
    </div>
                            {{-- </div> --}}
         
                        {{-- </div>
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
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$i->title}}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ substr($i->description, 0, 237) }}... </p>
                                    <span class="flex items-center justify-start text-gray-500 mt-3">
                                                                
                                        <i class="fa-solid fa-briefcase mr-1"></i>{{' ' . $i->company_name }}
                                        <i class="fa-solid fa-tag mr-1 ml-5"></i>{{ ' ' . $i->category }}
                                        <i class="fa-solid fa-location-pin ml-5"></i>{{ ' ' . $i->location }}
                               
                                    </span>
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
                                  {{$i->title}}
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
                         <h1 class="font-bold text-2xl ml-3 text-center">{{$i->title}}</h1>
                         <hr>
                         <span class="flex items-center justify-center text-gray-500  ">
                                                                
                            <i class="fa-solid fa-briefcase mr-1"></i>{{' ' . $i->company_name }}
                            <i class="fa-solid fa-tag mr-1 ml-5"></i>{{ ' ' . $i->category }}
                            <i class="fa-solid fa-location-pin ml-5"></i>{{ ' ' . $i->location }}
                   
                        </span>
                         <hr>
                            <button data-modal-toggle="popup-modal{{$i->id}}" type="button" class="text-white bg-red-400 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                            <button data-modal-toggle="authentication-modal{{$i->id}}"  type="button" class="text-white bg-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>

                          </div>
                          <!-- Modal footer -->
                          <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                              <button data-modal-toggle="defaultModal{{$i->id}}" type="button" class="text-white bg-[#374151] hover:bg-[#374159] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Close</button>
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
                          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">title</label>
                          <input type="text" value="{{$i->title}}" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required="">
                      </div>
                      <div class="m-1">
                          <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Emri Kompanis</label>
                          <input type="text" value="{{$i->company_name}}" name="company_name" id="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required="">
                      </div>
                    </div>
                      <div class="flex">
                      <div class="m-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">category</label>
                        <input type="text" name="category" id="category" value="{{$i->category}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="m-1">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                        <input type="text" name="location" id="location" value="{{$i->location}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                      </div>
                    <div class="flex">
                    <div class="m-1">
                        <label for="expiration_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data Skadimit</label>
                        <input type="date" name="expiration_date" value="{{$i->expiration_date}}" id="expiration_date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="m-1" >
                        <label for="free_places" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Free Places</label>
                        <input type="number" name="free_places" id="free_places" value="{{$i->free_places}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    </div>
                 
                    <div class="m-1">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">description</label>
                        <textarea name="description" id="description" row="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">{{$i->description}}</textarea>
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
                        
                        {{$infos->links()}}

            
                    </div>
                    <!--/ flex-->
                </div> --}}
              </main>
              <p class="text-center text-sm text-gray-500 my-10">
                 <a href="#" class="hover:underline" target="_blank">Student's Forum</a>. All rights reserved.
              </p>
           </div>
        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
     </div>