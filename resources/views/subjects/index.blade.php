<a href="dashboard"><button>Volver</button></a> <br>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
        <tr>
            <th>{{$subject->name}}</th>
            <th><a href="subjects/{{$subject->id}}/edit"><button>Editar</button></a> <br>
                <a href="subjectSettings"><button>Configurar</button></a>
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