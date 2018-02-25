<?php
include("common.php");


/* create tag 1 */
echo "<h2>create Tag 1</h2>";

$tag1_id = $models->execute_kw($dbname, $uid, $password,
    'res.partner.category', 'create',
    array(
        array(
            'name'       => "Senior",
        ),
    )
);
var_dump($tag1_id);


/* create tag 2 */
echo "<h2>create Tag 2</h2>";
$tag2_id = $models->execute_kw($dbname, $uid, $password,
    'res.partner.category', 'create',
    array(
        array(
            'name' => 'Part Time',
        )
    )
);
var_dump($tag2_id);




/* search tag 3 */
echo "<h2>search Tag 3</h2>";
$tag3_ids = $models->execute_kw($dbname, $uid, $password,
    'res.partner.category', 'search',
    array(
        array(
            array(
                'name' , '=',  'Bronze',
            )
        )
    )
);
var_dump($tag3_ids);



echo "<h2>search Partner to Update</h2>";

/* search ID instruktur */
$ids = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
        array(
            array('name','=','China Export'),
        )
    )
);
var_dump($ids);
if (!$ids){
    die("China Export not found!");
}


echo "<h2>write category_id on res.partner</h2>";

$ret = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'write',
    array(
        $ids, 
        array(
            'category_id'    =>array(
                array(4,$tag1_id),
                array(4,$tag2_id),
                array(4,$tag3_ids[0])
            )
        )
    )
);
var_dump($ret);




