<x-app-layout>
    <form action="{{ route('reports.wells') }}" method="get" class="mb-4">
        <label for="filterBy" class="block text-sm font-medium text-gray-600 mb-1">Filter By:</label>
        <select name="filterBy" id="filterBy"
            class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300">
            <option value="adjust_stuffing_box"
                {{ request()->get('filterBy') == 'adjust_stuffing_box' ? 'selected' : '' }}>Adjust Stuffing Box
            </option>
            <option value="top_soil" {{ request()->get('filterBy') == 'top_soil' ? 'selected' : '' }}>Top Soil
            </option>
            <option value="csrb" {{ request()->get('filterBy') == 'csrb' ? 'selected' : '' }}>CRSB (Change Rubber
                Stuffing Box)
            </option>
        </select>

        <label for="fromDate" class="block text-sm font-medium text-gray-600 mt-2 mb-1">Dari Tanggal:</label>
        <input type="date" name="fromDate" id="fromDate"
            class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300"
            value="{{ request()->get('fromDate') }}">

        <label for="toDate" class="block text-sm font-medium text-gray-600 mt-2 mb-1">Sampai Tanggal:</label>
        <input type="date" name="toDate" id="toDate"
            class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-300"
            value="{{ request()->get('toDate') }}">

        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Terapkan Filter
        </button>
    </form>


    <table class="min-w-full bg-white border border-gray-300 mb-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama</th>
                @foreach ($wells as $well)
                    <th class="py-2 px-4 border-b">{{ $well }}</th>
                @endforeach
                <th class="py-2 px-4 border-b">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userData as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $user['name'] }}</td>
                    @foreach ($user['data'] as $data)
                        <td class="py-2 px-4 border-b">{{ $data }}</td>
                    @endforeach
                    <td class="py-2 px-4 border-b">{{ array_sum($user['data']) }}</td>
                </tr>
            @endforeach
        </tbody>
        {{-- <tfoot>
            <tr>
                <th colspan="{{ count($wells) + 2 }}" class="py-2 px-4 border-b">Total</th>
                <th class="py-2 px-4 border-b">{{ array_sum(array_column($userData, 'data')) }}</th>
            </tr>
        </tfoot> --}}
        </tbody>
    </table>

    <canvas id="myChart" height="200"></canvas>

    <script>
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        const wells = {!! json_encode($wells) !!};
        const userData = {!! json_encode($userData) !!};

        // Inisialisasi chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: wells,
                datasets: userData.map(user => ({
                    label: user.name,
                    data: user.data,
                    backgroundColor: getRandomColor(),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    hoverBackgroundColor: getRandomColor(),
                    hoverBorderColor: 'rgba(75, 192, 192, 1)'
                }))
            },
            options: {
                scales: {
                    x: {
                        type: 'category',
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Well'
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Total Attendance'
                        },
                        ticks: {
                            stepSize: 1,
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'index',
                    intersect: false
                },
                pan: {
                    enabled: true,
                    mode: 'x'
                },
                zoom: {
                    enabled: true,
                    mode: 'x'
                }
            }
        });
    </script>

</x-app-layout>
