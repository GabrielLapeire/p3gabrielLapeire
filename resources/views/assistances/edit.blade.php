<a href="../"><button>Volver</button></a> <br>
<form action="{{route('assistances.update', $assistance[0]->id)}}" method="POST">
    @csrf
    @method('put')
    <table border="1">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Materia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="date" type="date" value="{{$assistance[0]->date}}" required></th>
                <th><input name="first_name" type="text" value="{{$assistance[0]->first_name}}" required></th>
                <th><input name="last_name" type="text" value="{{$assistance[0]->last_name}}" required></th>
                <th><input name="subject" type="text" value="{{$assistance[0]->name}}" required></th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>