<?php
include("common.php");

echo "<h2>create Sale Order</h2>";

$order_lines = array(
	array(
		'product'      => 'Laptop E5023',
		'product_uom_qty' => 10
	),
	array(
		'product'      => 'Datacard',
		'product_uom_qty' => 20
	)	  
);

$id = $models->execute_kw($dbname, $uid, $password,
	'sale.order', 'sale_auto_payment',
	array(
		array()
	),
	array(
		'order_lines'=>$order_lines,
		'customer'=>'The Jackson Group',
		'journal_name'=>'Bank'
	)
);
var_dump($id);
