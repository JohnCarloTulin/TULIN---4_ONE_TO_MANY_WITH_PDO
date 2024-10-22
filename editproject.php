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
	<a href="viewprojects.php?applicant_id=<?php echo $_GET['applicant_id']; ?>">
	View The Portfolio</a>
	<h1>Edit the portfolio!</h1>
	<?php $getPortfolioByID = getPortfolioByID($pdo, $_GET['log_id']); ?>

	<form action="core/handleForms.php?log_id=<?php echo $_GET['log_id']; ?>
	&applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
		<p>
			<label for="firstName">Skills: </label> 
			<input type="text" name="edit_skills" 
			value="<?php echo $getPortfolioByID['skills_of_applicant']; ?>">
		</p>
		<p>
			<label for="firstName">Description: </label> 
			<input type="text" name="edit_description" 
			value="<?php echo $getPortfolioByID['description_of_skills']; ?>">
			<input type="submit" name="editPortfolioBtn">
		</p>
	</form>
</body>
</html>