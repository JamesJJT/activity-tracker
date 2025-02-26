<x-layout>
    <div class="flex-1 p-8 max-w-2/3">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Activity</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Activity Details</h2>
                <a>
                    <form action="{{route('activity.destroy', $activity->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Delete</button>
                    </form>
                </a>
            </div>

            <form action="{{route('activity.update', $activity->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700">Activity Title</label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter activity title" value="{{ $activity->title }}" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700">Activity Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Describe the activity" required>{{$activity->description}}</textarea>
                </div>

                <div class="mb-4">
                    <label for="duration" class="block text-sm font-semibold text-gray-700">Duration (in hours)</label>
                    <input type="number" id="duration" name="duration" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter duration" value="{{$activity->duration}}" required>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-layout>
