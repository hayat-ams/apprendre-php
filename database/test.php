<?php 
require_once 'database.php';//this will include the database.php file
//create an object to make a connection to the database
$database = new Database();//this will create the object of the database class,create instance of the class
//how to execute sql commands
//a .write the string version of the command
$cmd="select * from programme_details";
//b.create a prepared statement(compiled version of the command)
$statement=$database->conn->prepare($cmd);
//c.execute the prepared statement
$statement->execute();
//d.view the result
$rv=$statement->fetchAll(PDO::FETCH_ASSOC);
//e.display the result
print_r($rv);


?>