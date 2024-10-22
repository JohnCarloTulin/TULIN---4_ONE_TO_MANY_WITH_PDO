<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome To Bike Store Application System!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Join To Apply For:</label> 
			<input type="text" name="job_to_apply">
		</p>
		<p>
			<label for="firstName">First Name:</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name:</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="firstName">Date of Birth:</label> 
			<input type="date" name="dateOfBirth">
		</p>
		<p>
			<label for="firstName">Tell your skills:</label> 
			<input type="text" name="skills">
			<input type="submit" name="insertApplicantBtn">
		</p>
	</form>
	<?php $getAllApplicant = getAllApplicant($pdo); ?>
	<?php foreach ($getAllApplicant as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Job To Apply: <?php echo $row['job_to_apply']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Skills: <?php echo $row['skills']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprojects.php?applicant_id=<?php echo $row['applicant_id']; ?>">View Portfolio</a>
			<a href="editapplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">Edit</a>
			<a href="deleteapplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>