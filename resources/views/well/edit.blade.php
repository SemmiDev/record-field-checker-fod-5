<x-app-layout>
    <form method="POST" action="{{ route('wells.update', $well->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="name" name="name" value="{{ $well->name }}" autofocus
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan nama" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
            <input type="text" id="area" name="area" value="{{ $well->area }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan area" required>
            <x-input-error :messages="$errors->get('area')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="arse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arse</label>
            <input type="text" id="arse" name="arse" value="{{ $well->arse }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan arse" required>
            <x-input-error :messages="$errors->get('arse')" class="mt-2" />
        </div>



        <div class="flex justify-between items-center">
            <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                Simpan
            </button>
        </div>
    </form>
</x-app-layout>
