


<?php

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
ini_set("log_errors", 1);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$path = dirname(__FILE__);
$db = new SQLite3($path.'/FullDatabase.db');
//echo $path.'/FullDatabase.db';
$num = $_POST["Number"];
$animalType = $_POST["Animal"];

if($animalType == "Both" && $num == "Any")
{
$results = $db->query("SELECT * FROM DOGS3");
}
elseif ($animalType == "Both" && $num != "Any") {
  $results = $db->query("SELECT * FROM DOGS3 WHERE NUMBER==".$num);
}
elseif ($animalType != "Both" && $num == "Any")
{
  $results = $db->query("SELECT * FROM DOGS3 WHERE TYPE=='".$animalType."'");
}
else {

  //$str = "SELECT * FROM DOGS3 WHERE NUMBER==\":num\" AND TYPE==\":animalType\"";  //    ".$num." AND TYPE=='".$animalType."'";

  $results = $db->query("SELECT * FROM DOGS3 WHERE NUMBER==".$num." AND TYPE=='".$animalType."'");
}
$fullArray = array();


while($row = $results->fetchArray(SQLITE3_ASSOC))
{
  //echo $row["NAME"];
$arr = array(
"Name" =>$row["NAME"],
"Url" => $row["PICTUREURL"],
"Description" => $row["WRITEUP"],
"Contact" => $row["CONTACT"]
);

$fullArray[$row["NAME"]] = $arr;
}


$js = json_encode(utf8ize($fullArray));
echo $js;


?>
