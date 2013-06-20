<?
/* MongoDB Sitemap Example */
/* Values :
   #Database name : arama 
   #Collection : resimler
   #Website adress : recherche-aguea.com
   #limit 5000, sort id asc */
$m = new MongoClient(); // connects to localhost:27017
$db = $m->selectDB("arama"); // database name
include("jr/cf.php"); // it's my library
function mull($v){
$v = str_replace(" ","-",$v);
return ($v); }
function mul($v){
$v = str_replace("&","",$v);
return ($v); }
$asiteadresi ="http://recherche-fr.aguea.com/"; // website adress


if(! isset($_GET[p])) $sayfa=1; else $sayfa=$_GET[p]; 
$date=date("Y-m-d"); // Year-month-day
if($sayfa=="index"): // sitemap index
$index_sayi=$db->resimler->count(); //collection count
$index_sayi=ceil($index_sayi / 6000); 
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>  <sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";  
for($i=0; $i<$index_sayi; $i++){  
echo "<sitemap>  <loc>".$asiteadresi."sitemap.php?p=".($i+1)."</loc>  <lastmod>$date</lastmod>  </sitemap>\n";  
} 
echo "</sitemapindex>";  
else:  
$kactane = $sayfa*5000;
$kactane = $kactane-5000;  
$lol = $db->resimler->find()->limit(5000)->sort(array('_id' => 1))->skip($kactane);
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
        xmlns:image=\"http://www.google.com/schemas/sitemap-image/1.1\"
        xmlns:video=\"http://www.google.com/schemas/sitemap-video/1.0\">\n";
foreach ($lol as $ad) {
$titlem = $ad['title'];
$sinif= substr(mb_strtolower($titlem,'UTF-8'),0,2);
echo " 
     <url>  
     <loc>".$asiteadresi."".mul($sinif)."/".mull($titlem)."</loc>  
     <priority>0.80</priority>
     <changefreq>weekly</changefreq>
	</url>\n";
}
echo '</urlset>';   
endif; 
 ?>  

