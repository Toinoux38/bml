<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Bibliothèque') }}
            </h2>

            <div class="flex items-center space-x-4">
                <!-- Use the existing text input component for search -->
                <x-text-input placeholder="Search..." />

                <!-- Use the existing primary button component for the search button -->
                <x-primary-button>
                    <svg class="text-gray-500 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </x-primary-button>
            </div>
        </div>
    </x-slot>

<div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <button class="btn btn-primary btn-sm" onclick="the function would be here...">
                    <i class="bi bi-plus"></i> Add Book
                </button>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Titre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Date de publication
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Auteur
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            ISBN
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Couverture
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                    @foreach($books as $book)
                        <tr class="text-gray-500">

                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-50" >


                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->publication_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->publisher_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->ISBN }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="rounded" src="https://covers.openlibrary.org/b/isbn/{{$book->ISBN}}-S.jpg" />
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="w-0 flex-1 flex">
                            {{ $books->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
