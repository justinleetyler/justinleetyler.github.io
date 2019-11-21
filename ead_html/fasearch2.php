<?php
// Make a MySQL Connection
mysql_connect("localhost", "root", "fdBEr7EBfm4A") or die(mysql_error());
mysql_select_db("at") or die(mysql_error());
$creator = $_POST['creator'];
$title = $_POST['title'];
$subject = $_POST['subject'];
$order = $_POST['order'];

// Retrieve all the data from the "example" table
$result = mysql_query("select distinct resources.resourceIdentifier1, resources.title, resources.displayCreator from resources, subjects, archdescriptionsubjects where resources.resourceID=archdescriptionsubjects.resourceID and archdescriptionsubjects.subjectID=subjects.subjectID and subjects.subjectTerm like '%$subject%' and resources.title like '%$title%' and resources.displayCreator like '%$creator%' order by $order"); 
// store the record of the "example" table into $row

      echo"Click on the title to view finding aid.<p><table border=1>
	  
	      <tr>
      <th>Title</th>
      <th>Creator(s)</th>
    </tr>";

	  while($row = mysql_fetch_array($result)){

      echo "<tr><td><a href=\"http://dplopac.detroitpubliclibrary.org/WebCat_Images/English/Other/Findingaids/web/bhc". $row['resourceIdentifier1']. ".xml\">" .$row['title']. "</a></td>";
      echo "<td>". $row['displayCreator']. "</td>";

	  
//	echo "<a href=\"http://dplopac.detroitpubliclibrary.org/WebCat_Images/English/Other/Findingaids/web/bhc". $row['resourceIdentifier1']. ".xml\">Finding aid</a>";
//	echo "<p />";
}
	  echo "</table>";
?>