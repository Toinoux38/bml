<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Menu Actions') }}
            </h2>

            <div class="flex items-center space-x-4">

            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex items-center justify-center h-screen">
                    <div class="flex space-x-4">
                        <!-- Edit Card -->
                        <div class="bg-white p-8 shadow-md rounded-md text-center w-72">
                            <h3 class="text-xl font-semibold mb-2">Edit</h3>
                            <p class="text-gray-600">Default edit text</p>
                        </div>

                        <!-- Delete Card -->
                        <div class="bg-white p-8 shadow-md rounded-md text-center w-72">
                            <h3 class="text-xl font-semibold mb-2">Delete</h3>
                            <p class="text-gray-600">Default delete text</p>
                        </div>

                        <!-- Management Card -->
                        <div class="bg-white p-8 shadow-md rounded-md text-center w-72">
                            <h3 class="text-xl font-semibold mb-2">Management</h3>
                            <p class="text-gray-600">Default management text</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
</div>

</x-app-layout>
