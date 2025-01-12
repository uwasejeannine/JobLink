<?php
require("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $job_description = $_POST['job_description'];
    $job_requirements = $_POST['job_requirements'];
    $location = $_POST['location'];

    $sql = "UPDATE employers SET company = ?, email = ?, phone = ?, position = ?, job_description = ?, job_requirements = ?, location = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $company, $email, $phone, $position, $job_description, $job_requirements, $location, $id);

    if ($stmt->execute()) {
        echo "Employer updated successfully!";
    } else {
        echo "Error updating employer: " . $stmt->error;
    }
}
?>

