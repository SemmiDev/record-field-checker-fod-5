<x-app-layout>
    <div class="flex gap-4 items-center">
        <div
            class="max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center gap-5">
                <div>
                    <a href="#">
                        <h5 class="text-3xl font-bold tracking-tight text-blue-900 dark:text-white">{{ $totalNames }}
                        </h5>
                    </a>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Total Anggota</p>
                    <a href="{{ route('names.index') }}" class="inline-flex items-center text-blue-600 hover:underline">
                        Selengkapnya
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>
                <div>
                    <svg class="flex-shrink-0 w-20 h-12 transition duration-75 text-blue-400 group-hover:text-gray-100"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center gap-5">
                <div>
                    <a href="#">
                        <h5 class="text-3xl font-bold tracking-tight text-blue-900 dark:text-white">{{ $totalWells }}
                        </h5>
                    </a>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Total Wells</p>
                    <a href="{{ route('wells.index') }}" class="inline-flex items-center text-blue-600 hover:underline">
                        Selengkapnya
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>
                <div>
                    <svg class="flex-shrink-0 w-20 h-12 transition duration-75 text-blue-400 group-hover:text-gray-100"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                    </svg>

                </div>
            </div>
        </div>

        <div
            class="max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center gap-5">
                <div>
                    <a href="#">
                        <h5 class="text-3xl font-bold tracking-tight text-blue-900 dark:text-white">{{ $totalTeams }}
                        </h5>
                    </a>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Total Teams</p>
                    <a href="{{ route('teams.index') }}" class="inline-flex items-center text-blue-600 hover:underline">
                        Selengkapnya
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>
                <div>

                    <svg class="flex-shrink-0 w-20 h-12 transition duration-75 text-blue-400 group-hover:text-gray-100"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                        <path
                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        <path
                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">

        <div class="flex items-center justify-end">
            <a href="{{ route('checker-fods.create') }}"
                class="flex gap-2 w-fit items-center focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Data
            </a>
        </div>

        <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Well
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Team
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Adjust Stuffing Box
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Top Soil
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            CRSB
                        </th>
                        <th scope="col" class="px-6 text-center py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($checkfods as $data)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <th class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->name_name }}
                            </th>
                            <td class="px-6 py-4">
                                {!! $data->well_name !!}
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ $data->team_name }}
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ \Carbon\Carbon::parse($data->date)->format('d M Y') }}
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ $data->adjust_stuffing_box == 1 ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ $data->top_soil == 1 ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ $data->csrb  == 1 ? 'Yes' : 'No' }}
                            </td>

                            <td class="px-6 py-4 flex items-center">
                                <a
                                href="{{ route('checker-fods.edit', [
                                    'id' => $data->id,
                                ]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('checker-fods.destroy', [
                                        'id' => $data->id,
                                    ]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="mt-2 text-sm text-gray-500">Belum ada data</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
