<x-layout>
    <div class="flex-1 p-8 max-w-2/3">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Activity Dashboard</h1>
            <a href="{{route('activity.create')}}">
                <button class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Create Activity
                </button>
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your activities</h2>
                <p class="text-sm text-gray-500">Total activity hours: {{$totalHours}}</p>
            </div>

            <ul class="space-y-4">
                @foreach($activities as $activity)
                    <li class="flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-sm">
                        <div>
                            <h3 class="font-medium text-gray-700">
                                <a href="{{route('activity.show', $activity->id)}}" class="hover:text-indigo-500 cursor">
                                    {{$activity->title}}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500">Duration (In hours): {{$activity->duration}}</p>
                        </div>
                        <div>
                            <a href="{{route('activity.edit', $activity->id)}}" class="mr-2 cursor-pointer">
                                <button class="px-6 py-2 bg-amber-400 text-white font-semibold rounded-lg hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-amber-50">Edit/Delete</button>
                            </a>
                            <span class="text-sm text-gray-500">{{$activity->created_at->diffForHumans()}}</span>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
