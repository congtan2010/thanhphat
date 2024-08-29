@extends('adminmodules::layouts.master')

@section('content')
    <div class="bg-blue-100 flex justify-between items-center px-10 py-4">
        <div class="w-2/3 text-center">
            <p class="font-bold text-lg">Danh sách các chuyến xe</p>
        </div>
        <div class="w-1/3 flex justify-end">
            <button id="dropdown_addItinerary" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Thêm
                mới</button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                <tr class="flex gap-10">
                    <th class="flex-1 py-3 px-6 text-left">Điểm đi</th>
                    <th class="flex-1 py-3 px-6 text-left">Điểm đến</th>
                    <th class="flex-2 py-3 px-6 text-left">Thời gian đi - thời gian đến</th>
                    <th class="flex-1 py-3 px-6 text-left">Giá</th>
                    <th class="flex-1 py-3 px-6 text-left">Xe</th>
                    <th class="flex-1 py-3 px-6 text-left"></th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($ItineraryManagements as $ItineraryManagement)
                    <tr class="flex gap-5 border-b border-gray-200 hover:bg-gray-100">
                        <td class="flex-1 py-3 px-6">{{ $ItineraryManagement->starting_poin }}</td>
                        <td class="flex-1 py-3 px-6">{{ $ItineraryManagement->destination }}</td>
                        <td class="flex-2 py-3 px-6">
                            {{ \Carbon\Carbon::parse($ItineraryManagement->start_time)->format('d/m/Y H:i') }} -
                            {{ \Carbon\Carbon::parse($ItineraryManagement->end_time)->format('d/m/Y H:i') }}
                        </td>
                        <td class="flex-1 py-3 px-6">{{ $ItineraryManagement->price }} VND</td>
                        <td class="flex-1 py-3 px-6">{{ $ItineraryManagement->license_plate }}</td>
                        <td class="flex-1 py-3 px-6">
                            <a href="{{ route('AdminItineraryManager.destroy', ['id' => $ItineraryManagement->id]) }}">
                                <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Hủy chuyến</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="targetdropdown_addItineraryManagement"
        class="hidden absolute top-20 left-1/4 w-1/2 bg-white shadow-lg rounded-lg p-6 mt-4">
        <form class="space-y-4" action="{{ route('AdminItineraryManager.store') }}" method="POST">
            @csrf
            <div>

                <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Điểm đi" name="starting_poin"
                    list="starting_poin" required>
                <datalist id="starting_poin">
                    <option value="Nghệ An">
                    <option value="Thanh Hóa">
                    <option value="Hà Nội">
                </datalist>
            </div>
            <div>

                <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Điểm đến" name="destination"
                    list="destination" required>
                <datalist id="destination">
                    <option value="Nghệ An">
                    <option value="Thanh Hóa">
                    <option value="Hà Nội">
                </datalist>
            </div>
            <div>

                <input class="w-full p-2 border border-gray-300 rounded-lg"
                    placeholder="Ngày giờ khởi hành (năm-tháng-ngày giờ:phút)" name="start_time" required>
            </div>
            <div>

                <input class="w-full p-2 border border-gray-300 rounded-lg"
                    placeholder="Ngày giờ đến bến (năm-tháng-ngày giờ:phút)" name="end_time" required>
            </div>
            <div>

                <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Giá (VND)" name="price" required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">Biển số xe</label>

                <select name="license_plate" required>
                    @foreach ($coaches as $coach)
                        <option value="{{ $coach->license_plate }}">
                            {{ $coach->license_plate . '-' . $coach->vehicle_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Thêm lộ
                    trình</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#dropdown_addItinerary').click(function() {
                $('#targetdropdown_addItineraryManagement').toggle();
            });
        });
    </script>
@endsection
