<?php
include("common.php");

echo "<h2>search Country</h2>";

$country_ids = $models->execute_kw($dbname, $uid, $password,
    'res.country', 'search',
    array(
    	array(
            array('name','=','Indonesia'),
    	)
    )
);
echo "<h2>country ID=$country_ids[0]</h2>";

echo "<h2>create Partner with country_id</h2>";

$id = $models->execute_kw($dbname, $uid, $password,
     'res.partner', 'create',
     array(
     	array(
     		 'name'=>"Heryawan",
			 'city'=>"Bandung",
			 'country_id'=>$country_ids[0],
     	),
     )
);
var_dump($id);
