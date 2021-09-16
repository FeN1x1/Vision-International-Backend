<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicants') }}   {{ $category }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                E-mail
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Age
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Category
                                            </th>
                                            <th scope="col" class="relative px-2 py-3">
                                                <span class="sr-only">Show</span>
                                            </th>
                                            <th scope="col" class="relative px-2 py-3">
                                                <span class="sr-only">Delete</span>
                                            </th>
                                            <th scope="col" class="relative px-2 py-3">
                                                <span class="sr-only">Download CV</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($applicants as $applicant)
                                            <tr>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $applicant->firstname }} {{ $applicant->lastname }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">{{ $applicant->email }}</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="inline-flex text-sm leading-5 font-semibold">
                                                        {{ $applicant->age }}
                                                    </div>
                                                </td>
                                                 <td class="px-6 py-4">
                                                    <div class="inline-flex text-sm leading-5 font-semibold">
                                                        {{ $applicant->category ?? 'new application' }}
                                                    </div>
                                                </td>
                                                <td class="py-4 text-sm font-medium text-center">
                                                    <a href="{{ route('show_applicant', $applicant->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900">Show</a>
                                                </td>
                                                <td class="py-4 text-center text-sm font-medium">
                                                    <a href="{{ route('delete_applicant', $applicant->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                                </td>
                                                <td class="py-4 text-center text-sm font-medium">
                                                    <a href="{{ route('download_applicant_pdf', $applicant->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900">Download
                                                        CV</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                @if ($applicants->count() === 0)
                                    <div class="rounded-b px-4 py-4 shadow-md" role="alert">
                                        <div class="text-center my-auto">
                                            <div>There are no records</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-12">
        {!! $applicants->links() !!}
    </div>

</x-app-layout>
