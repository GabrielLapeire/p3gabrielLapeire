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

    <table border="1">
        <thead>
            <tr>
                <th>Estudiantes</th>
                <th>Materias</th>
                <th>Carreras</th>
                <th>Asistencias</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><a href="students">Ver estudiantes</a> <br>
                    <a href="students/create">Nuevo estudiante</a>
                </th>
                <th><a href="subjects">Ver materias</a> <br>
                    <a href="subjects/create">Nueva materia</a>
                </th>
                <th><a href="careers">Ver carreras</a> <br>
                    <a href="careers/create">Nueva carrera</a>
                </th>
                <th><a href="assistances">Ver asistencias</a> <br>
                    <a href="assistances/create">Nueva asistencia</a>
                </th>
            </tr>
        </tbody>
    </table>
</x-app-layout>
