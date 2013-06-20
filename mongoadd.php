<?
/* Mongo Insert Process */

$m = new MongoClient(); // connects to localhost:27017
$db = $m->selectDB("arama"); // database name
$collection = "cars";

$title = "Audi A4 2.0";
$desc = "The Audi A4 is a line of compact executive cars produced since late 1994 by the German car manufacturer Audi, a subsidiary of the Volkswagen Group.";
$url = "audi.com";

$varmi = $collection->findOne(array('title' => $title)); // is exist ?
if($varmi==NULL){
$post2 = array(
    'title'    => ''.$title.'',
    'description'  => ''.$desc.'',
    'url' => ''.$url.'',
);
$collection->insert($post2); // adding
echo "ok"; #if successful
}else {
echo "already have amigo!! GG!!!"; # unsuccessful }

?>