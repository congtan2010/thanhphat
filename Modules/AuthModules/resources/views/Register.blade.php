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
        <div class="w-full sm:max-w-md bg-white shadow-lg rounded-lg border border-gray-200">
            <form action="{{ route('Register.store') }}" method="post" class="p-6 space-y-4">
                @csrf

                <h3 class="text-2xl font-semibold mb-6 text-center text-gray-800">Đăng ký</h3>

                <div>
                    <input type="text" placeholder="Họ và tên"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" placeholder="Email"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name="email" value="{{ old('email') }}" />
                    @error('email')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="number" placeholder="Số điện thoại" id="sdt"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name='phone_number' value="{{ old('phone_number') }}" />
                    @error('phone_number')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="password" placeholder="Mật khẩu"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name='password' />
                    @error('password')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="password" placeholder="Xác nhận mật khẩu"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        name='password_confirm'>
                    @error('password_confirm')
                        <span class='text-sm text-red-600 mt-1 block'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col items-center">
                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 text-white font-bold rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Đăng ký
                    </button>

                    <a href="{{ url('/login') }}" class="mt-4 text-indigo-600 hover:text-indigo-700">Đã có tài khoản?
                        Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
