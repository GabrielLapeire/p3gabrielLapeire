<a href="../subjects"><button>Volver</button></a> <br>
<a href="../subjectSettings/create"><button>Nueva clase</button></a> <br>
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
        @foreach ($subjectSettings as $subjectSetting)
        <tr>
            <th>{{$subjectSetting->day}}</th>
            <th><a href="subjectSettings/{{$subjectSetting->id}}/edit"><button>Editar</button></a>
                <form action="subjectSettings/{{$subjectSetting->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button>Eliminar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>