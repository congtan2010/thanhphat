@extends('adminmodules::layouts.master')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex flex-row border border-blue-500 mb-4">
            <form class="flex flex-row bg-white p-4 space-x-4 w-full" action="{{ route('Ticket.index') }}" method="GET">
                <input class="text-center p-2 border border-gray-300 rounded" list="startingPoin" placeholder="Điểm đi"
                    name="startingPoin" required>
                <datalist id="startingPoin">
                    <option value="Hà Nội">
                    <option value="Nghệ An">
                    <option value="Thanh Hóa">
                </datalist>

                <input class="text-center p-2 border border-gray-300 rounded" list="destination" placeholder="Điểm đến"
                    name="destination" required>
                <datalist id="destination">
                    <option value="Hà Nội">
                    <option value="Nghệ An">
                    <option value="Thanh Hóa">
                </datalist>

                <input class="text-center p-2 border border-gray-300 rounded" type="date" name="date" required
                    value="{{ \Carbon\Carbon::now()->toDateString() }}" min="{{ \Carbon\Carbon::now()->toDateString() }}">

                <button type="submit" class=" font-bold bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tìm
                    kiếm</button>
            </form>
        </div>
        @php
            // dd($tickets);
        @endphp
        @foreach ($itineraryManagements as $index => $itineraryManagement)
            <div class="bg-gray-100 rounded-lg shadow-lg mb-6  h-96 overflow-hidden">
                <div class="flex justify-between bg-blue-300 p-4 rounded-t-lg">
                    <div class="font-bold text-black text-sm">Xe: {{ $itineraryManagement->license_plate }}
                        ({{ $itineraryManagement->vehicle_type }})
                    </div>
                    <div class="font-bold text-black text-sm">Tuyến: {{ $itineraryManagement->starting_poin }} -
                        {{ $itineraryManagement->destination }}</div>
                    <div class="font-bold text-black text-sm">
                        {{ \Carbon\Carbon::parse($itineraryManagement->start_time)->format('H:i d/m ') }} -
                        {{ \Carbon\Carbon::parse($itineraryManagement->end_time)->format('H:i d/m ') }}</div>
                    <div class="font-bold text-black text-sm">Giá: {{ $itineraryManagement->price }}</div>
                    <div class="font-bold text-black text-sm">Đã
                        đặt:{{ $itineraryManagement->total_tickets }}/{{ $itineraryManagement->sum_ticket }}</div>
                    <button data-target="dropdown_{{ $index }}"
                        class="dropdown bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Thêm vé</button>
                </div>
                <div id="dropdown_{{ $index }}" class="hidden border border-gray-300 bg-white mt-2 p-4 rounded-lg">
                    <form
                        action="{{ route('AdminCreateBookTicket', ['id' => $itineraryManagement->coach_id, 'itinerary_management_id' => $itineraryManagement->itinerary_management_id]) }}"
                        method="POST">
                        @csrf
                        <div class="flex flex-col space-y-2">
                            <input class="text-center p-2 border border-gray-300 rounded" placeholder="Tên" name="userName"
                                required>
                            <input class="text-center p-2 border border-gray-300 rounded" placeholder="Số điện thoại"
                                name="phoneNumber" required>
                            <input class="text-center p-2 border border-gray-300 rounded" placeholder="Vị trí ghế"
                                name="seat_position" required>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Thêm
                                vé</button>
                        </div>
                    </form>
                </div>
                <div class="overflow-y-scroll h-64">
                    <table class="w-full bg-white rounded-lg ">
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($tickets as $ticket)
                                @if ($ticket->id == $itineraryManagement->itinerary_management_id)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap">Tên: {{ $ticket->userName }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap" contenteditable
                                            id="phoneNumber-{{ $ticket->tickets_id }}">
                                            {{ str_pad($ticket->phoneNumber, 10, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Vị trí: {{ $ticket->seat_position }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select id="status-{{ $ticket->tickets_id }}"
                                                class="p-2 border border-gray-300 rounded">
                                                <option value="notpay" {{ $ticket->status == 'notpay' ? 'selected' : '' }}>
                                                    Chưa thanh toán</option>
                                                <option value="pay" {{ $ticket->status == 'pay' ? 'selected' : '' }}>Đã
                                                    thanh toán</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                            <button onclick="updateTicket({{ $ticket->tickets_id }})"
                                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Cập
                                                nhật</button>

                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                href="{{ route('Ticket.destroy', ['id' => $ticket->tickets_id]) }}"
                                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hủy</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(document).on('click', '.dropdown', function(e) {
            var targetId = $(this).data('target');
            var $target = $('#' + targetId);

            $('[id^="dropdown_"]').not($target).hide();

            $target.toggle();

            e.stopPropagation();
        });

        $(document).on('click', function() {
            $('[id^="dropdown_"]').hide();
        });

        $(document).on('click', '[id^="dropdown_"]', function(e) {
            e.stopPropagation();
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function updateTicket(ticketId) {
            var newStatus = document.getElementById('status-' + ticketId).value;
            var updateTicketUrl = "{{ route('Ticket.update', ['id' => ':ticketId']) }}";
            var phoneNumber = document.getElementById('phoneNumber-' + ticketId).innerText;
            $.ajax({
                type: "POST",
                url: updateTicketUrl.replace(':ticketId', ticketId),
                data: {
                    ticketId: ticketId,
                    newStatus: newStatus,
                    phoneNumber: phoneNumber,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>
@endsection
