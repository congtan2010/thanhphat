<div>
    <nav
        class=" h-[100px]  w-full  border-2 border-b-blue-400    flex flex-row lg:bg-white  
    lg:fixed relative z-30">

        <div class=" w-1/4 lg:basis-1/6 pl-5 pt-1 cursor-pointer ">

            <img id="logo" onclick="topFunction()" class="object-cover h-[90px] rounded-full shadow-md"
                src="{{ asset('image/logo.png') }}">

        </div>
        <div id='top-menu-expanded'
            class=' pl-5 lg:w-5/6 lg:h-full  lg:flex lg:justify-start  lg:flex-row lg:items-center lg:top-0 lg:bg-white top-menu-expanded '>
            <div class="  group relative   ">
                <a id='menu-item'
                    class= " inline-flex text-bold  text-black px-4 py-4 text-base border-none cursor-pointer"
                    href="http://127.0.0.1:8000">TRANG
                    CHỦ
                    <svg xmlns="http://www.w3.org/2000/svg" cover="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-3 h-3 mt-2 ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </a>

                <div id='dropdown-items'
                    class="  lg:w-[250px]    w-full hidden absolute bg-gray-100 min-w-160 shadow-md z-10  group-hover:block">
                    <p id='dropdownItem1' class="block px-4 pt-2 hover:bg-gray-100 hover:text-red-600">
                        Các tuyến đường phổ biến</p>
                    <p id='dropdownItem2'
                        class="text-black block py-3 px-4 no-underline hover:bg-gray-100  hover:text-red-600">
                        Dịch vụ tiện nghi</p>
                    <p id="dropdownItem3"
                        class="text-black block py-3 px-4 no-underline hover:bg-gray-100  hover:text-red-600">
                        Liên hệ đặt vé</p>
                    <p id="dropdownItem4"
                        class="text-black block py-3 px-4 no-underline hover:bg-gray-100  hover:text-red-600">
                        Cam Kết Chất Lượng </p>
                </div>
            </div>

            <a class="inline-flex text-black  px-4 py-4 text-base border-none cursor-pointer hover:text-red-600"
                href='http://127.0.0.1:8000/Dich-vu-van-tai-hanh-khach'>
                DỊCH VỤ VẬN TẢI HÀNH KHÁCH
            </a>

            <div class="h-[56px]
            px-4 py-4">
                <a class=" text-black  text-base border-none cursor-pointer  hover:text-red-600"
                    href='http://127.0.0.1:8000/Dich-vu-van-tai-hang-hoa'>DỊCH VỤ VẬN TẢI HÀNG HÓA
                </a>
            </div>
            <div class = 'h-[56px]  px-4 py-4'>
                <a class=" text-black text-base border-none cursor-pointer  hover:text-red-600"
                    href='http://127.0.0.1:8000/hoa-don'>HÓA ĐƠN
                </a>
            </div>
            @if (Auth::check())
                <div id='user' class="flex flex-row relative  lg:w-1/6 justify-center ">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <div id="userDetail" class="absolute w-[160px] mt-[60px] hidden bg-gray-100  h-[100px]  ">
                        <p class="uppercase text-center  pt-4">chào: {{ Auth::user()->name }}</p>

                        <button id="logoutButton">
                            <a class="text-center pt-2" href="{{ route('logout.destroy') }}">Đăng xuất</a>
                        </button>

                    </div>
                @else
                    <div
                        class=" flex flex-col justify-start items-center lg:flex lg:justify-start  lg:flex-row lg:items-center ">
                        <a class="   text-black px-4 text-base border-none cursor-pointer  hover:text-red-600"
                            href='http://127.0.0.1:8000/register'>ĐĂNG KÍ
                        </a>
                        <a class=" text-black px-4  text-base border-none cursor-pointer pt-4 lg:pt-0 hover:text-red-600"
                            href='http://127.0.0.1:8000/login'>ĐĂNG NHẬP
                        </a>
                    </div>
            @endif
        </div>
        <div class=' flex grow order-last  justify-end relative   items-center lg:hidden '>
            <svg id='top-menu-icon' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class=" h-6 w-6 cursor-pointer mr-[60px]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
    </nav>
    <script>
        $(document).ready(function() {
            $("#logo").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
            });
        });

        $(document).ready(function() {
            $("#top-menu-icon").click(function() {
                $("#top-menu").toggle();
            });
        });
        $(document).ready(function() {
            $("#user").click(function() {
                $("#userDetail").toggle();
            });
        });
        $('#logoutButton').click(function() {
            // Gửi yêu cầu logout bằng AJAX
            $.ajax({
                type: 'POST',
                url: '/logout',
                success: function(response) {
                    // Chuyển hướng người dùng đến trang đăng nhập sau khi logout thành công
                    window.location.href = '/login';
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu cần
                }
            });
        });
    </script>
</div>
