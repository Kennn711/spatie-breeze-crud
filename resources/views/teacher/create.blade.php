<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Teacher Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-md font-bold mb-2">Teacher's Name:</label>
                            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-md font-bold mb-2">Email:</label>
                            <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-md font-bold mb-2">Password:</label>
                            <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-md font-bold mb-3">Subjects : </label>
                            <div class="grid gap-2">
                                @forelse ($subject as $see)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="subject[]" value="{{ $see->id }}" class="form-checkbox"> <span class="ml-2">{{ $see->name }}</span>
                                    </label>
                                @empty
                                    <label class="inline-flex items-center">
                                        <span class="font-bold">No subject available</span>
                                    </label>
                                @endforelse
                            </div>
                        </div>
                        @if (empty($see))
                            <div class="flex items-center justify-between">
                                <a href="{{ Route('teacher.index') }}" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Return
                                </a>
                            </div>
                        @else
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Submit
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
