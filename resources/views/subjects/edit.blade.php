<a href="../"><button>Volver</button></a> <br>
<form action="{{route('subjects.update', $subject[0]->id)}}" method="POST">
    @csrf
    @method('put')
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" value="{{$subject[0]->name}}" required></th>
                <th>
                    <select name="career_id" required>
                    @foreach ($careers as $career)
                        <?php
                            $made = false; 
                        ?>
                        @if ($career->id == $subjectCareer->id)
                            <option value="{{$career->id}}" selected>{{$career->name}}</option>
                            <?php
                                $made = true;
                            ?>
                        @endif
                        @if ($made==false)
                            <option value="{{$career->id}}">{{$career->name}}</option>
                        @endif
                    @endforeach
                </th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>