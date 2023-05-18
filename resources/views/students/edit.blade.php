<a href="dashboard">Volver</a> <br>
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
                <th>Estado</th>
                <th>Carreras</th>
                <th>Materias</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" value="{{$student[0]->name}}"></th>
                <th><input name="last_name" type="text" value="{{$student[0]->last_name}}"></th>
                <th><input name="dni" type="text" value="{{$student[0]->dni}}"></th>
                <th><input name="birthday" type="datetime" value="{{$student[0]->birthday}}"></th>
                <th><input name="status" type="radio" id="true" value="1">
                    <label for="true">true</label>
                    <input name="status" type="radio" id="false" value="0">
                    <label for="false">false</label>
                </th>
                {{-- <th><select name="careers">
                    @foreach ($careers as $career)
                    <option value="{{$career->id}}">{{$career->name}}</option>
                    @endforeach
                </select>
                </th>
                <th>@foreach ($subjects as $subject)
                    <input name="subjects" type="checkbox" value="{{$subject->id}}">{{$subject->name}} <br>
                    @endforeach
                </th> --}}
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>