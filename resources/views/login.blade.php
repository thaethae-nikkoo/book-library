<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- tailwind -->
    <link href={{"/assets/img/library.png"}} rel="icon">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class=" pt-[20px] h-[100vh]">

        <form action="/login" method="post" class="max-w-[700px] mx-auto mt-[100px] shadow-md p-8 rounded-lg space-y-5">
            @csrf
            <h1 class="text-3xl text-center font-bold ">Login</h1>
            @if(session('error'))
            <div class="text-red-600 text-center ">
                {{ session('error') }}
            </div>
            @endif


            <div class="mb-5">
                <input type="email" id="email" name="email"
                    class="shadow-sm  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Email">
                @error('email')
                <span class="text-red-500 text-xs ml-2 tracking-wider">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5">

                <input type="password" id="password" name="password"
                    class="shadow-sm  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Password">
                @error('password')
                <span class="text-red-500 text-
                xs ml-2 tracking-wider">{{$message}}</span>
                @enderror
            </div>
            <button type="submit"
                class="block w-full hover:text-white hover:bg-red-400 transition-all duration-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-red-400 text-red-400">Login</button>


        </form>
    </div>

</body>

</html>