<a href="../dashboard"><button>Volver</button></a> <br>
<form action="{{route('students.store')}}" method="POST">
    @csrf
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
                <th><input name="name" type="text" required></th>
                <th><input name="last_name" type="text" required></th>
                <th><input name="dni" type="text" required></th>
                <th><input name="birthday" type="date" required></th>
                <th><input name="status" type="radio" id="true" value="1" required>
                    <label for="true">true</label>
                    <input name="status" type="radio" id="false" value="0">
                    <label for="false">false</label>
                </th>
                <th><select name="career_list">
                    @foreach ($careers as $career)
                    <option value="{{$career->id}}">{{$career->name}}</option>
                    @endforeach
                    </select>
                </th>
                {{-- se busca usar la carrera como filtro para las materias, no se busca guardar la carrera --}}
                <th>@foreach ($subjects as $subject)
                    <input name="subject_list[]" type="checkbox" value="{{$subject->id}}">{{$subject->name}} <br>
                    @endforeach
                </th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>