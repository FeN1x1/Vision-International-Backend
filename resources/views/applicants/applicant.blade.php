<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg container">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Applicant Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            Applicant ID
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $applicant->id }}
                            <a href="{{ route('delete_applicant', $applicant->id) }}"
                                class="text-indigo-600 ml-4 hover:text-indigo-900">Remove applicant</a>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            Category
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($applicant->category === null)
                                <form method="post"
                                    action="{{ route('applicant_select_category', ['applicant' => $applicant->id]) }}">
                                    @csrf
                                    <select name="category">
                                        <option selected disabled hidden>Choose here </option>
                                        <option value="{{ Config::get('categories.route.adminStaff') }}">
                                            {{ Config::get('categories.name.adminStaff') }}</option>
                                        <option value="{{ Config::get('categories.route.hotelStaff') }}">
                                            {{ Config::get('categories.name.hotelStaff') }}</option>
                                        <option value="{{ Config::get('categories.route.logisticsStaff') }}">
                                            {{ Config::get('categories.name.logisticsStaff') }}</option>
                                        <option value="{{ Config::get('categories.route.executive') }}">
                                            {{ Config::get('categories.name.executive') }}</option>
                                        <option value="{{ Config::get('categories.route.excellent') }}">
                                            {{ Config::get('categories.name.excellent') }}</option>
                                        <option value="{{ Config::get('categories.route.unsuccessful') }}">
                                            {{ Config::get('categories.name.unsuccessful') }}</option>
                                    </select>
                                    <input type="submit" name="send" value="Submit"
                                        class="p-1 ml-4 font-medium bg-gray-50 hover:underline text-indigo-600 hover:text-indigo-500 rounded">
                                </form>
                            @else
                                {{ $applicant->category }}
                            @endif
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $applicant->firstname }} {{ $applicant->surname }}
                        </dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $applicant->email }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            Age
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $applicant->age }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            About
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $applicant->about }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm mt-1 font-medium text-gray-500">
                            Attachments
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $applicant->firstname }}_{{ $applicant->surname }}_{{ $applicant->id }}.pdf
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('download_applicant_pdf', $applicant->id) }}"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Download CV
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
                @if (Session::has('success'))
                    <div class="bg-teal-100 mb-8 border-t-4 border-teal-500 rounded-b text-teal-900 py-3 px-4 shadow-md"
                        role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg></div>
                            <div>
                                <p class="my-auto font-bold">{{ Session::get('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
