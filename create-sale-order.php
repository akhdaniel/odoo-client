<?php
include("common.php");

echo "<h2>search Produk1</h2>";
$product_ids1 = $models->execute_kw($dbname, $uid, $password,
    'product.product', 'search',
    array(
    	array(
            array('name','=','Laptop E5023'),
    	)
    )
);
var_dump($product_ids1);

echo "<h2>search Produk2</h2>";
$product_ids2 = $models->execute_kw($dbname, $uid, $password,
    'product.product', 'search',
    array(
    	array(
            array('name','=','Datacard'),
    	)
    )
);
var_dump($product_ids2);

echo "<h2>search Customer</h2>";
$partner_ids = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
    	array(
            array('name','=','The Jackson Group'),
    	)
    )
);
var_dump($partner_ids);

echo "<h2>create Sale Order</h2>";

$id = $models->execute_kw($dbname, $uid, $password,
     'sale.order', 'create',
     array(
     	array(
     		'partner_id'=>$partner_ids[0],
     		'order_line'=>array(
                 array(0,0,array(
                     'product_id'      => $product_ids1[0],
                     'product_uom_qty' => 10
                    )),
                array(0,0,array(
                    'product_id'      => $product_ids2[0],
                    'product_uom_qty' => 20
                    )),
                   
             )
     	),
     )
);
var_dump($id);
