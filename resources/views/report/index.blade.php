<x-app-layout>
    <form action="{{ route('reports.index') }}" method="get" class="mb-4">
        <label for="filterBy" class="block text-sm font-medium text-gray-600 mb-1">Filter By:</label>
        <select name="filterBy" id="filterBy" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300">
            <option value="adjust_stuffing_box"
            {{ request()->get('filterBy') == 'adjust_stuffing_box' ? 'selected' : '' }}
            >Adjust Stuffing Box</option>
            <option value="top_soil"
            {{ request()->get('filterBy') == 'top_soil' ? 'selected' : '' }}
            >Top Soil</option>
            <option value="csrb"
            {{ request()->get('filterBy') == 'csrb' ? 'selected' : '' }}
            >CSRB</option>
        </select>

        <label for="status" class="block text-sm font-medium text-gray-600 mt-2 mb-1">Status:</label>
        <select name="status" id="status" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300">
            <option value="1"
            {{ request()->get('status') == '1' ? 'selected' : '' }}
            >Yes</option>
            <option value="0"
            {{ request()->get('status') == '0' ? 'selected' : '' }}
            >No</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Apply Filters</button>
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
    </script>

</x-app-layout>
