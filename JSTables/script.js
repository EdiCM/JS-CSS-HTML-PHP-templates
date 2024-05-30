const nombreInput=document.getElementById("nombre-input");
	const apellidoInput=document.getElementById("apellido-input");
	const carreraInput=document.getElementById("carrera-input");	
const tablaAlumnos=document.getElementById("tabla-alumnos");

function registrarAlumno(){
	//creando la nueva fila para la tabla
	const nuevaFila=tablaAlumnos.insertRow();
	//creando la celda para la fila
	const celdaNombre=nuevaFila.insertCell(0);
	const celdaApellido=nuevaFila.insertCell(1);
	const celdaCarrera=nuevaFila.insertCell(2);
	//asignando valores a la celda
	celdaNombre.innerHTML=nombreInput.value;
	celdaApellido.innerHTML=apellidoInput.value;
	celdaCarrera.innerHTML=carreraInput.value;

	//borrando los datos de la vista
	nombreInput.value="";
	apellidoInput.value="";
	carreraInput.value="";
			}