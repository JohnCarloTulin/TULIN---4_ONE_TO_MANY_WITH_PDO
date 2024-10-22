<?php require_once 'core/handleForms.php'; ?>
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
	<?php $getApplicantByID =getApplicantByID($pdo, $_GET['applicant_id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getApplicantByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getApplicantByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getApplicantByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="firstName">Skills</label> 
			<input type="text" name="skills" value="<?php echo $getApplicantByID['skills']; ?>">
			<input type="submit" name="editApplicantBtn">
		</p>
	</form>
</body>
</html>