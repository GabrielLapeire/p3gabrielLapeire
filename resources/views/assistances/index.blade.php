<a href="dashboard"><button>Volver</button></a> <br>
<table border="1">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Materia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assistances as $assistance)
        <tr>
            <th>{{$assistance->date}}</th>
            <th>{{$assistance->first_name}}</th>
            <th>{{$assistance->last_name}}</th>
            <th>{{$assistance->name}}</th>
            <th><a href="assistances/{{$assistance->id}}/edit"><button>Editar</button></a>
                <form action="assistances/{{$assistance->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button>Eliminar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>