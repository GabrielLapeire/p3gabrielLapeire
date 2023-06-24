<a href="../dashboard"><button>Volver</button></a> <br>
<form action="{{route('subjects.store')}}" method="POST">
    @csrf
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" required></th>
                <th>
                    <select name="career_id" required>
                    @foreach ($careers as $career)
                    <option value="{{$career->id}}">{{$career->name}}</option>
                    @endforeach
                </th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>