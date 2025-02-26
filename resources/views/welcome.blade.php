<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Activity Tracker</h2>
        <div class="space-y-4">
            <a href="{{route('login')}}" class="w-full py-3 mr-2 px-6 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Login
            </a>
            <a href="{{route('register.create')}}" class="w-full py-3 px-6 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Register
            </a>
        </div>
    </div>
</x-layout>
