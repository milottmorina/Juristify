
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
                                  {{ App\Models\user::get()->count() }}
    
                                </span>
                                <h3 class="text-base font-normal text-gray-500">All Users</h3>
                             </div>
                            
                          </div>
                       </div>
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\user::where('verifikuar','po')->get()->count() }}
                                </span>
                                <h3 class="text-base font-normal text-gray-500">Verified Users</h3>
                             </div>
                          
                          </div>
                       </div>
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\user::where('verifikuar','jo')->get()->count() }}
                                </span>
                                <h3 class="text-base font-normal text-gray-500">Non Verified Users</h3>
                             </div>
                          
                          </div>
                       </div>
                    </div>
                  
                 </div>
                 <div class="pt-6 px-4">
                   <h1 class="text-2xl font-bold ml-1">Blogs</h1>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\blog::get()->count() }}
    
                                </span>
                                <h3 class="text-base font-normal text-gray-500">All Blogs</h3>
                             </div>
                            
                          </div>
                       </div>
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\blog::where('aktive','po')->get()->count() }}
                                </span>
                                <h3 class="text-base font-normal text-gray-500">Approved Blogs</h3>
                             </div>
                          
                          </div>
                       </div>
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\blog::where('aktive','jo')->get()->count() }}
                                </span>
                                <h3 class="text-base font-normal text-gray-500">Non Approved Blogs</h3>
                             </div>
                          
                          </div>
                       </div>
                    </div>
                  
                 </div>
                 <div class="pt-6 px-4">
                   <h1 class="text-2xl font-bold ml-1">Library</h1>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\files::get()->count() }}
    
                                </span>
                                <h3 class="text-base font-normal text-gray-500">All Library</h3>
                             </div>
                            
                          </div>
                       </div>
                       
                    
                    </div>
                  
                 </div>
                 <div class="pt-6 px-4">
                   <h1 class="text-2xl font-bold ml-1">Information</h1>
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
                  
                 </div>
                 <div class="pt-6 px-4">
                   <h1 class="text-2xl font-bold ml-1">Contact Us Messages</h1>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                       <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                          <div class="flex items-center">
                             <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                  {{ App\Models\contact::get()->count() }}
    
                                </span>
                                <h3 class="text-base font-normal text-gray-500">All Informations</h3>
                             </div>
                            
                          </div>
                       </div>
                       
                    
                    </div>
                  
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