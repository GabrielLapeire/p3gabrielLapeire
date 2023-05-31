CONSIGNA 

diseñar una aplicacion web para controlar la asistencia de los alumnos utilizando un
codigo qr o en su defecto, ingresandolo mediante un teclado.
Es decir, cuando hagamos eso, vamos a tener un codigo qr pegado en la pared, y escaneandolo 
se carga nuestra asistencia. En caso de no tener conectividad de internet
con el dato del dni se va a cargar mediante una pc

que esta aplicacion sea configurable para solo egreso o ingreso

la asistencia va a tener fecha, hora y dni

este sistema va a ser un sistema web, vamos a poder prender una compu, logearme y ver quien vino y quien no
vamos a poder tambien imprimir listados, dar de alta alumnos, carreras

vamos a necesitar usuarios administradores

la parte administrativa va a poder de alta CRUD
Va a poder dar de alta editar borrar
 - alumnos
 - carreras 
 - materias
asi como tambien va a poder dar de alta y modificar asistencias, pero con la condicion de que
el sistema identifique si esa asistencia fue dada de alta por el sistema (automatico) o por el administrador (manual)

que los nombres de las tablas sean en ingles

como hacer crud en laravel
					MVC Modelo vista controlador
Los modelos van a ser la representacion de mi codigo en la DB

en cuanto a las vistas, que sea lo mas minimalista posible, este framework trae bootsrap
asi que podemos usar boostrap

VALIDAR que tenga las materias necesarias aprobadas para estar cursando

Tenemos que crear las tablas de materias y carrera

En materia tendremos:

ID
Time Stamp

Nombre
Dia
Hora inicio
Hora fin
Tope

problema
> que el alumno pueda escanear un codigo QR sin venir a clases.
> En que momento se crea un registro de asistencias.

Entrega 5 de julio