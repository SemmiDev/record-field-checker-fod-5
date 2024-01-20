<x-app-layout>
    <form method="POST"
        enctype="multipart/form-data"
          action="{{ route('teams.importProcess') }}">
        @csrf

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file Excel atau CSV</label>
            <input
                accept=".xls,.xlsx,.csv"
                required
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file"
                name="file-import"
                type="file">
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                Import
            </button>
        </div>
    </form>
</x-app-layout>
