<?php
/* MongoDB Search with MongoRegex (old method) */

$db = new MongoClient(); #start
$search = new MongoRegex('/^evren/i'); # query in regex
$records = $db->books->find(array('description' => $search)); ## 'evren' searching in book descriptions
## dump
foreach($records AS $row) 
{
   echo '<pre>';
   print_r($row);
   echo '</pre>'; ?>