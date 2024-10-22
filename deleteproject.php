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
	<?php $getPortfolioByID = getPortfolioByID($pdo, $_GET['log_id']); ?>
	<h1>Are you sure you want to delete this portfolio?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Skills Of Applicant: <?php echo $getPortfolioByID['skills_of_applicant'] ?></h2>
		<h2>Description: <?php echo $getPortfolioByID['description_of_skills'] ?></h2>
		<h2>Applicant Name: <?php echo $getPortfolioByID['project_owner'] ?></h2>
		<h2>Date Added: <?php echo $getPortfolioByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?log_id=<?php echo $_GET['log_id']; ?>&applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
				<input type="submit" name="deletePortfolioBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>