<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
  <th>Id</th> 
  <th>Name</th> 
  <th>Email</th>
  <th>Location</th>
  <th>Skills</th>
 </tr>
 <?php
$conn = mysqli_connect('localhost', 'root', 'calderon1812', 'test');
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id, username, password FROM login";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["idusers"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["email"]. "</td></tr>" . $row["location"]. "</td></tr>" . $row["skills"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>