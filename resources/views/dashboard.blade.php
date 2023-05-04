<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <table border="1" style="">
        <thead>
            <tr>
                <th>Estudiantes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><a href="students/create"><button>Alta de estudiantes</button></a> <br>
                    <a href="students"><button>Indice de estudiantes</button></a>
                </th>
            </tr>
        </tbody>
    </table>
</x-app-layout>
