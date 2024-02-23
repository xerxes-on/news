<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/login.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <x-auth-session-status class="mb-4" :status="session('status')" />
</head>
<body>
    <div class="container1" onclick="onclick">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center bg-gray-50">
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <h2 class="text-4xl font-bold">Sign in</h2>
              <input type="email" name="email" placeholder="Email" value="{{ old('email')}}" class="mt-3 max-h-24" required/>
              <input type="password" name="password" autocomplete="current-password" placeholder="password" id="password" required/>
              <input type="submit" value="Login" class=" hover:bg-red-900 hover:text-gray-100 font-bold">
              <div class="flex">
                <input class="form-control" style="width: auto" type="checkbox" name="remember" value="on" id="remember">
                 <label for="remember">Remember me</label>
              </div>
              <div class="flex items-center justify-end mt-4">
                  @if (Route::has('password.request'))
                      <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-black dark:hover:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                          {{ __('Forgot your password?') }}
                      </a>
                  @endif
              </div>
              <div class="flex items-center justify-end mt-4">
                <a class="hover:text-blue-950 hover:text-xl hover:underline" href="{{route('register')}}">Register</a>
              </div>
            </form>
        </div>
      </div>
</body>
</html>
