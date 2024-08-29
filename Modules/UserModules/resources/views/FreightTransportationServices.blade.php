<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <title>Thành Phát</title>
    <!-- Import Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Import jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <x-usermodules::navbar>
    </x-usermodules::navbar>

    <section class=" flex flex-row px-10 pt-40">
        <div class="flex flex-row w-full">
            <div class="w-1/2 h-full pr-5">
                <p class="text-center font-bold">Nội quy khi gửi hàng</p>
                <p class="mb-2"><b>Đóng gói đúng cách:</b> Yêu cầu đóng gói hàng hóa một cách an toàn và chắc chắn để
                    đảm bảo không gây hỏng hóc hoặc mất mát trong quá trình vận chuyển.</p>
                <p class="mb-2"><b>Thông tin gửi hàng chính xác:</b> Đảm bảo cung cấp thông tin đầy đủ và chính xác về
                    người gửi, người nhận và hàng hóa để tránh nhầm lẫn hoặc giao nhận sai.</p>
                <p class="mb-2"><b>Trọng lượng và kích thước hợp lý:</b> Tuân thủ quy định về trọng lượng tối đa và
                    kích thước của gói hàng để tránh phải trả thêm phí hoặc gặp khó khăn trong quá trình vận chuyển.</p>
                <p class="mb-2"><b>Thời gian bảo quản và xử lý hàng hóa:</b> Cung cấp hướng dẫn về cách bảo quản và xử
                    lý hàng hóa một cách an toàn sau khi giao nhận.</p>
            </div>
            <div class="w-1/2 px-5 mx-5 border-2 border-blue-500 bg-blue-100 rounded-lg">
                <p class="text-center font-bold">Hóa đơn gửi hàng</p>
                <form id="freight-form" action="{{ route('FreightTransportationServices.store') }}" method="post"
                    class="flex flex-col space-y-4">
                    @csrf
                    <input class="w-full  border rounded" type="text" placeholder="Tên người gửi" name="sender_name"
                        required>
                    <div class="w-full">
                        <input class="w-full p-2 border rounded" type="number" placeholder="Số điện thoại người gửi"
                            name="sender_phone_number" required>
                        @error('sender_phone_number')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="w-full  border rounded" type="text"
                        placeholder="Địa chỉ người gửi (ghi địa chỉ cụ thể gồm số nhà, tên đường ...)"
                        name="sender_address" required>
                    <input class="w-full border rounded" type="text" placeholder="Trọng lượng (đơn vị kg)"
                        name="weight" required>
                    <input class="w-full p-2 border rounded" type="text" placeholder="Tên người nhận"
                        name="recipient_name" required>
                    <div class="w-full">
                        <input class="w-full p-2 border rounded" type="number" placeholder="Số điện thoại người nhận"
                            name="recipient_phone_number" required>
                        @error('recipient_phone_number')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="w-full p-2 border rounded" type="text"
                        placeholder="Địa chỉ người nhận (ghi địa chỉ cụ thể gồm số nhà, tên đường ...)"
                        name="recipient_address" required>
                    <select class="w-full p-2 border rounded" name="payer" required>
                        <option value="" disabled selected>Người thanh toán</option>
                        <option value="sender">Người gửi</option>
                        <option value="Receiver">Người nhận</option>
                    </select>

                    @if (Auth::check())
                        <div class="flex justify-center">
                            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded">Tạo hóa
                                đơn</button>
                        </div>
                    @else
                        <div class="flex justify-center">
                            <button type="button" onclick="alert('Bạn chưa đăng nhập')"
                                class="w-full bg-blue-500 text-white font-bold py-2 rounded">Tạo hóa đơn</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#freight-form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: '{{ route('FreightTransportationServices.store') }}',
                    method: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        alert('Hóa đơn đã được tạo thành công!'); // Success message
                        $('#freight-form')[0].reset(); // Reset form after submission
                    },
                    error: function(xhr) {
                        alert('Đã xảy ra lỗi: ' + xhr.responseText); // Error message
                    }
                });
            });
        });
    </script>
</body>

</html>
