<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <title>Thành Phát</title>
</head>
@vite('resources/css/app.css')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <x-usermodules::navbar>
    </x-usermodules::navbar>
    <marquee class="pt-[100px] mx-10 text-lg text-center text-blue-700">
        Sự an tâm của bạn là niềm vinh dự của chúng tôi - Thành Phát, đối tác đáng tin cậy trên mọi hành trình
    </marquee>
    <section class="w-full  flex flex-row px-10 ">

        <div class="flex flex-row h-full w-full border-2 border-blue-500 rounded-lg">
            <form class="flex flex-row w-full bg-white h-2/3" action={{ route('SearchItinerary') }} method="GET">

                <input class="text-center" list="startingPoin" placeholder="Điểm đi" name="startingPoin" required>
                <datalist id="startingPoin">
                    <option class="text-center" value="Hà Nội">
                    <option class="text-center" value="Nghệ An">
                    <option class="text-center" value="Thanh Hóa">
                </datalist>
                <input class="text-center" list="destination" placeholder="Điểm đến" name="destination" required>
                <datalist id="destination">
                    <option class="text-center" value="Hà Nội">
                    <option class="text-center" value="Nghệ An">
                    <option class="text-center" value="Thanh Hóa">
                </datalist>
                <input class=' flex justify-center items-end ' type="date" name="date" required
                    value="{{ \Carbon\Carbon::now()->toDateString() }}"
                    min="{{ \Carbon\Carbon::now()->toDateString() }}">
                <button type="submit"
                    class=" text-black font-bold 
                    py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tìm
                    kiếm</button>
            </form>
        </div>
    </section>
    <section>
        <div class=" px-10">
            <div class="bg-blue-100">
                <p class="text-center font-bold ">Danh sách các chuyến xe</p>
            </div>
            <table class="w-full text-sm text-left   ">
                <thead class="text-xs text-gray-700 uppercase  ">
                    <tr class="flex flex-row justify-between px-10">
                        <th class="tableItems ">
                            Điểm đi
                        </th>
                        <th class="tableItems">
                            Điểm đến
                        </th>
                        <th scope="col" class="tableItems">
                            Thời gian khởi hành
                        </th>
                        <th scope="col" class="tableItems pr-5">
                            Giá
                        </th>
                        <th scope="col" class="tableItems">
                            Loại xe
                        </th>
                        <th scope="col" class="tableItems">
                            Đã đặt
                        </th>
                        <th scope="col" class="tableItems">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <?php dd($ticketsBooked);
                    ?> --}}
                    @if ($results->isEmpty())
                        <td>Không có kết quả tìm kiếm</td>
                    @else
                        @foreach ($results as $index => $result)
                            <tr class=" bg-gray-300 w-full flex flex-col justify-between my-3 z-10  ">
                            <tr class="flex flex-row justify-between px-10">
                                <td class="tableItems font-medium  whitespace-nowrap ">
                                    {{ $result->starting_poin }}
                                </td>
                                <td class="tableItems ">
                                    {{ $result->destination }}
                                </td>

                                <td class="tableItems ">
                                    {{ \Carbon\Carbon::parse($result->start_time)->format('H:i d/m ') }} -
                                    {{ \Carbon\Carbon::parse($result->end_time)->format('H:i d/m ') }}
                                </td>
                                <td class="tableItems ">
                                    {{ number_format($result->price, 0, ',', '.') }} VND
                                </td>
                                <td class="tableItems ">
                                    {{ $result->vehicle_type }}
                                </td>
                                <td class="tableItems ">
                                    @foreach ($totalTickets as $totalTicket)
                                        @if ($result->itinerary_management_id == $totalTicket->itinerary_management_id)
                                            {{ $totalTicket->totalTickets }}/{{ $result->sum_ticket }}
                                        @endif
                                    @endforeach
                                </td>

                                <td class="tableItems">
                                    <button data-target="dropdown_{{ $index }}" class="dropdownCoach ">
                                        Chi tiết
                                    </button>
                                </td>
                            </tr>
                            <td id="dropdown_{{ $index }}" class="bg-blue-200 mt-20 rounded-lg z-10 hidden">
                                @if ($result->vehicle_type == 'Thường')
                                    <div class="flex flex-row gap-20 pt-2 px-10 justify-evenly pb-5">
                                        <div>Tầng 1</div>
                                        <div>Tầng 2</div>
                                    </div>

                                    <div class="flex flex-row gap-10">
                                        @php
                                            $cols = range('A', 'F');
                                            $rows = range(1, 6);
                                        @endphp

                                        @foreach ($cols as $col)
                                            <ul class="grid grid-cols-3 grid-rows-6 grid-flow-col gap-4 w-1/2">
                                                @foreach ($rows as $row)
                                                    <li>
                                                        @php
                                                            $seat = $col . $row;
                                                            $isBooked = false;

                                                        @endphp

                                                        @foreach ($ticketsBooked as $ticketBooked)
                                                            @if (
                                                                $result->id == $ticketBooked->coaches_id &&
                                                                    $result->itinerary_management_id == $ticketBooked->itinerary_management_id &&
                                                                    $ticketBooked->seat_position == $seat)
                                                                @php
                                                                    $isBooked = true;
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if (!$isBooked)
                                                            <p class="ticket" data-value="{{ $seat }}">
                                                                {{ $seat }}
                                                            </p>
                                                        @elseif($isBooked && $ticketBooked->status == 'notpay')
                                                            <p class="ticketBookeNotpay"
                                                                data-value="{{ $seat }}">
                                                                {{ $seat }}
                                                            </p>
                                                        @else
                                                            <p class="ticketBooked" data-value="{{ $seat }}">
                                                                {{ $seat }}
                                                            </p>
                                                        @endif

                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="flex flex-row gap-20 pt-4 justify-evenly pb-5">
                                        <div>Tầng 1</div>
                                        <div>Tầng 2</div>
                                    </div>

                                    <div class="flex flex-row">

                                        @php
                                            $cols_vip = range('A', 'D');
                                            $rows_vip = range(1, 7);
                                        @endphp
                                        @foreach ($cols_vip as $col_vip)
                                            <ul
                                                class="px-20 grid grid-cols-4 grid-rows-7 grid-flow-col gap-4 w-full justify-center">
                                                @foreach ($rows_vip as $row_vip)
                                                    <li>
                                                        @php
                                                            $seat_vip = $col_vip . $row_vip;
                                                            $isBooked = false;

                                                        @endphp

                                                        @foreach ($ticketsBooked as $ticketBooked)
                                                            @if (
                                                                $result->id == $ticketBooked->coaches_id &&
                                                                    $result->itinerary_management_id == $ticketBooked->itinerary_management_id &&
                                                                    $ticketBooked->seat_position == $seat_vip)
                                                                @php
                                                                    $isBooked = true;
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if (!$isBooked)
                                                            <p class="ticket" data-value="{{ $seat_vip }}">
                                                                {{ $seat_vip }}
                                                            </p>
                                                        @elseif($isBooked && $ticketBooked->status == 'notpay')
                                                            <p class="ticketBookeNotpay"
                                                                data-value="{{ $seat_vip }}">
                                                                {{ $seat_vip }}
                                                            </p>
                                                        @else
                                                            <p class="ticketBooked" data-value="{{ $seat_vip }}">
                                                                {{ $seat_vip }}
                                                            </p>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </div>
                                @endif

                                @if (Auth::check())
                                    <div class="pt-10 flex justify-center w-5/6 pb-5">
                                        <button class='button-{{ $index }}  bg-red-500 rounded-lg px-3'
                                            data-coach-id = '{{ $result->id }}'
                                            data-coach-itinerary_management = '{{ $result->itinerary_management_id }}'>Đặt
                                            vé</button>
                                    </div>
                                    <div>
                                        <ul class='flex flex-row justify-end gap-5 px-10 pb-2'>
                                            <li>
                                                <p class='ticketBooked'>Đã đặt</p>
                                            </li>
                                            <li>
                                                <p class='ticket'>Còn trống</p>
                                            </li>
                                            <li>
                                                <p class='ticketBookeNotpay'>Dữ chỗ</p>
                                            </li>

                                        </ul>
                                    </div>
                                @else
                                    <div class="pt-10 flex justify-center w-5/6 pb-5">
                                        <button onclick="alert('Bạn chưa đăng nhập')"
                                            class='bg-red-200 w-20 rounded-lg'>Đặt vé</button>
                                    </div>
                                    <div>
                                        <ul class='flex flex-row justify-end gap-5 px-10 pb-2'>
                                            <li>
                                                <p class='ticketBooked'>Đã đặt</p>

                                            </li>
                                            <li>
                                                <p class='ticketBookeNotpay'>Dữ chỗ</p>
                                            </li>
                                            <li>
                                                <p class='ticket'>Còn trống</p>
                                            </li>
                                        </ul>
                                    </div>
                                @endif

                            </td>

                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>

        </div>

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </section>
</body>
<script>
    $(document).ready(function() {
        // Thêm sự kiện cho nút toggle-dropdown
        var selectedValues = [];
        $('.dropdownCoach').click(function() {
            // Lấy data-target từ nút được click
            var targetId = $(this).data('target');
            $('[id^="dropdown_"]').not('#' + targetId).hide();
            if ($('[id^="dropdown_"]').not('#' + targetId).hide()) {
                selectedValues.splice(0, selectedValues.length)
            }
            $('#' + targetId).toggle();
            $('#' + targetId).on('hide', function() {


            });

        });

        // Xử lý sự kiện khi người dùng click vào phần tử p

        $("p.ticket").click(function() {
            var paragraphValue = $(this).data('value');

            var index = selectedValues.indexOf(paragraphValue);
            // Kiểm tra xem ghế đã được chọn chưa và có thể chọn thêm ghế mới không
            if (index === -1) {
                if (selectedValues.length < 4) {
                    selectedValues.push(paragraphValue);
                    $(this).addClass('bg');
                } else {
                    alert('Bạn không thể đặt quá 4 vé ');
                }
            } else {
                selectedValues.splice(index, 1);
                $(this).removeClass(' bg ');
            }
            console.log("Giá trị của p là: " + selectedValues);
        });
        $('button[class^="button-"]').click(function() {

            // Gửi dữ liệu đã chọn lên server bằng AJAX
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (selectedValues.length !== 0) {
                console.log(selectedValues)
                var coachId = $(this).data('coach-id');
                var itinerary_management_id = $(this).data('coach-itinerary_management');
                var url =
                    "{{ route('CreateBookTicket', ['id' => ':coachId', 'itinerary_management_id' => ':itinerary_management_id']) }}";

                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },

                    url: url.replace(':coachId', coachId).replace(':itinerary_management_id',
                        itinerary_management_id),

                    data: {
                        selectedValues: selectedValues,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        alert('Bạn đã đặt vé thành công');
                    },
                    error: function(xhr, status, error) {
                        console.log(JSON.stringify(error));
                    }

                });
            } else {
                alert('Bạn chưa chọn vé');
            }
        });
    })
</script>

</html>
