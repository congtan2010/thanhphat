<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <title>Thành Phát</title>
    @vite('resources/css/app.css')
</head>

<body class='font-sans text-gray-900 antialiased bg-gray-50'>
    <div class='min-h-screen flex flex-col items-center justify-center'>
        <div class="w-full sm:max-w-md bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            <form action="{{ route('adminlogin.store') }}" method="post" class="p-6">
                @csrf
                <h3 class="text-2xl font-semibold mb-6 text-center text-gray-800">Đăng nhập</h3>

                <div class="mb-4">
                    <input type="text" placeholder="Số điện thoại"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name="phone_number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="password" placeholder="Mật khẩu"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name='password'>
                    @error('password')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-4">
                        <span class='text-sm'>{{ $errors->first('message') }}</span>
                    </div>
                @endif

                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full py-2 px-4 bg-blue-500 text-white font-bold rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Đăng nhập
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
