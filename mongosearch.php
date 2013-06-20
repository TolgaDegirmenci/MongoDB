  <meta charset="UTF-8" />
<?php
/* MongoDB Search with execute */
$m = new MongoClient(); # start
$db = $m->selectDB("mydatabase"); # enter dbname
#collection name 'pictures',query 'bmw',limit '8' (skip can't using on execute,every time will start first line.)
$lol = $db->execute('db.pictures.runCommand( "text", { search : "bmw" , limit: 8 })'); 


 
#print_r($lol); #dump



# print title
foreach ($lol as $ad) {

$pic1 = $ad['results'][2]['obj']['title']."<br>";
echo $pic1;
}


     ?>