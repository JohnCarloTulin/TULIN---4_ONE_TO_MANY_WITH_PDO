<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByApplicantID = getAllInfoByApplicantID($pdo, $_GET['applicant_id']); ?>
	<h1>Name: <?php echo $getAllInfoByApplicantID['first_name']. " " . $getAllInfoByApplicantID['last_name']; ?></h1>
	<h1>Add New Portfolio</h1>
	<form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
		<p>
			<label for="Skills">Skills</label> 
			<input type="text" name="skills">
		</p>
		<p>
			<label for="Description">Description</label> 
			<input type="text" name="description">
			<input type="submit" name="insertNewPortfolioBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Log ID</th>
	    <th>Skills</th>
	    <th>Description</th>
	    <th>Applicant Name</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getPortfolioByApplicant = getPortfolioByApplicant($pdo, $_GET['applicant_id']); ?>
	  <?php foreach ($getPortfolioByApplicant as $row) { ?>
	  <tr>
	  	<td><?php echo $row['log_id']; ?></td>	  	
	  	<td><?php echo $row['skills_of_applicant']; ?></td>	  	
	  	<td><?php echo $row['description_of_skills']; ?></td>	  	
	  	<td><?php echo $row['project_owner']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editproject.php?log_id=<?php echo $row['log_id']; ?>&applicant_id=<?php echo $_GET['applicant_id']; ?>">Edit</a>

	  		<a href="deleteproject.php?log_id=<?php echo $row['log_id']; ?>&applicant_id=<?php echo $_GET['applicant_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>