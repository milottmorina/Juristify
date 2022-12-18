@include('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
<div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
   <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
     <button
       type="button"
       data-bs-target="#carouselExampleCaptions"
       data-bs-slide-to="0"
       class="active"
       aria-current="true"
       aria-label="Slide 1"
     ></button>
     <button
       type="button"
       data-bs-target="#carouselExampleCaptions"
       data-bs-slide-to="1"
       aria-label="Slide 2"
     ></button>
   </div>
   <div class="carousel-inner relative w-full overflow-hidden">
     <div class="carousel-item active relative float-left w-full">
       <img
         src="{{asset('logo/foto1.png')}}"
         class="block w-full h-96 object-cover"
         alt="..."
       />
       <div class="carousel-caption  block absolute text-center">
         <h5 class="text-[#d9b64c] font-bold lg:text-4xl">JURISTIFY</h5>
         <p class=" text-[#d9b64c] lg:text-2xl">Platforma e Juristëve</p>
       </div>
     </div>
     <div class="carousel-item relative float-left w-full">
       <img
         src="{{asset('logo/foto2.png')}}"
         class="block w-full h-96 object-cover"
         alt="..."
       />
       <div class="carousel-caption  block absolute text-center">
         <h5 class="text-[#d9b64c] font-bold lg:text-4xl">JURISTIFY</h5>
         <p class="text-[#d9b64c] lg:text-2xl">Platforma e Juristëve</p>
       </div>
     </div>
   </div>
   <button
     class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
     type="button"
     data-bs-target="#carouselExampleCaptions"
     data-bs-slide="prev"
   >
     <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button
     class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
     type="button"
     data-bs-target="#carouselExampleCaptions"
     data-bs-slide="next"
   >
     <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
     <span class="visually-hidden">Next</span>
   </button>
 </div>
<div class="bg-[#1f2937] border-1 py-5 lg:px-20 w-full">
    <div class="flex flex-wrap lg:justify-between -mx-4">
       <div class="w-full lg:w-1/2 xl:w-6/12 px-4">
          <div class="max-w-[570px] mb-12 lg:mb-0">
             <span class="px-5 block mb-4 text-base text-[#d9b64c] font-semibold">
             Contact Us
             </span>
             <p class="text-base text-white leading-relaxed mb-9 px-5">
            Për çdo pyetje tuajën, ne jemi këtu për t'ju mbështetur.
             </p>
             <div class="flex mb-8 max-w-[370px] w-full">
                <div
                   class="
                   max-w-[60px]
                   sm:max-w-[70px]
                   w-full
                   h-[60px]
                   sm:h-[70px]
                   flex
                   items-center
                   justify-center
                   mr-6
                   overflow-hidden
                    bg-opacity-5
                   text-[#d9b64c]
                   rounded
                   "
                   >
                   <i class="fa-solid fa-location-pin text-2xl"></i>
                </div>
                <div class="w-full">
                   <h4 class="font-bold text-white text-xl mb-1">Our Location</h4>
                   <p class="text-base text-white">
                      Rr. Nëna Terezë, Fakulteti i Arteve, Kati -1, Zyra nr.IV(kampusi i UP-së)    
                   </p>
                </div>
             </div>
             <div class="flex mb-8 max-w-[370px] w-full">
                <div
                   class="
                   max-w-[60px]
                   sm:max-w-[70px]
                   w-full
                   h-[60px]
                   sm:h-[70px]
                   flex
                   items-center
                   justify-center
                   mr-6
                   overflow-hidden
                    bg-opacity-5
                   text-[#d9b64c]
                   rounded
                   "
                   >
                   <i class="fa-solid fa-phone text-2xl"></i>
                </div>
                <div class="w-full">
                   <h4 class="font-bold text-white text-xl mb-1">Phone Number</h4>
                   <p class="text-base text-white">(+383)43 840 808 <br> (+383) 45 260 465</p>
                </div>
             </div>
             <div class="flex mb-8 max-w-[370px] w-full">
                <div
                   class="
                   max-w-[60px]
                   sm:max-w-[70px]
                   w-full
                   h-[60px]
                   sm:h-[70px]
                   flex
                   items-center
                   justify-center
                   mr-6
                   overflow-hidden
                   bg-opacity-5
                   text-[#d9b64c]
                   rounded
                   "
                   >
                   <i class="fa-solid fa-envelope text-2xl"></i>
                </div>
                <div class="w-full">
                   <h4 class="font-bold text-white text-xl mb-1">
                      Email Address
                   </h4>
                   <p class="text-base text-white">info@juristify.net</p>
                </div>
             </div>
          </div>
       </div>
       <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
          <div class="bg-transparent relative rounded-lg p-8 sm:p-12 shadow-lg">
            @if (Session::has('msg'))
         <div class="text-center text-green-600 ">
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg " role="alert">
               <span class="font-medium">{!! \Session::get('msg') !!}</span> 
             </div>
         </div>
         @endif
             <form action="{{route('contact.store')}}" method="post">
               @csrf
                <div class="mb-6">
                   <input
                      type="text"
                      placeholder="Your Name"
                      class="  @error('name') is-invalid @enderror
                      w-full
                      rounded
                      py-3
                      px-[14px]
                      text-body-color text-base
                      border border-[f0f0f0]
                      outline-none
                      focus-visible:shadow-none
                      focus:border-primary capitalize
                      "
                      name="name" required
                      value="{{Auth::user()->name . " ".Auth::user()->surname}}" disabled
                      />
                    
                                         @error('name')
                                         <div class="ml-1 text-red-500 text-sm ">{{ $message }}
                                         </div>
                                         @enderror
                </div>
                <div class="mb-6">
                   <input
                      type="email"
                      placeholder="Your Email"
                      class="@error('email')
                         is-invalid
                      @enderror
                      w-full
                      rounded
                      py-3
                      px-[14px]
                      text-body-color text-base
                      border border-[f0f0f0]
                      outline-none
                      focus-visible:shadow-none
                      focus:border-primary 
                      "
                      name="email" required
                      value="{{Auth::user()->email}}" disabled
                      />
                      @error('email')
                      <div class="ml-1 text-red-500 text-sm ">{{ $message }}
                      </div>
                      @enderror
                </div>
                <div class="mb-6">
                  @if (Auth::user()->phoneNo!=null)
                  <input
                  type="text"
                  placeholder="Your Phone"
                  class="@error('phoneNo')
                  is-invalid
               @enderror
                  w-full
                  rounded
                  py-3
                  px-[14px]
                  text-body-color text-base
                  border border-[f0f0f0]
                  outline-none
                  focus-visible:shadow-none
                  focus:border-primary
                  "
                  name="phoneNo" required
                  />
                  @else
                  <input
                  type="number"
                  placeholder="Your Phone"
                  class="@error('phoneNo')
                  is-invalid
               @enderror
                  w-full
                  rounded
                  py-3
                  px-[14px]
                  text-body-color text-base
                  border border-[f0f0f0]
                  outline-none
                  focus-visible:shadow-none
                  focus:border-primary"
                  name="phoneNo" required
                  />
                  @endif
                      @error('phoneNo')
                      <div class="ml-1 text-red-500 text-sm ">{{ $message }}
                      </div>
                      @enderror
                </div>
                <div class="mb-6">
                   <textarea
                      rows="6"
                      placeholder="Your Message"
                      class="@error('msg')
                      is-invalid
                   @enderror
                      w-full
                      rounded
                      py-3
                      px-[14px]
                      text-body-color text-base
                      border border-[f0f0f0]
                      resize-none
                      outline-none
                      focus-visible:shadow-none
                      focus:border-primary
                      "
                      name="msg" required
                      ></textarea>
                      @error('msg')
                      <div class="ml-1 text-red-500 text-sm ">{{ $message }}
                      </div>
                      @enderror
                </div>
                <div>
                   <button
                      type="submit"
                      class="
                      w-full
                      text-white
                     bg-[#d9b64c]
                      rounded
                      border
                      p-3
                      transition
                      hover:bg-opacity-90
                      "
                      >
                   Send Message
                   </button>
                </div>
             </form>
             <div>
         
           
             </div>
          </div>
       </div>
    </div>
 </div>
@include('layouts.footer')