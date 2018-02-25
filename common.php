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
