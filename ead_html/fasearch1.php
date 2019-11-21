<?php
// Make a MySQL Connection
mysql_connect("localhost", "root", "fdBEr7EBfm4A") or die(mysql_error());
mysql_select_db("at") or die(mysql_error());


// Retrieve all the data from the "example" table
$result = mysql_query("select subjects.subjectTerm,resources.title from resources, archdescriptionsubjects, subjects where subjects.subjectId=archdescriptionsubjects.subjectId and archdescriptionsubjects.resourceId=resources.resourceId"); 
// store the record of the "example" table into $row

print "<table border='1'>
    <tr>
      <th>Subject</th>
      <th>Title</th>
    </tr>";

while($row = mysql_fetch_array($result)){
        print "<tr><td>$row[subjectTerm]</td>";
        print "<td>$row[title]</td></tr>";
        }
//	echo "<a href=\"http://dplopac.detroitpubliclibrary.org/WebCat_Images/English/Other/Findingaids/web/bhc". $row['resourceIdentifier1']. ".xml\">Finding aid</a>";
//	echo "<p />";

print "</table>";
?>