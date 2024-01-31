<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Reset Password</title>
</head>

<body class="font-mono bg-gray-400">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="flex w-full xl:w-3/4 lg:w-11/12">
                <!-- Col -->
                <div class="hidden w-full h-auto bg-gray-400 bg-cover rounded-l-lg lg:block lg:w-5/12"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"></div>
                <!-- Col -->
                <div class="w-full p-5 bg-white rounded-lg lg:w-7/12 lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                    <form action="{{ route('password.update') }}" method="post"
                        class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf
                        <input type="text" hidden name="token" id="token" value="{{ $token }}">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email" id="email" type="email" placeholder="Email" />
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Introduce un Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="password" id="password" type="password" placeholder="******************" />
                                <p class="text-xs italic text-red-500">Introduce un password</p>
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                    Confirma el Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="password_confirmation" id="password_confirmation" type="password"
                                    placeholder="******************" />
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <input type="submit" name="submit"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                value="Registrar Usuario">
                        </div>
                        <hr class="mb-6 border-t" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>


<!-- component -->
