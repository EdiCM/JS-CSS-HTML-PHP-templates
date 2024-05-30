<?php

//conexion DB
$servername = "127.0.0.1";//direccion en que esta el server
$username="root";//el usuario que se conecta a la BD
$password=""; // no tenia
$dbname="ppi9am"; //el nombre de mi conexion

//estableciendo la conexion
$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Error en la conexion de DB". $conn->connect_error);
}

//crear el query para seleccionar lo que tengo en la tabla de la DB
$sql="SELECT id,name,email,code,degree FROM students";
$result=$conn->query($sql);

//crear un array para almacenar los registros
$students=[];


//iterar en la consulta para ir almacenando los datos en cada fila del arreglo
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$students[]=$row;
	}
}


//cerrar la conexion con la DB

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de estudiantes</title>
</head>
<body>
	<h1>Tabla de estudiantes</h1>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>EMAIL</th>
			<th>CODIGO</th>
			<th>CARRERA</th>

		</tr>

		<?php foreach ($students as $student) : ?>
			<tr>
				<td><?php echo $student["id"];?></td>
				<td><?php echo $student["name"];?></td>
				<td><?php echo $student["email"];?></td>
				<td><?php echo $student["code"];?></td>
				<td><?php echo $student["degree"];?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>