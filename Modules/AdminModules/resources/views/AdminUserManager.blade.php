@extends('adminmodules::layouts.master')
@section('content')
    <div class="container mx-auto p-6 w-full">
        <div class="flex justify-between items-center mb-6 bg-blue-500 p-4 rounded-lg shadow-md">
            <h2 class="text-white text-xl font-bold">Danh sách tài khoản người dùng</h2>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="flex items-center">
                                    <span class="mr-2 font-semibold">Tên:</span>
                                    <div id="name-{{ $user->id }}" class="bg-gray-100 p-2 rounded-md" contenteditable>
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="flex items-center">
                                    <span class="mr-2 font-semibold">Email:</span>
                                    <div id="email-{{ $user->id }}" class="bg-gray-100 p-2 rounded-md" contenteditable>
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="flex items-center">
                                    <span class="mr-2 font-semibold">SĐT:</span>
                                    <input type="number" id="phone_number-{{ $user->id }}"
                                        class="bg-gray-100 p-2 rounded-md w-full"
                                        value="{{ str_pad(ltrim($user->phone_number, '0'), 10, '0', STR_PAD_LEFT) }}">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                <a href="{{ route('AdminUserManager.destroy', ['id' => $user->id]) }}"
                                    class="text-red-600 hover:text-red-800"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                <button class="text-blue-600 hover:text-blue-800"
                                    onclick="updateUser({{ $user->id }})">Cập nhật</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function formatPhoneNumber(number) {
                // Thêm số 0 ở đầu nếu không có
                if (number.length > 0 && number[0] !== '0') {
                    number = '0' + number;
                }
                // Giới hạn số điện thoại ở 10 chữ số
                if (number.length > 10) {
                    number = number.substring(0, 10);
                }
                return number;
            }

            function updateUser(id) {
                var name = document.getElementById('name-' + id).innerText.trim();
                var email = document.getElementById('email-' + id).innerText.trim();
                var phoneNumber = document.getElementById('phone_number-' + id).value.trim();

                // Format lại số điện thoại
                phoneNumber = formatPhoneNumber(phoneNumber);

                var updateUserUrl = "{{ route('AdminUserManager.update', ['id' => ':id']) }}";

                $.ajax({
                    type: "POST",
                    url: updateUserUrl.replace(':id', id),
                    data: {
                        name: name,
                        email: email,
                        phone_number: phoneNumber,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        // Xử lý phản hồi thành công
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Xử lý lỗi
                    }
                });
            }
        </script>
    </div>
@endsection
