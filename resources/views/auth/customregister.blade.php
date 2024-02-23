<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container1" onclick="onclick">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center bg-gray-200">
          <form method="POST" class="flex flex-col" action="{{ route('register') }}">
              @csrf
              <h2 class="text-4xl font-bold ">Sign up</h2>
              <input name="name" type="text" placeholder=" Name" required/>
              <input name="email" type="email" placeholder=" example@mail.com"class="mt-3 max-h-24" required/>
              <input name="password" type="password" placeholder="Password" required/>
              <input name="password_confirmation" type="password" placeholder="Confirm Password" required/>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-black dark:hover:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ms-4 hover:bg-red-950">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
          </form>


        </div>
      </div>
</body>
</html>
