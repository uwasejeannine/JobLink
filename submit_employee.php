<?php
include "config.php";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data and sanitize it
    $name = htmlspecialchars($_POST['employee_name']);
    $email = htmlspecialchars($_POST['employee_email']);
    $phone = htmlspecialchars($_POST['employee_phone']);
    $position = htmlspecialchars($_POST['employee_position']);
    $experience = htmlspecialchars($_POST['employee_experience']);

    // Handle file upload (resume)
    $target_dir = "uploads/"; // Directory to save uploaded files
    $resume = $target_dir . basename($_FILES["employee_resume"]["name"]);
    $uploadOk = 1;
    $resumeFileType = strtolower(pathinfo($resume, PATHINFO_EXTENSION));

    // Check if file is a valid resume format (optional, you can add more types)
    if ($resumeFileType != "pdf" && $resumeFileType != "doc" && $resumeFileType != "docx") {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check file size (optional, example: limit to 2MB)
    if ($_FILES["employee_resume"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        // Ensure the uploads directory exists, if not create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["employee_resume"]["tmp_name"], $resume)) {
            // Prepare SQL and bind parameters using MySQLi
            $sql = $conn->prepare("INSERT INTO employees (name, email, phone, position, experience, resume)
                    VALUES (?, ?, ?, ?, ?, ?)");

            // Bind parameters (s for string)
            $sql->bind_param("ssssss", $name, $email, $phone, $position, $experience, $resume);

            // Execute the query
            if ($sql->execute()) {
                echo "Employee information successfully submitted!";
            } else {
                echo "Error submitting employee information: " . $sql->error;
            }

            // Close the statement
            $sql->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Submission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            background-color: white;

        }

        nav {
    background: url('download (4).jfif') no-repeat center center/cover;
    padding: 50px 0;
}

nav ul {
    list-style-type: none;
    display: flex;
    justify-content: center;
    gap: 20px;
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
        
/* Sticky navbar styles */
.sticky {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #f3f7f8;
    z-index: 1000;
}

.sticky + .content {
    padding-top: 70px; /* adjust to prevent overlap */
}
/* General Styles */


/* Section Styling */
.joblink-section {
  background-color: rgb(193, 233, 245);
  padding: 60px 20px;
  text-align: left;
  border-radius: 10px;
}

/* Intro Section */
.intro h1 {
  font-size: 2.5rem;
  margin: 0;
  font-weight: bold;
  color: #005580;
}

.intro p {
  font-size: 1.2rem;
  color: black;
  margin: 20px 0;
}

.cta-button {
  padding: 10px 20px;
  font-size: 1rem;
  color: white;
  background-color: #005580;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.cta-button:hover {
  background-color: #003d5c;
}

/* Job Seekers Section */
.job-seekers h2 {
  font-size: 2rem;
  color: #333;
  margin-bottom: 20px;
}

.job-seekers p {
  font-size: 1.2rem;
  color: black;
  margin-bottom: 40px;
  line-height: 1.6;
}



/* General Styles for Cards Container */
.cards {
  display: flex;
  justify-content: space-around;
  gap: 20px;
  padding: 80px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 10px 10px 0px blue;
}

/* Individual Card Styles */
.card {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  
  flex: 1;
  max-width: 500px;
  text-align: center;
}

/* Card Heading Styles */
.card h3 {
  font-family: Arial, sans-serif;
  color: #333;
}

/* Card Paragraph Styles */
.card p {
  font-family: Arial, sans-serif;
  color: black;
  font-size: 1.3em;
}

/* Image Styles */
.card img {
  width: 100%;
  height: auto;
  margin-bottom: 20px;
  border-radius: 10px;
}



        .form-box {
            max-width: 5000px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="file"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 30%;
            align-items: center;
        }

        button:hover {
            background-color: #218838;
        }
        footer {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    padding: 20px;
    background-color: #333;
    color: #fff;
    font-family: Arial, sans-serif;
  }
  
  footer {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    padding: 20px;
    background-color: #333;
    color: #fff;
    font-family: Arial, sans-serif;
  }
  
  footer div {
    flex: 1;
    padding: 10px;
  }
  
  footer h1 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #ffcc00;
  }
  
  footer h3, footer h2 {
    font-size: 1em;
    margin: 5px 0;
  }
  
  footer p {
    font-size: 0.9em;
    margin-top: 15px;
  }
  
  .contact-info h3, .visit-info h2 {
    color: #ddd;
  }
  
  .social-media ul {
    list-style: none;
    padding: 0;
  }
  
  .social-media li {
    margin: 5px 0;
  }
  
  .social-media a {
    color: #ffcc00;
    text-decoration: none;
  }
  
  .social-media a:hover {
    text-decoration: underline;
  }
  
  @media (max-width: 768px) {
    footer {
      flex-direction: column;
      align-items: center;
    }
  
    footer div {
      text-align: center;
      padding: 10px 0;
    }
  }
  
    </style>
</head>
<body>
<nav>
    <ul>
    <li><a href="index.html">AHABANZA</a></li>
        <li><a href="submit_employee.php">ABAKOREZI</a></li>
        <li><a href="submit_employer.php">ABAKORESHA</a></li>
        <li><a href="view_employees.php">REBA UMUKOZI</a></li>
        <li><a href="view_employers.php">REBA ABAKORESHA</a></li>
        <li><a href="about.php">IBYO DUKORA</a></li>
    </ul>
    <div>
    <h1> ABAKOZI </h1>
    <h3> AHABANZA // ABAKOZI</h3> 
    </div>
</nav>

 
<section class="joblink-section">
    <div class="intro">
      <h1>Ikaze muri JobLink</h1>
      <h1>Shaka Akazi Kakunyuze</h1>
      <p>
      Muri JobLink, duhura abantu bafite impano n'abakoresha b'icyitegererezo kugirango tugufashe kubona akazi kanyuze<br> 
      Akazi kihuye n’intego zawe z’umwuga n’icyerekezo cyawe. Niba winjiye mu isoko ry’akazi, <br>cyangwa ushaka kuzamura umwuga wawe, turi hano kugufasha mu rugendo rwawe rwose. Ushaka akazi? Turahari kugufasha kubona akazi <br>
      Turi hano kugufasha kubona akazi gihuye n’ubushobozi bwawe n’intego zawe. Sura amahirwe, usabe akazi,<br> 
      usabe akazi, tangira umwuga wawe kandi ugerageze kugera ku byo wizeye ubu natwe.
      </p>
     
       
     
      
    </div>
    
  </section>



<div class="cards">
    <div class="card">
      <h3>Shakisha Akazi</h3>
      <p>Koresha urubuga rwacu rwo gushakisha ushake imyanya y'akazi ibihumbi itangwa n'abakoresha b'icyitegererezo.</p>
      <img src="download (2).jfif" alt="Sample Image">
    </div>
    <div class="card">
      <h3>Tanga Umwirondoro Wawe</h3>
      <p>Tanga umwirondoro wawe muri baze yacu kandi ugaragare ku bakoresha bashoboka.</p>
      <img src="images (4).jfif" alt="Sample Image">
    </div>
    <div class="card">
      <h3>Inama ku Mwuga</h3>
      <p>Bona inama z’abahanga ku mwuga wawe kugira ngo wongere imikorere yo gushaka akazi n’iterambere ry’umwuga wawe.</p>
      <img src="download.jfif" alt="Sample Image">
      <a href="advice.php" class="button">Inama</a>
    </div>
  </div>
</section>

<section>
<div class="form-box">
    <h3>Tanga Amakuru y’Umukozi</h3>
    <form action="submit_employee.php" method="POST" enctype="multipart/form-data">
        <label for="employee-name">AMAZINA</label>
        <input type="text" id="employee-name" name="employee_name" placeholder="Enter full name" required>

        <label for="employee-email">Email</label>
        <input type="email" id="employee-email" name="employee_email" placeholder="Enter email" required>

        <label for="employee-phone">NUMERO</label>
        <input type="text" id="employee-phone" name="employee_phone" placeholder="Enter phone number" required>

        <label for="employee-position">UMWANYA USHAKA</label>
        <input type="text" id="employee-position" name="employee_position" placeholder="Enter position" required>

        <label for="employee-experience">Experience (MUNYAKA)</label>
        <input type="number" id="employee-experience" name="employee_experience" placeholder="Enter years of experience" required>

        <label for="employee-resume">RESUME/CV</label>
        <input type="file" id="employee-resume" name="employee_resume" required>

        <button type="submit">INJIZA</button>
    </form>
</div>
</section>
 <!-- Footer -->
 <footer>
        <div class="contact-info">
          <h1>Nimero</h1>
          <h3>Phone:+250793487065</h3>
          <h3>Email: murenzicharles24@gmail.com</h3>
          <p>&copy; 2024 JobLink - All Rights Reserved</p>
        </div>
        
        <div class="social-media">
          <h1>Imbuga Nkoranyambaga</h1>
          <ul>
          <li><a href="https://youtube.com/@murenzicharles?si=U-CoZVC1GvvwipHf" target="_blank">YouTube</a></li>
            <li><a href="https://www.instagram.com/murenzi893/profilecard/?igsh=Ym14ZDk5aG15ODdv" target="_blank">Instagram</a></li>
          </ul>
        </div>
        
        <div class="visit-info">
          <h1>Dusure</h1>
          <h2>Kigali, Rwanda</h2>
        </div>
      </footer>
<script>
        // JavaScript to handle sticky navbar
        window.onscroll = function() {stickyNavbar()};

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position.
        function stickyNavbar() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
</body>
</html>
