<pre>
<?php
include "ripcord/ripcord.php";

$url   = "http://localhost:8010";
$username  = "admin";
$password = "1";
$dbname = "10xmlrpc";

/* login */
echo "<h2>login process</h2>";

$common = ripcord::client("$url/xmlrpc/2/common");
$uid = $common->authenticate($dbname, $username, $password, array());
var_dump($uid);


/* create $models object*/
$models = ripcord::client("$url/xmlrpc/2/object");


echo "<h2>search_read res.partner</h2>";

$records = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search_read',
    array(
    	array(
            array('name','ilike','%'),
    	)
    ),
    array(
        'fields'=>array('name','street','city','country_id'),
        'limit'=>2
    )

);


echo "<br/>";
var_dump($records);
foreach ($records as $key => $value) {
	echo $value['name'] . "<br/>";
	echo $value['street'] . "<br/>";
	echo $value['city'] . "<br/>";
	echo $value['country_id'][1] . "<br/>";
}



