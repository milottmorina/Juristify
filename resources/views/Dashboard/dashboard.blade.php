
    <title>Dashboard</title>
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
              
             </div>
          </main>
   
          <p class="text-center text-sm text-gray-500 my-10">
             <a href="#" class="hover:underline" target="_blank">JURISTIFY</a>. All rights reserved.
          </p>
       </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
 </div>