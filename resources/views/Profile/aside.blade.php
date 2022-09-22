<aside class="py-6 lg:col-span-3">
    <nav class="space-y-1">
        <a href="{{ route('user.index') }}"
            class="border-transparent text-gray-900 hover:text-[#d8b64b] group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
            aria-current="page">

            <div class="flex">
                <div class="text-gray-400 group-hover:text-[#d8b64b] flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                    <i class="fa-solid fa-user"></i>
            </div>
                <div>
            <span class="truncate"> Profile </span></div>
        </div>
        </a>

        <a href="{{ route('user.password') }}"
            class="border-transparent text-gray-900 hover:text-[#d8b64b] group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
            <div class="flex">
                <div class="text-gray-400 group-hover:text-[#d8b64b] flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                    <i class="fa-solid fa-lock"></i>
            </div>
                <div>
            <span class="truncate"> Change Password </span></div>
        </div>
        </a>
        <a href="{{route('user.upload')}}"
            class="border-transparent text-gray-900 hover:text-[#d8b64b] group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
            <div class="flex">
                <div class="text-gray-400 group-hover:text-[#d8b64b] flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                <i class="fa-solid fa-upload"></i></div>
                <div>
            <span class="truncate"> Upload File </span></div>
        </div>
        </a>
        <a href="{{route('user.uploads')}}"
        class="border-transparent text-gray-900 hover:text-[#d8b64b] group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
      
        <div class="flex">
            <div class="text-gray-400 group-hover:text-[#d8b64b] flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                <i class="fa-solid fa-file"></i>
        </div>
            <div>
        <span class="truncate"> My Recent Files </span></div>
    </div>
    </a>
    <a href="{{route('info.create')}}"
        class="border-transparent text-gray-900  hover:text-[#d8b64b] group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
      
        <div class="flex">
            <div class="text-gray-400 group-hover:text-[#d8b64b] flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                <i class="fa-solid fa-square-plus"></i>
        </div>
            <div>
        <span class="truncate"> Create Proclamation </span></div>
    </div>
    </a>
    

    </nav>
</aside>
