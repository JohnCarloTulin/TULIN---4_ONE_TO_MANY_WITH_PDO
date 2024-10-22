CREATE TABLE bike_store_applicants (
  applicant_id INT AUTO_INCREMENT PRIMARY KEY,
  job_to_apply varchar(50),
  first_name varchar(50),
  last_name varchar(50),
  date_of_birth varchar(50),
  skills text,
  date_added timestamp DEFAULT current_timestamp()
);

CREATE TABLE portfolio_applicants (
  log_id INT(11) AUTO_INCREMENT PRIMARY KEY,
  skills_of_applicant varchar(50),
  description_of_skills text,
  applicant_id INT,
  date_added timestamp DEFAULT current_timestamp()
);