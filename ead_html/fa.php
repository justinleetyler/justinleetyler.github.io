



	
<html>
	<head>
		<title>Search the Database</title>
	</head>
	<body>
	
	<form action="fasubject.php" method="post">
  	Subject: <input type="text" name="term" />
  <br />Order by: 
  	<Select NAME="order">
		<Option VALUE="title">title</option>
		<Option VALUE="subjectTerm">subject</option>
	</option>
  </Select> <br />
    <input type="submit" name="submit" value="Submit" />
	</form>	
	<p>
	
	<form action="fatitle.php" method="post">
  	Title: <input type="text" name="term" />
  <br />Order by: 
  	<Select NAME="order">
		<Option VALUE="title">title</option>
		<Option VALUE="subjectTerm">subject</option>
	</option>
  </Select> <br />
    <input type="submit" name="submit" value="Submit" />
	</form>	
	
	<form action="faauthor.php" method="post">
  	Author: <input type="text" name="term" />
  <br />Order by: 
  	<Select NAME="order">
		<Option VALUE="title">title</option>
		<Option VALUE="subjectTerm">subject</option>
	</option>
  </Select> <br />
    <input type="submit" name="submit" value="Submit" />
	</form>
	<p>
	</html
