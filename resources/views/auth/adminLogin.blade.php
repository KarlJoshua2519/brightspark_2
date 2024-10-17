<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="{{ asset('images/brightsparkslogo.png') }}" type="image/x-icon">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/57a798c9bb.js" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-100 font-family-karla h-screen">
    <x-navbar />

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="w-full flex justify-center items-center pt-8 mt-8 pb-8">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col mt-8 pb-8">

            <div class="mt-4 p-4 flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Welcome, Admin!</p>
                <form class="flex flex-col pt-3 md:pt-8" method="POST" action="{{ route('admin.signin') }}">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" class="@error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <button type="submit" class="bg-gray-500 text-white font-bold text-lg hover:bg-gray-600 p-2 mt-8"> Log in</button>
                
                </form>

            </div>

        </div>

        <!-- Image Section -->
        {{-- <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{asset('images/studentbg.jpg')}}">
        </div> --}}
    </div>
    <x-footer />
</body>
</html>