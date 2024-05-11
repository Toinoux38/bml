<x-app-layout class="dark">

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Détails') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        <!-- Add this to your HTML file -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Product Image -->
                <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                    <img class="max-h-96 md:max-h-full md:max-w-full rounded-lg shadow-lg" src="https://covers.openlibrary.org/b/isbn/{{$book->ISBN}}-L.jpg" />
                </div>
                <!-- Product Details -->
                <div class="w-full md:w-1/2">
                    <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                        malesuada, nunc a convallis consequat, libero ligula scelerisque ligula, non vulputate arcu est nec
                        dui.</p>
                    <p class="text-gray-700 mb-4"><strong>Auteur :</strong>{{ $book->author }}</p>
                    <p class="text-gray-700 mb-4"><strong>Date de sortie :</strong> {{ $book->publication_date }}</p>

                    @php
                        $isAvailable = true;
                        if ($book->reservations()->exists()) {
                            $isAvailable = false;
                        }
                    @endphp
                    <p class="text-gray-700 mb-4">
                        <strong>Disponibilité:</strong>
                        <span class="{{ $isAvailable ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                            @if($isAvailable)
                                Libre
                            @else
                                <a href="/reservations?search={{ $book->bookID }}" class="underline">Emprunté</a>
                            @endif
                        </span>
                    </p>

                    @if($isAvailable)
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                        Créer un emprunt
                    </button>

                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Créer une réservation de livre
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Fermer</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="POST" action="{{ route('reservation.store') }}" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Livre(s) emprunté(s)</label>
                                            <input type="text" name="bookID" id="bookID" value="{{ $book->bookID }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID Livre" required disabled>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Membre</label>
                                            <input type="text" name="memberID" id="memberID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID Membre" required="">
                                        </div>

                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée de réservation</label>
                                            <input type="text" name="duration" id="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre de jours" required="">
                                        </div>
                                    </div>

                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Ajouter la réservation
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                        <button class="block text-white bg-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 disabled ">
                            Réservation impossible
                        </button>
                    @endif
                </div>
            </div>
        </div>


    </div>
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div>--}}
{{--                    <h2>{{ $book->title }}</h2>--}}
{{--                    <p>Date de publication: {{ $book->publication_date }}</p>--}}
{{--                    <p>Auteur: {{ $book->author }}</p>--}}
{{--                    <!-- Add other details as needed -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>



