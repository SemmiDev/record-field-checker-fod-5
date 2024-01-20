<x-app-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Wells</h1>

        <div class="flex gap-1 items-center">
            <div class="flex items-center gap-2">
                <a href="{{ route('wells.create') }}"
                   class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Tambah</a>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('wells.import') }}"
                   class="focus:outline-none text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-900">
                    Import dari Excel atau CSV
                </a>
            </div>
        </div>
    </div>

    <table class="w-full mt-12 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Aksi</span>
            </th>
        </tr>
        </thead>

        <tbody>
        @forelse ($wells as $name)
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $name->name }}
                </th>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('wells.edit', ['id' => $name->id]) }}"
                       class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                    <form action="{{ route('wells.destroy', ['id' => $name->id]) }}" method="POST"
                          class="inline-block">
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
                <td colspan="6" class="px-6 py-4 text-center">
                    Belum ada data
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</x-app-layout>
