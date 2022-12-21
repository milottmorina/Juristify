<title>Regjistrohu</title>
<link rel="stylesheet" href="{{ asset('build/assets/app.f06e8bcd.css') }}"> 

<!-- component -->
<div class="text-center mt-24">
    <div class="flex items-center justify-center">

        <img src="{{ asset('logo/juristify.png') }}" width="150px">
    </div>
    <h2 class="text-4xl tracking-tight">
        Register a new account
    </h2>
    <span class="text-sm">or <a href="{{ route('login') }}" class="text-blue-500">
            Sign in your account
        </a>
    </span>
</div>
<div class="flex justify-center my-2 mx-4 md:mx-0">
    <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6 drop-shadow-md" method="POST"
        action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap mb-6">
            @if (Session::has('msg'))
                <div class="alert alert-success text-center text-green-600 ml-1 ">
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
                        role="alert">
                        <span class="font-medium">{!! \Session::get('msg') !!}</span>
                    </div>
                </div>
            @endif
            <div class="flex">
                <div class="w-full md:w-full px-7 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Name</label>
                    <input placeholder="Name"
                        class="@error('name') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='text' name="name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="w-full md:w-full px-7 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Surname</label>
                    <input placeholder="Surname"
                        class="@error('surname') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='text' name="surname" required>
                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Birthday</label>
                <input
                    class="@error('birthday') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    type='date' name="birthday" required>
                @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror
            </div>
            <div class="w-full md:w-full px-7 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for='Password'>Email</label>
                <input placeholder="Email"
                    class="@error('email') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    type='email' name="email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror
            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>University</label>
                <select name="university"
                    class="@error('university') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    id="grid-state">
                    <option>Universiteti i Prishtines</option>
                </select>
                @error('university')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror
            </div>
            <div class="flex">
                <div class="w-full md:w-full px-7 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Password</label>
                    <input placeholder="Password"
                        class="@error('password') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='password' name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="w-full md:w-full px-7 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Confirm Password</label>
                    <input
                        class="@error('password_confirmation') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='password' placeholder="Confirm Password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for='Password'>Gender</label>
                <select name="gender"
                    class=" @error('gender') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    id="grid-state">
                    <option>Mashkull</option>
                    <option>Femer</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror

            </div>
            <div class="w-full md:w-full px-7 mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload
                    University ID Card</label>
                <input
                    class=" @error('id_card') is-invalid @enderror block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer "
                    aria-describedby="id_kartela" name="id_card" id="id_card" type="file" >
                    @error('id_card')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror
                <input type="hidden" name="verified" id="verified" value="0">
                <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG or JPG</p>

            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <button
                    class="appearance-none block w-full bg-[#374151] text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-[#374151] focus:outline-none focus:bg-white focus:border-gray-500">Register</button>
            </div>


        </div>
    </form>
</div>
<script src="{{ asset('build/assets/app.4c1df604.js') }}"></script>