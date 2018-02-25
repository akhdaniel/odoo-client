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


echo "<h2>search and then read res.partner</h2>";
/* search ID course */
/* 
[] [1,2,3] [1,2,3,4]
() (1,2)
python : search( [ 
('name','=','Java'),
('instructor_id','=','Joko') ] ) 
*/
$ids = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
    	array(
            array('name','like','Agrolait'),
    	)
    )
);
// $ids = [2,4]
var_dump($ids);

/* read records by ID */
$records = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'read', array($ids));

echo "<br/>";

foreach ($records as $key => $value) {
	echo $value['name'] . "<br/>";
	echo $value['street'] . "<br/>";
	echo $value['city'] . "<br/>";
}



