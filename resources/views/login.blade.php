<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="">

        <!-- component -->
    <div class="h-screen bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 flex justify-center items-center w-full">
        <form action="/auth" method="POST" class="form">
        @csrf
          <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
            <div class="space-y-4">
              <h1 class="text-center text-2xl font-semibold text-gray-600">Login</h1>
              <div>
                <input type="text" name="username" id="username" placeholder="Username" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('Email') is-invalid @enderror" />
                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div>
                <input type="password" name="password" id="password" placeholder="Password"  class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
              </div>
            </div>
            <button type="submit" class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Login</button>
          </div>
        </form>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>