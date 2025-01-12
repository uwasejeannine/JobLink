<?php
require("config.php");

// Query to fetch employer submissions
$sql = "SELECT * FROM employers";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employer Submissions</title>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
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

nav li {
    margin: 0;
}

nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    font-size: 1rem;
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

@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
        align-items: center;
    }

    nav a {
        padding: 10px;
        width: 100%;
        text-align: center;
    }
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
    font-weight: bold;
}

td {
    padding: 10px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}
.rating-display {
    color: #f5a623;
    font-size: 1rem;
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

        /* Your existing CSS code */
        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            font-size: 0.9rem;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #3498db;
        }
        .delete-btn {
            background-color: #e74c3c;
            border: none;
        }
    </style>
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
    <h1>Imirimo Iri Kuboneka </h1>
    <h3> AHABANZA // AKAZI</h3> 
    </div>
</nav>
    <script>
        function deleteEmployer(id) {
    if (confirm("Are you sure you want to delete this entry?")) {
        fetch("delete_employer.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${id}`,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`row-${id}`).remove();
            } else {
                alert(`Error deleting entry: ${data.message}`);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    }
}

    </script>
</head>
<body>
    <!-- Navigation and Table Headers remain the same -->
    
    <h2>Employer Submissions</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Izina ry'Ikigo</th>
                <th>Email</th>
                <th>NUMERO</th>
                <th>Umwanya</th>
                
                <th>Ibisobanuro by'Akazi</th>
                <th>Ibisabwa ku kazi</th>
                <th>Ahantu</th>
                <th>Rating</th>
                <th>Actions</th>
                

            </tr>
        </thead>
        <tbody>
            <?php while ($employer = $result->fetch_assoc()): ?>
                <tr id="row-<?php echo $employer['id']; ?>">
                    <td><?php echo htmlspecialchars($employer['id']); ?></td>
                    <td><?php echo htmlspecialchars($employer['company']); ?></td>
                    <td><?php echo htmlspecialchars($employer['email']); ?></td>
                    <td><?php echo htmlspecialchars($employer['phone']); ?></td>
                    <td><?php echo htmlspecialchars($employer['position']); ?></td>
                    <td><?php echo htmlspecialchars($employer['job_description']); ?></td>
                    <td><?php echo htmlspecialchars($employer['job_requirements']); ?></td>
                    <td><?php echo htmlspecialchars($employer['location']); ?></td>
                    <td><?php echo htmlspecialchars($employer['rating']); ?></td>
                    <td class="rating-display"><?php echo str_repeat('★', $employer['rating']); ?></td>


                    <td>
                    <a href="edit_employer.php?id=<?php echo $employer['id']; ?>" class="btn edit-btn">Edit</a>
                        <button class="btn delete-btn" onclick="deleteEmployer(<?php echo $employer['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
