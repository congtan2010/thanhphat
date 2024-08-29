<div>
    <nav
        class=" h-[100px]  w-full  border-2 border-b-blue-400    flex flex-row lg:bg-white  
    lg:fixed relative z-30">

        <div class=" w-1/4 lg:basis-1/6 pl-5 pt-1 cursor-pointer ">

            <img id='logo' onclick="topFunction()" class=" object-cover   h-[90px]  "
                src="{{ asset('image/logo.png') }}">

        </div>
        <div id='top-menu-expanded'
            class=' pl-5 lg:w-5/6 lg:h-full  lg:flex lg:justify-start  lg:flex-row lg:items-center lg:top-0 lg:bg-white top-menu-expanded '>
            @if (Auth::check())
                <div id='staff' class="flex flex-row relative  lg:w-1/6 justify-center ">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <div id="userDetail" class="absolute w-[160px] mt-[60px] hidden bg-gray-100  h-[100px]  ">
                        <p class="uppercase text-center  pt-4">chào: {{ Auth::guard('staff')->user()->fullname }}</p>
                        <button id="logoutButton">
                            <a class="text-center pt-2" href="{{ route('logout.destroy') }}">Đăng xuất</a>
                        </button>
                    </div>
                @else
                    <div
                        class=" flex flex-col justify-start items-center lg:flex lg:justify-start  lg:flex-row lg:items-center ">
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
