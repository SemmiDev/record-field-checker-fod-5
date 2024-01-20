<x-app-layout>
    <form action="{{ route('reports.index') }}" method="get" class="mb-4">
        <label for="filterBy" class="block text-sm font-medium text-gray-600 mb-1">Filter By:</label>
        <select name="filterBy" id="filterBy"
                class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300">
            <option value="adjust_stuffing_box"
                {{ request()->get('filterBy') == 'adjust_stuffing_box' ? 'selected' : '' }}
            >Adjust Stuffing Box
            </option>
            <option value="top_soil"
                {{ request()->get('filterBy') == 'top_soil' ? 'selected' : '' }}
            >Top Soil
            </option>
            <option value="csrb"
                {{ request()->get('filterBy') == 'csrb' ? 'selected' : '' }}
            >CRSB (Change Rubber Stuffing Box)
            </option>
        </select>

        <label for="status" class="block text-sm font-medium text-gray-600 mt-2 mb-1">Status:</label>
        <select name="status" id="status" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300">
            <option value="1"
                {{ request()->get('status') == '1' ? 'selected' : '' }}
            >Yes
            </option>
            <option value="0"
                {{ request()->get('status') == '0' ? 'selected' : '' }}
            >No
            </option>
        </select>

        <label for="date" class="block text-sm font-medium text-gray-600 mt-2 mb-1">Date:</label>
        <input type="date" name="date" id="date"
               class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300"
               value="{{ request()->get('date') }}">

        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Apply Filters
        </button>
    </form>

    <table class="min-w-full bg-white border border-gray-300 mb-4">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">No</th>
            <th class="py-2 px-4 border-b">Nama</th>
            <th class="py-2 px-4 border-b">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($names as $name)
            <tr>
                <td class="py-2 px-4 text-center w-12 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 text-start w-64 border-b">{{ $name->name }}</td>
                <td class="py-2 px-4 text-center border-b">{{ $name->count }}</td>
            </tr>
        @endforeach
        <tfoot>
        <tr>
            <th colspan="2" class="py-2 px-4 border-b">Total</th>
            <th class="py-2 px-4 border-b">{{ $names->sum('count') }}</th>
        </tr>
        </tfoot>
        </tbody>
    </table>


    <!-- Grafik menggunakan Chart.js -->
    <canvas id="myChart" width="400" height="200"></canvas>


    {{--    data secara keseluruhan --}}

    <h1 class="text-2xl font-bold my-5">Data Keseluruhan</h1>
    <h2 class="text-xl my-5 font-semibold">
        A. Adjust Stuffing Box
    </h2>

    <table class="min-w-full bg-white border border-gray-300 mb-4">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">No</th>
            <th class="py-2 px-4 border-b">Nama</th>
            <th class="py-2 px-4 border-b">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($namesAdjustStuffingBox as $name)
            <tr>
                <td class="py-2 px-4 text-center w-12 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 text-start w-64 border-b">{{ $name['name'] }}</td>
                <td class="py-2 px-4 text-center border-b">{{ $name['count'] }}</td>
            </tr>
        @endforeach
        <tfoot>
        <tr>
            <th colspan="2" class="py-2 px-4 border-b">Total</th>
            <th class="py-2 px-4 border-b">
                @php
                    $totalAdjustStuffingBox = 0;
                    foreach ($namesAdjustStuffingBox as $name) {
                        $totalAdjustStuffingBox += $name['count'];
                    }
                    echo $totalAdjustStuffingBox;
                @endphp
            </th>
        </tr>
        </tfoot>
        </tbody>
    </table>

    <canvas id="myChart2" width="400" height="200"></canvas>

    <h2 class="text-xl my-5 font-semibold">
        B. Top Soil
    </h2>

    <table class="min-w-full bg-white border border-gray-300 mb-4">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">No</th>
            <th class="py-2 px-4 border-b">Nama</th>
            <th class="py-2 px-4 border-b">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($namesTopSoil as $name)
            <tr>
                <td class="py-2 px-4 text-center w-12 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 text-start w-64 border-b">{{ $name['name'] }}</td>
                <td class="py-2 px-4 text-center border-b">{{ $name['count'] }}</td>
            </tr>
        @endforeach
        <tfoot>
        <tr>
            <th colspan="2" class="py-2 px-4 border-b">Total</th>
            <th class="py-2 px-4 border-b">
                @php
                    $totalTopSoil = 0;
                    foreach ($namesTopSoil as $name) {
                        $totalTopSoil += $name['count'];
                    }
                    echo $totalTopSoil;
                @endphp
            </th>
        </tr>
        </tfoot>
        </tbody>
    </table>

    <canvas id="myChart3" width="400" height="200"></canvas>

    <h2 class="text-xl my-5 font-semibold">
        C. CRSB (Change Rubber Stuffing Box)
    </h2>

    <table class="min-w-full bg-white border border-gray-300 mb-4">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">No</th>
            <th class="py-2 px-4 border-b">Nama</th>
            <th class="py-2 px-4 border-b">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($namesCRSB as $name)
            <tr>
                <td class="py-2 px-4 text-center w-12 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 text-start w-64 border-b">{{ $name['name'] }}</td>
                <td class="py-2 px-4 text-center border-b">{{ $name['count'] }}</td>
            </tr>
        @endforeach
        <tfoot>
        <tr>
            <th colspan="2" class="py-2 px-4 border-b">Total</th>
            <th class="py-2 px-4 border-b">
                @php
                    $totalCRSB = 0;
                    foreach ($namesCRSB as $name) {
                        $totalCRSB += $name['count'];
                    }
                    echo $totalCRSB;
                @endphp
            </th>
        </tr>
        </tfoot>
        </tbody>
    </table>

    <canvas id="myChart4" width="400" height="200"></canvas>

    <script>
        // Inisialisasi data untuk Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($names->pluck('name')) !!},
                datasets: [{
                    label: 'Count',
                    data: {!! json_encode($names->pluck('count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // be carefull, because we cannot use pluck here, because the data is not collection
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_column($namesAdjustStuffingBox, 'name')) !!},
                datasets: [{
                    label: 'Count',
                    data: {!! json_encode(array_column($namesAdjustStuffingBox, 'count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx3 = document.getElementById('myChart3').getContext('2d');
        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_column($namesTopSoil, 'name')) !!},
                datasets: [{
                    label: 'Count',
                    data: {!! json_encode(array_column($namesTopSoil, 'count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        var ctx4 = document.getElementById('myChart4').getContext('2d');
        var myChart4 = new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_column($namesCRSB, 'name')) !!},
                datasets: [{
                    label: 'Count',
                    data: {!! json_encode(array_column($namesCRSB, 'count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</x-app-layout>
