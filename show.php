<?php include('header.php'); ?>
<?
$con = mysql_connect("localhost","root","root",);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("khs", $con);

$result1 = mysql_query("SELECT * FROM g8") ;

echo "<form action='ConfirmEnter.php' method='post'>";
echo "<input type="Radio" name="mark" value="mt">"."MidTerm<br>";
echo "<input type="Radio" name="mark" value="pr">"."Project<br>";
echo "<input type="Radio" name="mark" value="fi">"."Final<br>";
echo "<table border cellpadding=3>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>MidTerm</th>";
echo "<th>Project</th>";
echo "<th>Final</th>";
echo "<th>Total</th>". "</tr>";

$count=1;

while($row1 = mysql_fetch_array($result1))
 {
 echo "<tr>";
 echo "<td><input name='ID[]' readonly='readonly' value='". $row1['ID'] ."'      size=5/></td> ";
 echo "<td><input type='text' name='mt[]' size=5 value='0.0' /></td>";
 echo "<td><input type='text' name='pr[]' size=5 value='0.0' /></td>";
 echo "<td><input type='text' name='fi[]' size=5 value='0.0' /></td>";
 echo "</tr>";
$count++;
 }
echo "</table>";
echo "<input type='submit' value='Submit' />";
echo "</form>";
mysql_close($con);


?>
