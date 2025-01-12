<?php
 include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amatangazo</title>
    <head>
    <style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
   background-color: white;
    
    color: #333;
}
/* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: url('download (4).jfif') no-repeat center center/cover;
    padding: 50px 0px;
    color: white;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
    justify-content: center;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a:hover {
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

/* Responsive Design */
@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
        gap: 10px;
    }}
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
       <h1>Amatangazo Y'Akazi</h1>
        <h3> AHABANZA //Amatangazo</h3> 
    </div>
</nav>   
</body>
</html>