<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
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
                            @forelse ($teacher as $see)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $see->name }}</td>
                                    <td class="border px-4 py-2">
                                        @php $subjectModal = "subjectModal-" . $see->id . "-" ; @endphp

                                        <button data-modal-target="{{ $subjectModal }}" data-modal-toggle="{{ $subjectModal }}" class="rounded-md px-3.5 py-2 m-1 relative group cursor-pointer border-2 font-medium border-gray-800 hover:text-white">
                                            <span class="absolute w-64 h-0 transition-all duration-500 origin-center rotate-45 -translate-x-20 bg-gray-800 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                                            <span class="relative text-gray-800 transition duration-500 group-hover:text-white ease">
                                                See
                                            </span>
                                        </button>
                                    </td>
                                    @can('add-subject')
                                        <td class="border px-4 py-2" colspan="{{ auth()->user()->hasRole('super-admin') ? 2 : 0 }}">
                                            <div class="flex justify-between gap-2">
                                                <a href="{{ Route('subject.edit', $see->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wides">Edit
                                                </a>

                                                <form action="{{ Route('subject.destroy', $see->id) }}" method="POST">
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
                                        No subjects available.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="{{ $subjectModal }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-3xl shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between bg-[#1E293B] p-4 md:p-5 border-b rounded-t-3xl dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white dark:text-white">
                        Deskripsi
                    </h3>
                </div>
                <!-- Modal body -->
                <div class=" bg-gray-100 p-4 md:p-5 space-y-4">
                    <h2>Alok</h2>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t rounded-b dark:border-gray-600">
                    <button data-modal-hide="{{ $subjectModal }}" type="button" class="w-full py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-[#1E293B] rounded-3xl hover:shadow-md hover:shadow-slate-600 duration-300 focus:z-10 focus:ring-4 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">TUTUP</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
