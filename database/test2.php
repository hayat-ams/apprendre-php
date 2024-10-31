<?php

require_once 'database.php';
//create an object to make a connection to the database
$db = new Database();
//don't do this!!!!!!!!!!!!!!!
//$cmd="insert into departement_details(title,code)values('Departement of Electronivc','DE')";//don't do this(shows values no) ici juste un exemple ok !!!
//$stmnt=$db->conn->prepare($cmd);
//$stmnt->execute();
//but do this  because it's more safe !!!!!!!!!!!!!!!!
$t="Departement of engineering";
$c="EN";
$cmd="insert into departement_details(title,code)values(:title,:code)";
$stmnt=$db->conn->prepare($cmd);

try{
    $stmnt->execute([":title"=>$t,":code"=>$c]);

}catch(Exception $e){
    echo $e->getMessage() ."<br>";//this will show the error message//in php we use . to concatenate not +
}
//how to execute sql commands
//a.write the string version of the command
$cmd ="select * from departement_details";
//b.create a prepared statement(compiled version of the command)
$statement=$db->conn->prepare($cmd);
//c.execute the prepared statement
$statement->execute();
//d.view the result
$rv=$statement->fetchAll(PDO::FETCH_ASSOC);
//e.display the result
print_r($rv);





?>