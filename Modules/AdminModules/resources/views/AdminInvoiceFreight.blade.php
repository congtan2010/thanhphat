@extends('adminmodules::layouts.master')
@section('content')
    <div class="container mx-auto p-6 w-full relative ">
        <div class="flex flex-row justify-between items-center mb-6 gap-20 bg-blue-500 p-4 rounded-lg shadow-md">
            <div class="text-white text-xl font-bold">Danh sách hóa đơn giao hàng</div>
            <button id="dropdown_addInvoiceFreight"
                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Thêm mới</button>
        </div>
    </div>

    @foreach ($InvoiceFreights as $InvoiceFreight)
        <div class="flex flex-col md:flex-row gap-5 mb-5 p-4 bg-gray-100 rounded-lg shadow-lg h-auto md:h-52">
            <div class="w-full md:w-1/3 flex flex-col justify-between">
                <div class="font-semibold">Thông tin người gửi</div>
                <div>Tên: <span class="font-light">{{ $InvoiceFreight->sender_name }}</span></div>
                <div>SDT: <span class="font-light">{{ $InvoiceFreight->sender_phone_number }}</span></div>
                <div class="flex items-center">
                    <div class="font-semibold">Địa chỉ:</div>
                    <div id="senderAddress-{{ $InvoiceFreight->id }}" class="ml-2 p-1 bg-white border rounded flex-grow"
                        contenteditable>
                        {{ $InvoiceFreight->sender_address }}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 flex flex-col justify-between">
                <div class="font-semibold">Thông tin người nhận</div>
                <div>Tên: <span class="font-light">{{ $InvoiceFreight->recipient_name }}</span></div>
                <div>SDT: <span class="font-light">{{ $InvoiceFreight->recipient_phone_number }}</span></div>
                <div class="flex items-center">
                    <div class="font-semibold">Địa chỉ:</div>
                    <div id="recipientAddress-{{ $InvoiceFreight->id }}" class="ml-2 p-1 bg-white border rounded flex-grow"
                        contenteditable>
                        {{ $InvoiceFreight->recipient_address }}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 flex flex-col justify-between">
                <div class="font-semibold">Thông tin của hàng kí gửi</div>
                <div>Trọng lượng:
                    <div id="weight-{{ $InvoiceFreight->id }}" class="font-light bg-white border rounded p-1"
                        contenteditable>
                        {{ $InvoiceFreight->weight }}
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="font-semibold">Giá:</div>
                    <div id="price-{{ $InvoiceFreight->id }}" class="ml-2 p-1 bg-white border rounded flex-grow"
                        contenteditable>
                        {{ $InvoiceFreight->price }}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 flex flex-col justify-between">
                <div class="font-semibold flex flex-row">Thanh toán:
                    @if ($InvoiceFreight->payer == 'sender')
                        <div class="ml-2">Người gửi</div>
                    @else
                        <div class="ml-2">Người nhận</div>
                    @endif
                </div>
                <div>
                    <div class="font-semibold">Trạng thái:</div>
                    <select id="status-{{ $InvoiceFreight->id }}" class="w-full p-2 border rounded">
                        <option value="notconfirm" {{ $InvoiceFreight->status == 'notconfirm' ? 'selected' : '' }}>Chưa xác
                            nhận</option>
                        <option value="confirm" {{ $InvoiceFreight->status == 'confirm' ? 'selected' : '' }}>Đã xác nhận
                        </option>
                        <option value="returned" {{ $InvoiceFreight->status == 'returned' ? 'selected' : '' }}>Hoàn đơn
                        </option>
                        <option value="finish" {{ $InvoiceFreight->status == 'finish' ? 'selected' : '' }}>Giao thành công
                        </option>
                    </select>
                </div>
                <div>
                    <div class="font-semibold">Vị trí hiện tại:</div>
                    <select id="current_position-{{ $InvoiceFreight->id }}" class="w-full p-2 border rounded">
                        <option value="Kho_Nghe_An"
                            {{ $InvoiceFreight->current_position == 'Kho_Nghe_An' ? 'selected' : '' }}>Kho Nghệ An</option>
                        <option value="Kho_Ha_Noi"
                            {{ $InvoiceFreight->current_position == 'Kho_Ha_Noi' ? 'selected' : '' }}>Kho Hà Nội</option>
                        <option value="Kho_Thanh_Hoa"
                            {{ $InvoiceFreight->current_position == 'Kho_Thanh_Hoa' ? 'selected' : '' }}>Kho Thanh Hóa
                        </option>
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/3 flex flex-col gap-3 items-center justify-center">
                <a class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                    href="{{ route('AdminFreightManager.destroy', ['id' => $InvoiceFreight->id]) }}">Hủy</a>
                <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600"
                    onclick="updateInvoiceFreight({{ $InvoiceFreight->id }})">Cập nhật</button>
            </div>
        </div>
    @endforeach

    {{-- Dropdown form --}}
    <div id="targetDropdown_addInvoiceFreight" class="hidden absolute bg-white p-6 rounded-lg shadow-lg z-50 mt-2 top-1/2">
        <form action="{{ route('AdminFreightManager.store') }}" method="post">
            @csrf
            <div class="flex flex-row gap-5">

                <div class="flex flex-col space-y-2">
                    <input class="text-center p-2 border border-gray-300 rounded" placeholder="Tên người gửi"
                        name="sender_name" required>
                    <input class="text-center p-2 border border-gray-300 rounded" placeholder="Số điện thoại người gửi"
                        name="sender_phone_number" required>
                    <input class="text-center p-2 border border-gray-300 rounded" placeholder="Địa chỉ người gửi"
                        name="sender_address" required>
                </div>
                <div class="flex flex-col space-y-2">
                    <input class="text-center p-2 border border-gray-300 rounded" placeholder="Tên người nhận"
                        name="recipient_name" required>
                    <input class="text-center p-2 border border-gray-300 rounded" placeholder="Số điện thoại người nhận"
                        name="recipient_phone_number" required>
                    <input class="text-center p-2 border border-gray-300 rounded" placeholder="Địa chỉ người nhận"
                        name="recipient_address" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Thêm</button>

            </div>
        </form>
    </div>
    {{-- End dropdown --}}

    {{-- Start script --}}
    <script>
        function updateInvoiceFreight(id) {
            var senderAddress = document.getElementById('senderAddress-' + id).innerText;
            var recipientAddress = document.getElementById('recipientAddress-' + id).innerText;
            var weight = document.getElementById('weight-' + id).innerText;
            var price = document.getElementById('price-' + id).innerText;

            var status = document.getElementById('status-' + id).value;
            var currentPosition = document.getElementById('current_position-' + id).value;

            var updateInvoiceFreightUrl = "{{ route('AdminFreightManager.update', ['id' => ':id']) }}";

            $.ajax({
                type: "POST",
                url: updateInvoiceFreightUrl.replace(':id', id),
                data: {
                    senderAddress: senderAddress,
                    recipientAddress: recipientAddress,
                    weight: weight,
                    price: price,
                    status: status,
                    currentPosition: currentPosition,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    // Handle success response
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle error
                }
            });
        }

        $(document).ready(function() {
            $('#dropdown_addInvoiceFreight').click(function() {
                $('#targetDropdown_addInvoiceFreight').toggleClass('hidden');
            });
        });
    </script>
    {{-- End script --}}
@endsection
