<?php  

function insertApplicant($pdo, $job_to_apply, $first_name, $last_name, 
	$date_of_birth, $skills) {

	$sql = "INSERT INTO bike_store_applicants (job_to_apply, first_name, last_name, 
		date_of_birth, skills) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$job_to_apply, $first_name, $last_name, 
		$date_of_birth, $skills]);

	if ($executeQuery) {
		return true;
	}
}



function updateApplicant($pdo, $first_name, $last_name, 
	$date_of_birth, $skills, $applicant_id) {

	$sql = "UPDATE bike_store_applicants
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					skills = ?
				WHERE applicant_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $skills, $applicant_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteApplicant($pdo, $applicant_id) {
	$deleteApplicantProj = "DELETE FROM portfolio_applicants WHERE applicant_id = ?";
	$deleteStmt = $pdo->prepare($deleteApplicantProj);
	$executeDeleteQuery = $deleteStmt->execute([$applicant_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM bike_store_applicants WHERE applicant_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$applicant_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getAllApplicantID($pdo, $applicant_id) {
	$sql = "SELECT * FROM bike_store_applicants WHERE applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicant_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function getAllApplicant($pdo) {
	$sql = "SELECT * FROM bike_store_applicants";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getApplicantByID($pdo, $applicant_id) {
	$sql = "SELECT * FROM bike_store_applicants WHERE applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicant_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function getPortfolioByApplicant($pdo, $applicant_id) {
	
	$sql = "SELECT 
				portfolio_applicants.log_id AS log_id,
				portfolio_applicants.skills_of_applicant AS skills_of_applicant,
				portfolio_applicants.description_of_skills AS description_of_skills,
				portfolio_applicants.date_added AS date_added,
				CONCAT(bike_store_applicants.first_name,' ',bike_store_applicants.last_name) AS project_owner
			FROM portfolio_applicants
			JOIN bike_store_applicants ON portfolio_applicants.applicant_id = bike_store_applicants.applicant_id
			WHERE portfolio_applicants.applicant_id = ? 
			GROUP BY portfolio_applicants.skills_of_applicant;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicant_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertPortfolio($pdo, $skills_of_applicant, $description_of_skills, $applicant_id) {
	$sql = "INSERT INTO portfolio_applicants (skills_of_applicant, description_of_skills, applicant_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$skills_of_applicant, $description_of_skills, $applicant_id]);
	if ($executeQuery) {
		return true;
	}

}

function getPortfolioByID($pdo, $applicant_id) {
	$sql = "SELECT 
				portfolio_applicants.log_id AS log_id,
				portfolio_applicants.skills_of_applicant AS skills_of_applicant,
				portfolio_applicants.description_of_skills AS description_of_skills,
				portfolio_applicants.date_added AS date_added,
				CONCAT(bike_store_applicants.first_name,' ',bike_store_applicants.last_name) AS project_owner
			FROM portfolio_applicants
			JOIN bike_store_applicants ON portfolio_applicants.applicant_id = bike_store_applicants.applicant_id
			WHERE portfolio_applicants.log_id  = ? 
			GROUP BY portfolio_applicants.skills_of_applicant";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicant_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updatePortfolio($pdo, $edit_skills, $edit_description, $log_id) {
	$sql = "UPDATE portfolio_applicants
			SET skills_of_applicant = ?,
				description_of_skills = ?
			WHERE log_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$edit_skills, $edit_description, $log_id]);

	if ($executeQuery) {
		return true;
	}
}

function deletePortfolio($pdo, $log_id) {
	$sql = "DELETE FROM portfolio_applicants WHERE log_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$log_id]);
	if ($executeQuery) {
		return true;
	}
}

function getAllInfoByApplicantID($pdo, $applicant_id) {
	$sql = "SELECT * FROM bike_store_applicants WHERE $applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicant_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

?>

