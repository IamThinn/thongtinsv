<?php
$host = 'thiensql.mysql.database.azure.com';
$username = 'thiensql';
$password = '123999Aa@';
$db_name = 'thongtinsv';

//Establishes the connection
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL,"D:\study\DigiCertGlobalRootCA.crt.pem",NULL,NULL);
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$User = 'thien';
$Password= '1';
$id='1';

if($stmt = mysqli_prepare($conn, "INSERT INTO account (User, Password, id) VALUES (? , ? , ?)")){
    mysqli_stmt_bind_param($stmt, 'ssd',$User,$Password,$id);
    mysqli_stmt_execute($stmt);
    printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>
