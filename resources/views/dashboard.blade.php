<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bibliothèque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Titre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Année de publication
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Auteur
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Catégorie
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

                            <td class="px-6 py-4 whitespace-nowrap" >


                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->publish_year }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->author }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->category }}
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
            </div>
        </div>
    </div>
</x-app-layout>
