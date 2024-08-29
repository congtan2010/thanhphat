<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <title>Thành Phát</title>
</head>
@vite('resources/css/app.css')




<body class='font-sans text-gray-900 antialiased  '>

    <div class='min-h-screen  flex flex-col sm:justify-center items-center overflow-hidden '>
        <div
            class="  w-full  sm:max-w-md leading-tight focus:outline-none focus:shadow-outline border border-gray-100 ">
            <form action="{{ route('Register.store') }}" method="post"
                class="shadow-md bg-gray-100 rounded pt-4 pb-4 mb-4  ">
                @csrf
                <h3 class="text-2xl font-semibold mb-4 flex flex-col items-center justify-center">Đăng kí</h3>
                <div class="py-6 px-6    ">
                    <input type="text" placeholder="Họ và tên"
                        class="  border rounded w-full   text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="name" value="{{ old('name') }}">

                    @error('name')
                        <span class='p-0 text-sm text-red-600'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="px-6">
                    <input type="text" placeholder="Email"
                        class='  border rounded w-full  text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
                        name="email" value="{{ old('email') }}" />
                    @error('email')
                        <span class='text-sm text-red-600'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="p-6">
                    <input type="number" placeholder="Số điện thoại" id="sdt"
                        class='appearance-none border rounded w-full  text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
                        name='phone_number' value="{{ old('Phone_number') }}" />
                    @error('phone_number')
                        <span class='text-sm text-red-600'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="px-6">
                    <input type="password" placeholder="Mật khẩu"
                        class="appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name ='password' />
                    @error('password')
                        <span class='text-sm text-red-600'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="p-6">
                    <input type="password" placeholder="Xác nhận mật khẩu"
                        class="appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name = 'password_confirm'>
                    @error('password_confirm')
                        <span class='text-sm text-red-600'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col items-center justify-between">
                    <button type="submit"
                        class=" text-black font-bold 
                    py-2 px-4 rounded focus:outline-none focus:shadow-outline">Đăng
                        kí</button>

                    <a class="pt-1 pb-4 mb-4" href='http://127.0.0.1:8000/login'>Đã có tài khoản</a>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
