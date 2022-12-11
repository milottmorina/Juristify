<title>JURISTIFY</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('build/assets/app.f06e8bcd.css') }}"> 
<div class="grid h-screen place-items-center">
<div class="w-full max-w-xs">
    <form method="POST" action="{{ route('password.update') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input id="email" name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="@error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email">
        @error('email')
        <span class="text-red-700 invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Password
        </label>
        <input id="password" name="password" type="password" required autocomplete="email" autofocus class="@error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="New Password">
        @error('password')
        <span class="text-red-700 invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Password Confirmation
        </label>
        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="password_confirmation" autofocus class="@error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm New-Password">
    </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Reset Password
        </button>
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      JURISTIFY. All rights reserved.
    </p>
  </div>
</div>
<script src="{{ asset('build/assets/app.4c1df604.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

