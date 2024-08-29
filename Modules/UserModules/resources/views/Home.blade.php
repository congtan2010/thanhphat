<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <title>Thành Phát</title>
    @vite('resources/css/app.css')
</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <x-usermodules::navbar>
    </x-usermodules::navbar>

    <!-- Hero Section -->
    <section class='lg:pt-[100px] pt-0 z-50 '>
        <img class=" object-fill h-[500px] w-full " src="{{ asset('image/thanhphat.jpg') }}">
    </section>
    <!-- Popular Routes Section -->
    <section id='targetDropdownItem1' class='w-full flex flex-col  pt-20 px-5  '>
        <p class='font-bold font-mono text-3xl text-left my-10  '>Các tuyến đường phổ biến</p>

        <div id='slick-slider'
            class='w-full h-full overflow-hidden flex justify-start  flex-row  gap-10  relative z-10 '>

            <div class ='block w-1/3 px-10  '>
                <img class=" h-[200px] w-full object-fill " src="{{ asset('image/vinh.jpg') }}">
                <div class='w-full  '>
                    <p class="font-bold text-center">Nghệ An - Thanh Hóa (VIP)</p>
                    <p class='text-center'>Giá vé:200.000d</p>
                </div>
            </div>

            <div class ='block w-1/3 px-10 '>
                <img class=" h-[200px] w-full object-fill " src="{{ asset('image/thanhhoa.png') }}">
                <div class='w-full  '>
                    <p class="font-bold text-center">Thanh Hóa - Hà Nội (VIP)</p>
                    <p class='text-center'>Giá vé:250.000d</p>
                </div>
            </div>
            <div class ='block w-1/3 px-10 '>
                <img class=" h-[200px] w-full object-fill " src="{{ asset('image/hanoi.jpg') }}">
                <div class='w-full  '>
                    <p class="font-bold text-center">Nghệ An - Hà Nội (VIP)</p>
                    <p class='text-center'>Giá vé:450.000d</p>
                </div>
            </div>

            <div class ='block w-1/3 px-10 '>
                <img class=" h-[200px] w-full  object-fill " src="{{ asset('image/vinh1.jpeg') }}">
                <div class='w-full  '>
                    <p class="font-bold text-center">Nghệ An - Thanh Hóa </p>
                    <p class='text-center'>Giá vé:150.000d</p>
                </div>
            </div>
            <div class ='block w-1/3 px-10 '>
                <img class=" h-[200px] w-full  object-fill " src="{{ asset('image/thanhhoa1.jpeg') }}">
                <div class='w-full  '>
                    <p class="font-bold text-center">Thanh Hóa - Hà Nội </p>
                    <p class='text-center'>Giá vé:200.000d</p>
                </div>
            </div>
            <div class ='block w-1/3 px-10 '>

                <img class=" h-[200px] w-full  object-fill " src="{{ asset('image/hanoi1.jpeg') }}">

                <div class='w-full  '>
                    <p class="font-bold text-center">Nghệ An - Hà Nội </p>
                    <p class='text-center'>Giá vé:350.000d</p>
                </div>
            </div>


        </div>
    </section>
    <!-- Amenities Section -->
    <section id="targetDropdownItem2" class="flex flex-col items-center px-10 py-20">
        <p class="font-bold text-2xl mb-4">Dịch vụ tiện nghi</p>
        <p class="text-center mb-10">Chúng tôi luôn mong muốn mang đến cho quý khách những dịch vụ và trải nghiệm tốt
            nhất</p>
        <div class="flex flex-wrap gap-6 justify-center">
            @foreach ([['src' => 'khieunai.jpg', 'title' => 'Phản hồi - Khiếu nại', 'description' => 'Với mỗi khiếu nại, chúng tôi cam kết giải quyết nhanh chóng và hiệu quả'], ['src' => 'hotline.png', 'title' => 'Đặt vé online', 'description' => 'Quý khách có thể gọi điện trực tiếp đến hotline để đặt vé'], ['src' => 'giaohang.png', 'title' => 'Giao hàng trong ngày', 'description' => 'Giao hàng trong thời gian ngắn nhất, với chất lượng tốt nhất'], ['src' => 'nha.png', 'title' => 'Trung chuyển khách hàng', 'description' => 'Đón và trả tại địa điểm mà quý khách yêu cầu']] as $service)
                <div class="w-1/4 flex flex-col items-center bg-white shadow-md rounded-lg p-4">
                    <img class="h-24 w-24 object-cover mb-4" src="{{ asset('image/' . $service['src']) }}"
                        alt="{{ $service['title'] }}">
                    <p class="font-bold text-center mb-2">{{ $service['title'] }}</p>
                    <p class="text-center text-gray-600">{{ $service['description'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Section -->
    <section id="targetDropdownItem3" class="flex flex-col items-center px-10 py-20">
        <p class="font-bold text-2xl mb-10">Liên hệ đặt vé</p>
        <div class="flex gap-6">
            @foreach ([['src' => 'hotlinedatve.jpg', 'title' => 'Đặt vé qua hotline', 'contact' => '0987629877'], ['src' => 'imagessdt.jpeg', 'title' => 'Đặt vé qua số điện thoại', 'contact' => '0777156017'], ['src' => 'vanphong.png', 'title' => 'Đặt vé trực tiếp tại văn phòng', 'contact' => 'Mua vé tại phòng bán vé']] as $contact)
                <div class="w-1/3 bg-white shadow-md rounded-lg p-4 flex flex-col items-center">
                    <img class="h-32 w-auto object-cover mb-4" src="{{ asset('image/' . $contact['src']) }}"
                        alt="{{ $contact['title'] }}">
                    <p class="font-bold mb-2">{{ $contact['title'] }}</p>
                    <p class="text-red-500 font-bold">{{ $contact['contact'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Quality Commitment Section -->
    <section id="targetDropdownItem4" class="flex flex-col items-center px-10 py-20">
        <p class="text-2xl font-bold mb-10 text-center">CAM KẾT CHẤT LƯỢNG VỚI BỘ TIÊU CHUẨN NHÀ XE CỦA THÀNH PHÁT</p>
        <div class="flex gap-6">
            @foreach ([['src' => 'dautich.png', 'title' => 'Dịch vụ uy tín', 'description' => 'Xuất bến đúng giờ, cam kết KHÔNG bắt khách dọc đường'], ['src' => 'dautich.png', 'title' => 'Giữ chỗ 100%', 'description' => 'Mọi hành khách đặt vé sẽ được giữ chỗ 100%, KHÔNG để khách nằm luồng.'], ['src' => 'dautich.png', 'title' => 'Giá vé ổn định', 'description' => 'Cam kết bán đúng giá niêm yết, KHÔNG tăng giá dịp lễ Tết.']] as $commitment)
                <div class="w-1/3 flex flex-col items-center text-center">
                    <img class="h-24 w-24 object-cover mb-4" src="{{ asset('image/' . $commitment['src']) }}"
                        alt="{{ $commitment['title'] }}">
                    <p class="font-bold mb-2">{{ $commitment['title'] }}</p>
                    <p class="text-gray-600">{{ $commitment['description'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-gray-100 py-10 px-20 border-t border-gray-300">
        <img class="w-36 h-auto mb-6" src="{{ asset('image/logo.png') }}" alt="Thành Phát">
        <div class="flex flex-wrap gap-6">
            <div class="w-full md:w-1/3">
                <p class="font-bold mb-2">Nhà xe Thành Phát</p>
                <p>Địa chỉ: Xóm Khánh Hậu, xã Hưng Hòa, thành phố Vinh, tỉnh Nghệ An</p>
                <p>Hotline: 0777156017</p>
                {{-- <a href="https://www.facebook.com/xe.tanminhha/">FB: https://www.facebook.com/xe.tanminhha/</a> --}}
            </div>
            <div class="w-full md:w-1/3">
                <p class="font-bold mb-2">Khách hàng</p>
                <p>Đặt vé online</p>
                <p>Kiểm tra vé</p>
                <p>Chính sách hủy vé/đổi trả</p>
                <p>Chính sách bảo mật thông tin</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#slick-slider").slick({
                slidesToShow: 3,
                infinite: true,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                nextArrow: `<button type='button' class='slick-next'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></button>`,
                prevArrow: `<button type='button' class='slick-prev'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg></button>`,
            });

            // Smooth scroll
            $("#dropdownItem1").click(function() {
                $('html, body').animate({
                    scrollTop: $("#targetDropdownItem1").offset().top
                }, 1000);
            });

            $("#dropdownItem2").click(function() {
                $('html, body').animate({
                    scrollTop: $("#targetDropdownItem2").offset().top
                }, 1000);
            });

            $("#dropdownItem3").click(function() {
                $('html, body').animate({
                    scrollTop: $("#targetDropdownItem3").offset().top
                }, 1000);
            });

            $("#dropdownItem4").click(function() {
                $('html, body').animate({
                    scrollTop: $("#targetDropdownItem4").offset().top
                }, 1000);
            });
        });
    </script>
</body>

</html>
