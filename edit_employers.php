<?php
require("config.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM employers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employer = $result->fetch_assoc();
    } else {
        echo "Employer not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employer</title>
</head>
<body>
    <h2>Edit Employer</h2>
    <form action="update_employer.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($employer['id']); ?>">

        <label for="company">Company:</label>
        <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($employer['company']); ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($employer['email']); ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($employer['phone']); ?>" required><br>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="<?php echo htmlspecialchars($employer['position']); ?>" required><br>

        <label for="job_description">Job Description:</label>
        <textarea id="job_description" name="job_description" required><?php echo htmlspecialchars($employer['job_description']); ?></textarea><br>

        <label for="job_requirements">Job Requirements:</label>
        <textarea id="job_requirements" name="job_requirements" required><?php echo htmlspecialchars($employer['job_requirements']); ?></textarea><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($employer['location']); ?>" required><br>

        <button type="submit">Update Employer</button>
    </form>
</body>
</html>
