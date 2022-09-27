
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
                  
                      <section class="text-gray-600 body-font">
                          <div class="container lg:px-5 pb-24 mt-4 mx-auto max-w-7x1">
                          
                            <div class="flex flex-wrap -m-4">
                          
                              @foreach ($news as $n)
                              @php
                              $link = explode('/', $n->img);
                              
                          @endphp
                      
                              <div class="xl:w-1/3 md:w-1/2 p-4"> 
                                 <a href="{{route('news.show',$n->id)}}/?{{$n->titulli}}">
                                <div class="bg-white p-6 rounded-lg">
                                  <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6" src="{{ asset('storage/news/' . $link[2]) }}" alt="Image Size 720x400">
                                  <h3 class="tracking-widest text-[#d8b64b] text-xs font-medium title-font ">{{$n->kategoria}} / {{date('d F, Y', strtotime($n->created_at))}}</h3>
                                  <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                    @if (strlen($n->titulli)>=37)
                                    {{substr($n->titulli,0,37)}}... 
                                    @else
                                    {{$n->titulli}}
                                    @endif
                                </h2>
                                  <p class="leading-relaxed text-base"> {{ substr($n->pershkrimi, 0, 200) }}...</p>
                                </div></a>
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
       
              <p class="text-center text-sm text-gray-500 my-10">
                 <a href="#" class="hover:underline" target="_blank">JURISTIFY</a>. All rights reserved.
              </p>
           </div>
        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
     </div>