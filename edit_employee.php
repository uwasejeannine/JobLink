<?php
require("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch employee data
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $experience = $_POST['experience'];

    // Update employee data
    $sql = "UPDATE employees SET name = ?, email = ?, phone = ?, position = ?, experience = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $name, $email, $phone, $position, $experience, $id);

    if ($stmt->execute()) {
        echo "Employee updated successfully.";
    } else {
        echo "Error updating employee.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="POST" action="edit_employee.php">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $employee['email']; ?>" required><br><br>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $employee['phone']; ?>" required><br><br>
        <label>Position:</label>
        <input type="text" name="position" value="<?php echo $employee['position']; ?>" required><br><br>
        <label>Experience (Years):</label>
        <input type="number" name="experience" value="<?php echo $employee['experience']; ?>" required><br><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
