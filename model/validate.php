<?php
//
//name validation
function validName($name) {
    return preg_match('/^[a-zA-Z]+$/', $name);
}
//email validation
function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validPhone($phone) {
    return preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone);
}

function validGithub($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
}

function validExperience($experience) {
    return in_array($experience, array('0-2', '2-4', '4+'));
}



//form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $githubLink = $_POST["githubLink"];
    $experience = $_POST["experience"];
    if (!validName($firstName)) {
        $errors[] = "First name must contain only letters.";
    }


    if (!validName($lastName)) {
        $errors[] = "Last name must contain only letters.";
    }


    if (!validEmail($email)) {
        $errors[] = "Invalid email format.";
    }

    if (!validPhone($phone)){
        $errors[] = "not a proper phone number";
    }

    if (!validGithub($githubLink)) {
        $errors[] = "Invalid GitHub link.";
    }
    if (!validExperience($experience)) {
        $errors[] = "Invalid years of experience selected.";
    }


}
?>