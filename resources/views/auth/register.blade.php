<title>Regjistrohu</title>
@vite('resources/css/app.css')

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
        <div class="flex flex-wrap -mx-3 mb-6">
            @if (Session::has('msg'))
                <div class="alert alert-success text-center text-green-600 relative left-[51px]">
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                        role="alert">
                        <span class="font-medium">{!! \Session::get('msg') !!}</span>
                    </div>
                </div>
            @endif
            <div class="flex">
                <div class="w-full md:w-full px-7 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Emri</label>
                    <input placeholder="Emri"
                        class="@error('emri') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='text' name="emri" required>
                    @error('emri')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="w-full md:w-full px-7 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Mbiemri</label>
                    <input placeholder="Mbiemri"
                        class="@error('mbiemri') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='text' name="mbiemri" required>
                    <input type="hidden" name="verifikuar" id="" value="jo">
                    @error('mbiemri')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Data
                    Lindjes</label>
                <input
                    class="@error('dataLindjes') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    type='date' name="dataLindjes" required>
                @error('dataLindjes')
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
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Zgjidh
                    Universitetin</label>
                <select name="universiteti"
                    class="@error('universiteti') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    id="grid-state">

                    <option>Zgjidh Universitetin</option>
                    <option>UniversitetiiLondres</option>
                    <option>Universiteti i Texas</option>

                </select>
                @error('universiteti')
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
                        for='Password'>Konfirmo Password-in</label>
                    <input
                        class="@error('password_confirmation') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='password' placeholder="Konfirmo Password-in" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for='Password'>Gjinia</label>
                <select name="gjinia"
                    class=" @error('gjinia') is-invalid @enderror appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    id="grid-state">
                    <option>Mashkull</option>
                    <option>Femer</option>
                </select>
                @error('gjinia')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror

            </div>
            <div class="w-full md:w-full px-7 mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload
                    file</label>
                <input
                    class=" @error('id_kartela') is-invalid @enderror block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="id_kartela" name="id_kartela" id="id_kartela" type="file" >
                    @error('id_kartela')
                    <span class="invalid-feedback" role="alert">
                        <p class="text-xs text-red-600 ml-2">{{ $message }}</p>
                    </span>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG</p>

            </div>

            <div class="w-full md:w-full px-7 mb-6">
                <button
                    class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Register</button>
            </div>


        </div>
    </form>
</div>
