<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto mx-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Fullname</th>
                                <th class="px-4 py-2">Subject</th>
                                @if (auth()->user()->hasRole('super-admin'))
                                    <th class="px-4 py-2">Action</th>
                                    <th class="px-4 py-2">
                                        <a href="{{ Route('teacher.create') }}">
                                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Add
                                            </button>
                                        </a>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teacher as $teacher_id => $see)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $see->first()->teacher->name }}</td>
                                    <td class="border px-4 py-2">
                                        @foreach ($see as $seeSubject)
                                            {{ $seeSubject->subject->name ?? 'Invalid / None' }} <br>
                                        @endforeach
                                    </td>
                                    @can('add-subject')
                                        <td class="border px-4 py-2" colspan="{{ auth()->user()->hasRole('super-admin') ? 2 : 0 }}">
                                            <div class="flex justify-between gap-2">
                                                <a href="{{ Route('subject.edit', $see->first()->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Edit
                                                </a>

                                                <form action="{{ Route('subject.destroy', $see->first()->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->user()->hasRole('super-admin') ? 4 : 2 }}" class="text-center py-4">
                                        Empty.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
