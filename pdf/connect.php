<?
parse_str("$QUERY_STRING");

$db = mysql_connect("localhost", "root", "") or die("Could not connect.");
if(!$db) die("no db");
$dbname = "esto";
if(!mysql_select_db($dbname,$db))
 	die("No database selected.");
extract($_REQUEST, EXTR_OVERWRITE, ''); 

$active = 1;
?>