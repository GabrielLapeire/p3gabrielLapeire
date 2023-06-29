<a href="dashboard"><button>Volver</button></a> <br>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
        <tr>
            <th>{{$subject->name}}</th>
            <th>{{$subject->career->name}}</th>
            <th><a href="subjects/{{$subject->id}}/edit"><button>Editar</button></a> <br>
                <a href="subjectSettings/{{$subject->id}}"><button>Clases</button></a>
                <form action="subjects/{{$subject->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button>Eliminar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>