<a href="dashboard">Volver</a> <br>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Cumpleaños</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <th>{{$student->name}}</th>
            <th>{{$student->last_name}}</th>
            <th>{{$student->dni}}</th>
            <th>{{$student->birthday}}</th>
            <th>{{$student->status}}</th>
            <th><a href="students/{{$student->id}}/edit"><button>Editar</button></a>
                <form action="students/{{$student->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button>Eliminar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>