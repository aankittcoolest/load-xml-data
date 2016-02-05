<?php

$text = "検察官、被告人又は弁護人が証人、鑑定人、通訳人又は翻訳人の尋問を請求するについては、あらかじめ、相手方に対し、その氏名及び住居を知る機会を与えなければならない";
$words = explode("　",$text);
var_dump($words);
die();


$url = "file:///C:/Users/1084757/Downloads/law.je.dic.10.0.xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

$data = curl_exec($ch); //execute curl request
curl_close($ch);

$xml = simplexml_load_string($data);
// var_dump(array_count_values($xml));
// die();
$count = 0;
foreach($xml as $entry) {
  echo $entry->Word;
  $count++;
  foreach($entry->Trans as $row) {
    echo $row->Usage;
    $count++;
    //var_dump($row->Usage);
    foreach($row->Example as $r) {
      echo $r->JaPhrase;
      $count++;
      //var_dump($r->JaPhrase);
    }

  }
  var_dump($count);
//   foreach($rows as $row) {
//     var_dump($row);
// die();
//
//   }


}



$con = mysql_connect("127.0.0.1", "root", ""); //connect to server
mysql_select_db("new_xml_extract", $con) or die(mysql_error());

foreach($xml->item as $row) {
  $title = $row->title;
  $destination = $row->destination;
  $price = $row->price;

  //performing the sql query

  // $sql = "INSERT INTO `test_xml` (`title`, `destination`, `price`)"
  //   .VALUES ($title, $destination, $price);
  //
  //   $result = mysql_query($sql);
  //   if(!$result) {
  //     echo "mysql error";
  //   } else {
  //     echo "success";
  //   }
}
http://agentii.infoturism.ro/xml/4699_18f2f97e00a6d416/1m/1325368800
