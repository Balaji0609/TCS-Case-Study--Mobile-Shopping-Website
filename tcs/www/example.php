

<?php
$link=mysql_connect("localhost","root","");
mysql_select_db("mytest");
$result_set=mysql_query("SELECT ipath FROM offerstable");

$row=mysql_fetch_assoc($result_set);
$res=$row['ipath'];
while($row=mysql_fetch_assoc($result_set)){
   $res=$res."&".$row['ipath'];}
echo $res;
?>
