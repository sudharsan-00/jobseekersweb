<?php
include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $applicationFor = $_POST["Application_for"];
    $firstName = $_POST["First_name"];
    $familyName = $_POST["Family_name"];
    $citizenship = $_POST["Citizenship"];
    $dob = $_POST["Date_of_birth"];
    $address = $_POST["Address"];
    $zip = $_POST["ZIP"];
    $city = $_POST["City"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];

    // Prepare and execute SQL query to insert data into the database
    $sql = "INSERT INTO applications (application_for, first_name, family_name, citizenship, date_of_birth, address, zip, city, phone, email)
            VALUES ('$applicationFor', '$firstName', '$familyName', '$citizenship', '$dob', '$address', '$zip', '$city', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        $applicationId = $conn->insert_id; // Get the ID of the newly inserted record

        // Handle file uploads as BLOBs
        $applicationLetterBlob = addslashes(file_get_contents($_FILES["Application_letter"]["tmp_name"]));
        $cvBlob = addslashes(file_get_contents($_FILES["Curriculum_vitae"]["tmp_name"]));

        // Store BLOBs in the database
        $fileSql = "INSERT INTO uploaded_files (application_id, application_letter, curriculum_vitae) VALUES ('$applicationId', '$applicationLetterBlob', '$cvBlob')";
        $conn->query($fileSql);

        header('Location: queries.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
