<?php
include("common.php");

echo "<h2>create Partner</h2>";

$id = $models->execute_kw($dbname, $uid, $password,
     'res.partner', 'create',
     array(
     	array(
     		'name'=>"Heryawan",
     		'city'=>"Bandung",
     	),
     )
);
var_dump($id);
