  <meta charset="UTF-8" />
<?php
/* MongoDB data extraction with findOne */


$m = new MongoClient(); #mongo connection
$db = $m->selectDB("firstdb"); #mongo database name
$collection = "pictures"; #colection name

$lol = $db->$collection->findOne(array('title' => 'Mercedes Classe C Occasion')); ##query launch, column 'title' query 'Mercedes Classe C Occasion'

echo $lol['pic1']; #first pic
# print_r($lol); # dump

?>