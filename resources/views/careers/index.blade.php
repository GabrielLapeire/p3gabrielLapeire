<a href="dashboard"><button>Volver</button></a> <br>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($careers as $career)
        <tr>
            <th>{{$career->name}}</th>
            <th><a href="careers/{{$career->id}}/edit"><button>Editar</button></a>
                <form action="careers/{{$career->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button>Eliminar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>