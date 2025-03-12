<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto mx-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Teacher's Name</th>
                                <th class="px-4 py-2">Subject</th>
                                @if (auth()->user()->hasRole('super-admin'))
                                    <th class="px-4 py-2">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">1</td>
                                <td class="border px-4 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                                <td class="border px-4 py-2">Lorem ipsum dolor sit.</td>
                                @if (auth()->user()->hasRole('super-admin'))
                                    <td class="border px-4 py-2">
                                        <a href="{{ Route('teacher.create') }}">
                                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Add
                                            </button>
                                        </a>

                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Edit
                                        </button>

                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Delete
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
