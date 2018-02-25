<?php
include("common.php");

echo "<h2>search and then delete res.partner</h2>";

$ids = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
    	array(
    		array('name','=','Heryawan'),
    	)
    )
);
var_dump($ids);

echo "<h2>delete course with id=$ids[0] </h2>";

$ret = $models->execute_kw($dbname, $uid, $password, 
    'res.partner', 'unlink',
    array(
    	$ids, 
    )
);
var_dump($ret);

