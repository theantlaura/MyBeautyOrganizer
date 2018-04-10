<?php
function My_Connect_DB()
{ // String variables below 
$servername = "localhost";
$username = "mybeautyorganizer";
$password = "";
$dbname = "my_mybeautyorganizer";
// below connects to the va
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
die("Connection to DB failed: ".mysqli_connect_error(). "<br/>");
return $conn;
}
function My_SQL_EXE($conn,$sql){
if($result = mysqli_query($conn, $sql))
echo "SQL is done successfully<br/>";
else
echo "Error in running sql:  ".$sql ."with error: ".mysqli_error($conn)."<br/>";
return $result;
}

function My_Show_Table($result){
echo "<table border = 1";
echo "<tr>";
while($fieldinfo = mysqli_fetch_field($result))
{
echo "<td>";
echo $fieldinfo->name;
echo "</td>";
}
echo "</tr>";
while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
foreach($row as $key=>$value)
{
echo "<td>";
echo $value;
echo "</td>";
}
echo "</tr>";
}
echo "</table>";
echo "Total rows: ".mysqli_num_rows($result)."<br/>";
}

function Run_SQL_Show_Table($conn, $sql, $table)
{
My_SQL_EXE($conn, $sql);
$sql = "SELECT * FROM ". $table.";";
$result = My_SQL_EXE($conn, $sql);
My_Show_Table($result);
}
?>