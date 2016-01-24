<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<?php
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=asfl;host=localhost';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $a = $pdo->query("SELECT * FROM users");
    $a->setFetchMode(PDO::FETCH_OBJ);
    $b = $a->fetchAll();
    $i = 0;
    foreach ($b as $z){
        echo '<div>';
        print_r($z);
    	$req = $pdo->prepare("INSERT INTO addresses (name, address, zipCode, city, phone, hidePhone, description, lat, lng, user_id) VALUES(:name, :address, :zipCode, :city, :phone, :hidePhone, :description, :lat, :lng, :user_id)");
    	$req->execute(array(
    		"name" => "Nom de l'adresse",
    		"address" => $z->address,
    		"zipCode" => $z->zipCode,
    		"city" => $z->city,
    		"phone" => $z->phone,
    		"hidePhone" => $z->hidePhone,
    		"description" => $z->description,
    		"lat" => $z->lat,
    		"lng" => $z->lng,
    		"user_id" => $z->id
    		));
        echo '</div>';
        echo '<br />';
    }
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

//var_dump($pdo, $a, $b);
//print_r($b);
?>
</body>
</html>