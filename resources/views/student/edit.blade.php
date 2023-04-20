<form action="{{route('students.update', $student[0]->id)}}" method="POST">
    @csrf
    @method('put')
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Cumpleaños</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" value="{{$student[0]->name}}"></th>
                <th><input name="last_name" type="text" value="{{$student[0]->last_name}}"></th>
                <th><input name="dni" type="text" value="{{$student[0]->dni}}"></th>
                <th><input name="birthday" type="datetime" value="{{$student[0]->birthday}}"></th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>