<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertApplicantBtn'])) {

	$query = insertApplicant($pdo, $_POST['job_to_apply'], $_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['skills']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editApplicantBtn'])) {
	$query = updateApplicant($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['skills'], $_GET['applicant_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteApplicantBtn'])) {
	$query = deleteApplicant($pdo, $_GET['applicant_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewPortfolioBtn'])) {
	
	if (!empty($_POST['skills']) && !empty($_POST['description']) && !empty($_GET['applicant_id'])) {

		$query = insertPortfolio($pdo, $_POST['skills'], $_POST['description'], $_GET['applicant_id']);

		if ($query) {
			header("Location: ../viewprojects.php?applicant_id=" .$_GET['applicant_id']);
		}
		else {
			echo "Insertion failed";
		}
	}
	else {
		echo "Please make sure all input fields are not empty before inserting a new project.";
	}

}




if (isset($_POST['editApplicantBtn'])) {

	if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['dateOfBirth']) && !empty($_POST['skills']) && !empty($_GET['applicant_id'])) {

		$query = updateApplicant($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['skills'], $_GET['applicant_id']);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Edit failed";
		}

	}

	else {
		echo "Make sure no input fields are empty before updating!";
	}

}

if (isset($_POST['editPortfolioBtn'])) {
	
	if (!empty($_POST['edit_skills']) && !empty($_POST['edit_description']) && !empty($_GET['log_id'])) {

		$query = updatePortfolio($pdo, $_POST['edit_skills'], $_POST['edit_description'], $_GET['log_id']);

		if ($query) {
			header("Location: ../viewprojects.php?applicant_id=" .$_GET['applicant_id']);
		}
		
		else {
			echo "Update failed";
		}

	}

}


if (isset($_POST['deletePortfolioBtn'])) {
	$query = deletePortfolio($pdo, $_GET['log_id']);

	if ($query) {
		header("Location: ../viewprojects.php?applicant_id=" .$_GET['applicant_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>