
<aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
       <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
          <div class="flex-1 px-3 bg-white divide-y space-y-1">
             <ul class="space-y-2 pb-2">
               <li>
                  <a  class="text-base bg-gray-200 text-gray-900 font-normal rounded-lg flex items-center p-2 group">
                     @php
          $link = explode('/', Auth::user()->img);
          
          @endphp
          @if (Auth::user()->img!="public/noProfilePhoto/nofoto.jpg")  
          <img class="w-10 h-10 rounded-full object-cover"  src="/storage/img/{{$link[2]}}" alt="Rounded avatar">
          @else
          <img class="w-10 h-10 rounded-full object-cover" src="{{asset('/noProfilePhoto/'.$link[2])}}" alt="Rounded avatar">
        
          @endif
                     <span class="ml-3 capitalize font-bold">{{Auth::user()->name." ".Auth::user()->surname}}</span>
                  </a>
               </li>
               
                <li>
                   <a href="/dashboard" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                      <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                         <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                      </svg>
                      <span class="ml-3">Dashboard</span>
                   </a>
                </li>
                <li>
                   <a href="{{route('user.all')}}"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-users text-gray-500 group-hover:text-gray-900"></i>
                      <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                   </a>
                </li>
                <li>
                   <a href="{{route('news.all')}}"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                   
                      <i class="fa-solid fa-newspaper text-gray-500 group-hover:text-gray-900"></i>
                      <span class="ml-3 flex-1 whitespace-nowrap">News</span>

                   </a>
                </li>
                <li>
                   <a href="{{route('blog.all')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-blog text-gray-500 group-hover:text-gray-900"></i>
                      <span class="ml-3 flex-1 whitespace-nowrap">Blogs</span>
                   </a>
                </li>
                <li>
                   <a href="{{route('informations.view')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-circle-info text-gray-500 group-hover:text-gray-900"></i>
                      <span class="ml-3 flex-1 whitespace-nowrap">Information</span>
                   </a>
                </li>
                <li>
                   <a href="{{route('contact.show')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-address-book text-gray-500 group-hover:text-gray-900"></i>
                      <span class="ml-3 flex-1 whitespace-nowrap">All Contacts</span>
                   </a>
                </li>
                <li>
                   <a href="{{route('library.all')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <i class="fa-solid fa-file text-gray-500 group-hover:text-gray-900"></i>
                      <span class="ml-3 flex-1 whitespace-nowrap">Library</span>
                   </a>
                </li>
                <li>
                  <a href="{{route('home')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                    <i class="fa-solid fa-house-user text-gray-500 group-hover:text-gray-900"></i>
                     <span class="ml-3 flex-1 whitespace-nowrap">Go to home</span>
                  </a>
               </li>
               <hr>
                <li>
                  <form  method="POST" action="{{ route('logout') }}">
                     @csrf
                       <button class="font-bold w-full py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" type="submit" >
                       Logout
                     </button>
              
                   </form>
                </li>
                <hr>
             </ul>
       
          </div>
       </div>
    </div>
 </aside>
 <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

