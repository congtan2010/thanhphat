@extends('adminmodules::layouts.master')

@section('content')
    <div class="flex flex-col gap-10 p-5 bg-gray-100">
        <div class="text-2xl font-bold text-gray-800 mb-6">Thống kê doanh thu dịch vụ</div>

        <div class="flex flex-row gap-10">
            <!-- Thống kê dịch vụ chở khách -->
            <div class="w-full lg:w-1/2 bg-white shadow-md rounded-lg p-6">
                <div class="text-lg font-semibold mb-4 text-blue-700">Thống kê doanh thu chở khách</div>

                <div class="text-md font-medium mb-4 text-blue-600">Doanh số theo tháng</div>
                @foreach ($saleByMonths as $saleByMonth)
                    <div class="p-4 mb-4 bg-blue-50 rounded-lg">
                        <div class="text-gray-700">
                            <span class="font-semibold">Doanh số tháng {{ $saleByMonth->month }}:</span>
                            <span class="text-green-600">{{ number_format($saleByMonth->total_prices, 0, ',', '.') }}
                                VND</span>
                        </div>
                        <div class="text-gray-600 mt-1">
                            <span class="font-semibold">Tổng số vé bán ra:</span> {{ $saleByMonth->total_tickets }} vé
                        </div>
                    </div>
                @endforeach

                <div class="text-md font-medium mb-4 text-blue-600">Doanh số theo tháng và tuyến đường</div>
                @foreach ($salesByMonthAndRoute as $sale)
                    <div class="p-4 mb-4 bg-blue-50 rounded-lg">
                        <div class="text-gray-700">
                            <span class="font-semibold">Tuyến đường:</span> {{ $sale->starting_poin }} -
                            {{ $sale->destination }}
                        </div>
                        <div class="text-gray-700 mt-2">
                            <span class="font-semibold">Doanh số tháng {{ $sale->month }}:</span>
                            <span class="text-green-600">{{ number_format($sale->total_sales, 0, ',', '.') }} VND</span>
                        </div>
                        <div class="text-gray-600 mt-1">
                            <span class="font-semibold">Tổng vé bán ra tháng:</span> {{ $sale->total_tickets }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Thống kê doanh thu vận chuyển -->
            <div class="w-full lg:w-1/2 bg-white shadow-md rounded-lg p-6">
                <div class="text-lg font-semibold mb-4 text-blue-700">Thống kê doanh thu vận chuyển</div>

                <div class="text-md font-medium mb-4 text-blue-600">Doanh số theo tháng</div>
                @foreach ($salesByMonthFreight as $sale)
                    <div class="p-4 mb-4 bg-blue-50 rounded-lg">
                        <div class="text-gray-700">
                            <span class="font-semibold">Doanh số tháng {{ $sale->month }}:</span>
                            <span class="text-green-600">{{ number_format($sale->total_price, 0, ',', '.') }} VND</span>
                        </div>
                        <div class="text-gray-600 mt-1">
                            <span class="font-semibold">Tổng số hóa đơn:</span> {{ $sale->total_invoice }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
