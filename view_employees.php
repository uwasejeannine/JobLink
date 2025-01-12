<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("config.php");

// Query to fetch employee submissions
$sql = "SELECT * FROM employees";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "Error preparing statement: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Submissions</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        /* Navigation Bar */
        nav {
            background: url('download (4).jfif') no-repeat center center/cover;
            padding: 50px 0;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
    color: #f0a500;
    
    border-radius: 5px;
  
    font-size: 20px;
}
        nav div {
    text-align: center;
    margin-top: 15px;
}

nav div h1 {
    font-size: 2em;
    color: white;
    margin-bottom: 5px;
}

nav div h3 {
    font-size: 1.5em;
    color: #ccc;
    font-weight: normal;
}

        /* Table Styles */
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color:  rgb(193, 233, 245);
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        /* Button Styles */
        .btn {
            padding: 6px 12px;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 3px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #3498db;
        }

        .edit-btn:hover {
            background-color: #2980b9;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<nav>
    <ul>
    <li><a href="index.html">AHABANZA</a></li>
        <li><a href="submit_employee.php">ABAKOZI</a></li>
        <li><a href="submit_employer.php">ABAKORESHA</a></li>
        <li><a href="view_employees.php">REBA UMUKOZI</a></li>
        <li><a href="view_employers.php">REBA ABAKORESHA</a></li>
        <li><a href="about.php">IBYO DUKORA</a></li>
   </ul>
   <div>
    <h1>Umukozi Wizewe </h1>
    <h3>AHABANZA // AKAZI</h3> 
    </div>
</nav>

<h2>Amakuru y'Abakozi</h2>

<?php if (isset($result) && $result->num_rows > 0): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Izina</th>
            <th>Email</th>
            <th>Numero</th>
            <th>Umwanya</th>
            <th>Experience (Years)</th>
            <th>Resume/cv</th>
            <th>Igikorwa</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($employee = $result->fetch_assoc()): ?>
            <tr id="row-<?php echo $employee['id']; ?>">
                <td><?php echo htmlspecialchars($employee['id']); ?></td>
                <td><?php echo htmlspecialchars($employee['name']); ?></td>
                <td><?php echo htmlspecialchars($employee['email']); ?></td>
                <td><?php echo htmlspecialchars($employee['phone']); ?></td>
                <td><?php echo htmlspecialchars($employee['position']); ?></td>
                <td><?php echo htmlspecialchars($employee['experience']); ?></td>
                <td><a href="<?php echo htmlspecialchars($employee['resume']); ?>" download>Download Resume</a></td>
                <td>
                    <a href="edit_employee.php?id=<?php echo $employee['id']; ?>" class="btn edit-btn">Edit</a>
                    <button class="btn delete-btn" onclick="deleteEmployee(<?php echo $employee['id']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <p style="text-align: center;">No employee submissions found.</p>
<?php endif; ?>

<script>
    function deleteEmployee(id) {
        if (confirm("Are you sure you want to delete this employee?")) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_employee.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        document.getElementById("row-" + id).remove();
                    } else {
                        alert("Error deleting employee: " + response.message);
                    }
                }
            };
            xhr.send("id=" + id);
        }
    }
</script>

</body>
</html>
