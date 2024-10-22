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
	<h1>Are you sure you want to delete this applicant?</h1>
	<?php $getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Job To Apply: <?php echo $getApplicantByID['job_to_apply']; ?></h2>
		<h2>First Name: <?php echo $getApplicantByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getApplicantByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getApplicantByID['date_of_birth']; ?></h2>
		<h2>Skills: <?php echo $getApplicantByID['skills']; ?></h2>
		<h2>Date Added: <?php echo $getApplicantByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
				<input type="submit" name="deleteApplicantBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>