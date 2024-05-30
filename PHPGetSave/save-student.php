<?php

//crear la conexion con la data base
$servername = "127.0.0.1";//direccion en que esta el server
$username="root";//el usuario que se conecta a la BD
$password=""; // no tenia
$dbname="ppi9am"; //el nombre de mi conexion

$conn=new mysqli($servername, $username, $password, $dbname);
//verificar la conexion con la base de datos
if($conn->connect_error){
	die("Error en la conexion de DB". $conn->connect_error);
}

//recibir los datos de la peticion POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$degree=$_POST["degree"];
	$code=$_POST["code"];

	//crear la sentencia SQL para insertar los datos, no ejecutar

	$sql ="INSERT INTO students(name, email, degree, code) VALUES(?,?,?,?)";

	//ejecutar la consulta, aqui es donde ya se ejecuta
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("ssss",$name, $email, $degree, $code);//mandamos datos

	if($stmt->execute()){//revisamos que se ejecuto todo bien
		echo("Los datos del alumno se han guardado exitosamente");
	}else{
		echo("error al guardar los datos" . $stmt->error);//si no, mandamos este mensaje
	}

	//cerrar la conexion con la DB
	$stmt->close();
	$conn->close();
}

?>