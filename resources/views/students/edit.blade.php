<a href="../"><button>Volver</button></a> <br>
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
                <th>Materias</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" value="{{$student[0]->name}}" required></th>
                <th><input name="last_name" type="text" value="{{$student[0]->last_name}}" required></th>
                <th><input name="dni" type="text" value="{{$student[0]->dni}}" required></th>
                <th><input name="birthday" type="date" value="{{$student[0]->birthday}}" required></th>
                <th>
                    @if ($student[0]->status)
                        <input name="status" type="radio" id="true" value="1" checked required>
                        <label for="true">true</label>
                        <input name="status" type="radio" id="false" value="0">
                        <label for="false">false</label>
                    @else
                        <input name="status" type="radio" id="true" value="1" required>
                        <label for="true">true</label>
                        <input name="status" type="radio" id="false" value="0" checked >
                        <label for="false">false</label>
                    @endif

                </th>
                {{-- se busca usar la carrera como filtro para las materias, no se busca guardar la carrera --}}
                <th>
                    @foreach ($subjects as $subject)
                        <?php
                            $made = false; 
                        ?>
                        @foreach ($studentSubjects as $studentSubject)
                            @if ($subject->id == $studentSubject->id)
                                <input name="subject_list[]" type="checkbox" value="{{$subject->id}}" checked>{{$subject->name}} <br>
                                <?php
                                    $made = true;
                                ?>
                            @endif
                        @endforeach
                        @if ($made==false)
                            <input name="subject_list[]" type="checkbox" value="{{$subject->id}}">{{$subject->name}} <br>
                        @endif
                    @endforeach
                </th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>