<x-layout>
    <div class="flex-1 p-8 max-w-2/3">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Activity</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Activity Details</h2>

            <form action="{{route('activity.store')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700">Activity Title</label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter activity title" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700">Activity Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Describe the activity" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="duration" class="block text-sm font-semibold text-gray-700">Duration (in hours)</label>
                    <input type="number" id="duration" name="duration" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter duration" required>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Create Activity
                </button>
            </form>
        </div>
    </div>
</x-layout>
