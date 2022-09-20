
@include('layouts.app')

<div class="relative flex justify-center bg-[#d8b64b]">
    <div class="bg-[#d8b64b] h-60">
        <h1 class="relative top-[45px] text-6xl text-white text-center">Juristify</h1>
        <p class="relative top-[50px] text-2xl text-white text-center">Information</p>
    </div>

</div>
<div class="w-full  shadow p-5 rounded-lg bg-white">
    <div class="relative">
      <div class="absolute flex items-center ml-2 h-full">
        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
        </svg>
      </div>
  
      <input type="text" placeholder="Search by listing, location, bedroom number..." class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
        </div>
  
      <div class="flex items-center justify-between mt-4">
        <p class="font-medium">
          Filters
        </p>
  
        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
          Reset Filter
        </button>
      </div>
  
      <div>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">All Type</option>
            <option value="for-rent">For Rent</option>
            <option value="for-sale">For Sale</option>
          </select>
  
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">Furnish Type</option>
            <option value="fully-furnished">Fully Furnished</option>
            <option value="partially-furnished">Partially Furnished</option>
            <option value="not-furnished">Not Furnished</option>
          </select>
  
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">Any Price</option>
            <option value="1000">RM 1000</option>
            <option value="2000">RM 2000</option>
            <option value="3000">RM 3000</option>
            <option value="4000">RM 4000</option>
          </select>
  
          <select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            <option value="">Floor Area</option>
            <option value="200">200 sq.ft</option>
            <option value="400">400 sq.ft</option>
            <option value="600">600 sq.ft</option>
            <option value="800 sq.ft">800</option>
            <option value="1000 sq.ft">1000</option>
            <option value="1200 sq.ft">1200</option>
          </select>
        </div>
      </div>

      <div class="pt-6 pb-12 flex">  
        <div id="card" class="md:w-3/4">
         
          <!-- container for all cards -->
          <div class="container w-100 md:w-4/5 mx-auto flex flex-col">
            <!-- card -->
            @for ($i=0; $i<6; $i++)
                
           
            <div class="p-10">
              <!--Card 1-->
              <div class=" w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('data:image/png;base64,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')" title="Mountain">
                </div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                  <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                      <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                      </svg>
                      Members only
                    </p>
                    <div class="text-gray-900 font-bold text-xl mb-2">Best Mountain Trails 2020</div>
                    <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                  </div>
                  <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="data:image/png;base64,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" alt="Avatar of Writer">
                    <div class="text-sm">
                      <p class="text-gray-900 leading-none">John Smith</p>
                      <p class="text-gray-600">Aug 18</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endfor
            <!--/ card-->
          </div><!--/ flex-->
        </div>
        <div>

        </div>
      </div>
    </div>
  

    @include('layouts.footer')