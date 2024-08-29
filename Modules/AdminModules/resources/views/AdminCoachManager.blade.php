@extends('adminmodules::layouts.master')

@section('content')
    <div class="px-10 py-5">
        <table class="w-full border border-gray-300 bg-white">
            <thead>
                <tr class="grid grid-cols-7 bg-blue-100 text-gray-700 font-bold uppercase text-sm py-2 px-4">
                    <th class="text-left">Biển số xe</th>
                    <th class="text-left">Ngày bảo dưỡng</th>
                    <th class="text-left">Dịch vụ</th>
                    <th class="text-left">Loại xe</th>
                    <th class="text-left">Tổng vé</th>
                    <th class="text-left"></th>
                    <th class="text-right">
                        <button id="dropdown_addCoach"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Thêm xe</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coaches as $coach)
                    <tr class="grid grid-cols-7 border-b border-gray-200 hover:bg-gray-50 py-2 px-4">
                        <td class="flex items-center">{{ $coach->license_plate }}</td>
                        <td class="flex items-center">{{ $coach->coach_maintenance_date }}</td>
                        <td class="flex items-center">{{ $coach->service }}</td>
                        <td class="flex items-center">{{ $coach->vehicle_type }}</td>
                        <td class="flex items-center">{{ $coach->sum_ticket }}</td>
                        <td class="flex items-center justify-center">
                            <a href="{{ route('AdminCoachManager.destroy', ['id' => $coach->id]) }}">
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa xe</button>
                            </a>
                        </td>
                        <td></td> <!-- Empty column to match the header structure -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="targetdropdown_addCoach" class="hidden absolute w-[20%] mt-5 bg-white shadow-lg rounded-lg p-4">
            <form class="space-y-2" action="{{ route('AdminCoachManager.store') }}" method="POST">
                @csrf
                <div class="w-full">
                    <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Biển số xe"
                        name="license_plate" required>
                    @error('license_plate')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Ngày bảo dưỡng"
                        name="coach_maintenance_date" required>
                </div>
                <div class="w-full">
                    <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Dịch vụ" list="service"
                        name="service" required>
                    <datalist id="service">
                        <option value="Hàng hóa">
                        <option value="Người">
                    </datalist>
                </div>
                <div class="w-full">
                    <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Loại xe" list="vehicle_type"
                        name="vehicle_type" required>
                    <datalist id="vehicle_type">
                        <option value="vip">
                        <option value="Thường">
                    </datalist>
                </div>
                <div class="w-full">
                    <input class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Tổng vé xe" name="sum_ticket"
                        required>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Thêm
                        xe</button>
                </div>
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('#dropdown_addCoach').click(function() {
                    $('#targetdropdown_addCoach').toggleClass('hidden');
                });
            });
        </script>
    </div>
@endsection
