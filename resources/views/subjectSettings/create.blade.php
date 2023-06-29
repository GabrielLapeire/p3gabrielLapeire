<a href="../subjects"><button>Volver</button></a> <br>
<form action="{{route('subjectSettings.store')}}" method="POST">
    @csrf
    <input name="subject_id" type="hidden" value="{{$subject_id}}">
    <table border="1">
        <thead>
            <tr>
                <th>Dia</th>
                <th>Hora de inicio</th>
                <th>Hora de cierre</th>
                <th>Hora limite para asistencia <br>
                    (por defecto se usa la hora de cierre)
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="day" type="radio" id="1" value="Lunes" required>
                    <label for="1">Lun</label>
                    <input name="day" type="radio" id="2" value="Martes">
                    <label for="2">Mar</label>
                    <input name="day" type="radio" id="3" value="Miercoles">
                    <label for="3">Mie</label>
                    <input name="day" type="radio" id="4" value="Jueves">
                    <label for="4">Jue</label>
                    <input name="day" type="radio" id="5" value="Viernes">
                    <label for="5">Vie</label>
                </th>
                <th><input name="time_start" type="time" required></th>
                <th><input name="time_end" type="time" required></th>
                <th><input name="time_limit" type="time" required></th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>