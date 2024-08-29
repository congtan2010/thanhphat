<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Thành Phát</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-800">

    <x-usermodules::navbar></x-usermodules::navbar>

    <section class="pt-32 px-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-bold mb-4">Thông tin chuyển khoản</h2>
            <div class="flex flex-col md:flex-row md:items-center md:space-x-10">
                <div class="mb-4 md:mb-0">
                    <p>Ngân hàng: MB Bank</p>
                    <p>Số tài khoản: 0080117591003</p>
                    <p>Tên chủ tài khoản: ĐỖ CÔNG TẤN</p>
                </div>
                <div class="mb-4 md:mb-0">
                    <img class="object-cover h-24 w-24" src="{{ asset('image/qr.jpg') }}" alt="QR Code">
                </div>
                <div>
                    <p>Chuyển khoản 100% giá trị hóa đơn với nội dung chuyển khoản là số điện thoại đặt vé để thanh toán
                        hóa đơn.</p>
                    <p>Hủy vé trước 1 ngày để nhận lại 100% tiền vé. Nếu hủy vé muộn sẽ không được hoàn tiền.</p>
                    <p>Liên hệ hotline: 0777156017 để được tư vấn thêm.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="px-10 mt-10">
        @if (Auth::check())
            <div class="space-y-10">
                @foreach ($results as $result)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-bold underline mb-4">Hóa đơn đặt vé</h3>
                        <div class="flex flex-wrap gap-4">
                            <p><span class="font-bold">Biển số xe:</span> {{ $result->license_plate }}</p>
                            <p><span class="font-bold">Vị trí ghế:</span> {{ $result->seat_position }}</p>
                            <p><span class="font-bold">Giá:</span> {{ number_format($result->price, 0, ',', '.') }} VND
                            </p>
                            <p><span class="font-bold">Lộ trình:</span> {{ $result->starting_poin }} -
                                {{ $result->destination }}</p>
                            <p><span class="font-bold">Thời gian:</span>
                                {{ \Carbon\Carbon::parse($result->start_time)->format('H:i d/m') }} -
                                {{ \Carbon\Carbon::parse($result->end_time)->format('H:i d/m') }}</p>
                            <a class="text-red-500 font-bold ml-10"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                href="{{ route('invoices.destroy', ['id' => $result->id]) }}">Hủy vé</a>
                        </div>
                        <div class="mt-4">
                            @if ($result->status == 'notpay')
                                <p class="text-red-500">Hóa đơn chưa được thanh toán. Bạn vui lòng thanh toán hóa đơn.
                                </p>
                            @else
                                <p class="text-green-500">Hóa đơn đã được thanh toán.</p>
                            @endif
                        </div>
                    </div>
                @endforeach

                @foreach ($datas as $data)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-bold underline mb-4">Hóa đơn gửi hàng</h3>
                        <div class="flex flex-wrap gap-4">
                            <div>
                                <p><span class="font-bold">Tên người nhận:</span> {{ $data->recipient_name }}</p>
                                <p><span class="font-bold">Số điện thoại người nhận:</span>
                                    {{ $data->recipient_phone_number }}</p>
                                <p><span class="font-bold">Địa chỉ người nhận:</span> {{ $data->recipient_address }}
                                </p>
                            </div>
                            <div>
                                <p><span class="font-bold">Người gửi:</span> {{ $data->sender_name }}</p>
                                <p><span class="font-bold">Số điện thoại người gửi:</span>
                                    {{ $data->sender_phone_number }}</p>
                                <p><span class="font-bold">Địa chỉ người gửi:</span> {{ $data->sender_address }}</p>
                            </div>
                            <a class="text-red-500 font-bold ml-10"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                href="{{ route('invoices.destroy', ['id' => $data->id]) }}">Hủy hóa đơn</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg p-6 mt-10">
                <p>{{ $message }}</p>
            </div>
        @endif
    </section>

</body>

</html>
