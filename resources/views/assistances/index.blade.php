<a href="dashboard">Volver</a> <br>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Alumno</th>
            <th>Materia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assistances as $assistance)
        <tr>
            <th>{{$assistance->date}}</th>
            <th></th>
            <th></th>
            <th><a href="#"><button>Editar</button></a></th>
        </tr>
        @endforeach
    </tbody>
</table>