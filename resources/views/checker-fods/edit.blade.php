<x-app-layout>
    <form action="{{ route('checker-fods.update', $checkerFod->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <!-- Date Input -->
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-600">Date:</label>
            <input
                value="{{ old('date', $checkerFod->date ?? date('Y-m-d')) }}"
                type="date" name="date" id="date" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('date')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Well Dropdown -->
        <div class="mb-4">
            <label for="well_id" class="block text-sm font-medium text-gray-600">Well:</label>
            <select name="well_id" id="well_id" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @foreach ($wells as $well)
                    <option value="{{ $well->id }}" {{ old('well_id', $checkerFod->well_id) == $well->id ? 'selected' : '' }}>{{ $well->name }}</option>
                @endforeach
            </select>
            @error('well_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Name Dropdown -->
        <div class="mb-4">
            <label for="name_id" class="block text-sm font-medium text-gray-600">Name:</label>
            <select name="name_id" id="name_id" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @foreach ($names as $name)
                    <option value="{{ $name->id }}" {{ old('name_id', $checkerFod->name_id) == $name->id ? 'selected' : '' }}>{{ $name->name }}</option>
                @endforeach
            </select>
            @error('name_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Team Dropdown -->
        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-600">Team:</label>
            <select name="team_id" id="team_id" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team_id', $checkerFod->team_id) == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
            @error('team_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Adjust Stuffing Box Dropdown -->
        <div class="mb-4">
            <label for="adjust_stuffing_box" class="block text-sm font-medium text-gray-600">Adjust Stuffing Box:</label>
            <select name="adjust_stuffing_box" id="adjust_stuffing_box" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="1" {{ old('adjust_stuffing_box', $checkerFod->adjust_stuffing_box) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('adjust_stuffing_box', $checkerFod->adjust_stuffing_box) == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('adjust_stuffing_box')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Top Soil Dropdown -->
        <div class="mb-4">
            <label for="top_soil" class="block text-sm font-medium text-gray-600">Top Soil:</label>
            <select name="top_soil" id="top_soil" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="1" {{ old('top_soil', $checkerFod->top_soil) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('top_soil', $checkerFod->top_soil) == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('top_soil')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- CRSB Dropdown -->
        <div class="mb-4">
            <label for="csrb" class="block text-sm font-medium text-gray-600">CRSB:</label>
            <select name="csrb" id="csrb" class="mt-1 block w-full border rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="1" {{ old('csrb', $checkerFod->csrb) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('csrb', $checkerFod->csrb) == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('csrb')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between items-center">
            <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                Update
            </button>
        </div>
    </form>
</x-app-layout>
