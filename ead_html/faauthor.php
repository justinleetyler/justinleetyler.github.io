<?php
// Make a MySQL Connection
mysql_connect("localhost", "root", "fdBEr7EBfm4A") or die(mysql_error());
mysql_select_db("at") or die(mysql_error());
$term = $_POST['term'];
$order = $_POST['order'];

// Retrieve all the data from the "example" table
$result = mysql_query("select title, displayCreator from resources where displayCreator like '%$term%' order by $order"); 
// store the record of the "example" table into $row

print "<table border='1'>
    <tr>
      <th>Creator</th>
	  <th>Title</th>
    </tr>";

while($row = mysql_fetch_array($result)){
        print "<tr><td>$row[displayCreator]</td>";
        print "<td>$row[title]</td></tr>";
        }
//	echo "<a href=\"http://dplopac.detroitpubliclibrary.org/WebCat_Images/English/Other/Findingaids/web/bhc". $row['resourceIdentifier1']. ".xml\">Finding aid</a>";
//	echo "<p />";

print "</table>";
?>