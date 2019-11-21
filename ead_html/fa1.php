



	
<html>
	<head>
		<title>Search the Database</title>
	</head>
	<body>
	<form action="fasearch.php" method="post">
  	Search for: <input type="text" name="term" /> in
	<Select NAME="field">
		<Option VALUE="displayCreator">Author</option>
		<Option VALUE="dateExpression">Date</option>
		<Option VALUE="title">Title</option>
		<Option VALUE="resourceIdentifier1">Assession Number </option>
  </Select>
  <br />Order by: 
  	<Select NAME="order">
		<Option VALUE="displayCreator">Author</option>
		<Option VALUE="dateExpression">Date</option>
		<Option VALUE="title">Title</option>
		<Option VALUE="resourceIdentifier1">Assession Number </option>
  </Select> <br />
    <input type="submit" name="submit" value="Submit" />
	</form>
	<p>
	</html
