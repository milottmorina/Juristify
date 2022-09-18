@include('layouts.app')


<div class="overflow-x-auto relative shadow-md sm:rounded-lg m-32">
    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        <h1 class="p-3 text-lg font-semibold">Contact Us Messages</h1>
        <p class="mt-1 text-sm p-3 font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
    </caption>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
     
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Emri
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Nr. Tel
                </th>
                <th scope="col" class="py-3 px-6">
                    Mesazhi
                </th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $c)
                
           
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$c->emri}}
                </th>
                <td class="py-4 px-6">
                    {{$c->email}}
                </td>
                <td class="py-4 px-6">
                    {{$c->numriTel}}
                </td>
                <td class="py-4 px-6 overflow-clip">
                    {{$c->mesazhi}}
                </td>
               
            </tr>
            @endforeach
        </tbody>
       
    </table>
     {{$contacts->links()}}
</div>
@include('layouts.footer')