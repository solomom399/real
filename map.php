<?php
define ("DB_HOST", "127.0.0.1");
define ("DB_USER", "root");
define ("DB_PASS","");
define ("DB_NAME","csm");

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$setCounter = 0;

$setExcelName = "cms";

$setSql = "SELECT  * FROM verify";

$setRec = mysqli_query($link,$setSql);

$setCounter = mysqli_num_fields($setRec);

for ($i = 0; $i < $setCounter; $i++) {
    @$setMainHeader .= mysqli_field_name($setRec, $i)."\t";
}

while($rec = mysqli_fetch_rows($setRec))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "\t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "\t";
    }
    $rowLine .= $value;
  }
  @$setData .= trim($rowLine)."\n";
}
  $setData = str_replace("\r", "", $setData);

if ($setData == "") {
  $setData = "\nno matching records found\n";
}

$setCounter = mysqli_num_fields($setRec);



//This Header is used to make data download instead of display the data
 header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=".$setExcelName."_Entrysheet.xls");

header("Pragma: no-cache");
header("Expires: 0");

//It will print all the Table row as Excel file row with selected column name as header.

  echo ucwords($setMainHeader)."\n".$setData."\n";

?>