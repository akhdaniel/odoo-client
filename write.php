<?php
include("common.php");


echo "<h2>search and then write res.partner</h2>";

/* search ID course */
$id = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
    	array(
    		array('name','=','Heryawan'),
    	)
    )
);
var_dump($id);

echo "<h2>write Partner with id=$id[0] </h2>";

$ret = $models->execute_kw($dbname, $uid, $password, 
	'res.partner', 'write',
    array(
    	$id, 
    	array('street'=>"Jl Jendral Sudirman")
   	)
);
var_dump($ret);

