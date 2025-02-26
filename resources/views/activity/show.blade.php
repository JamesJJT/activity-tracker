<x-layout>
    <div class="flex-1 p-8 max-w-2/3">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Activity</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Activity Details</h2>
            </div>

            <div>
                <div class="mb-4">
                    <label for="description" class="block text-lg font-semibold text-gray-700">Activity Title</label>
                    <h3 class="text-md text-gray-800 mb-6">{{$activity->title}}</h3>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg font-semibold text-gray-700">Activity Description</label>
                    <h3 class="text-md text-gray-800 mb-6">{{$activity->description}}</h3>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg font-semibold text-gray-700">Activity Duration</label>
                    <h3 class="text-md text-gray-800 mb-6">{{$activity->duration}}</h3>
                </div>
            </div>
        </div>
    </div>
</x-layout>
