<?php
include "config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $company = htmlspecialchars($_POST['employer_company']);
    $email = filter_var($_POST['employer_email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format!";
        header("Location: submit_employer.php");
        exit();
    }
    $phone = htmlspecialchars($_POST['employer_phone']);
    $position = htmlspecialchars($_POST['employer_position']);
    $job_description = htmlspecialchars($_POST['employer_description']);
    $job_requirements = htmlspecialchars($_POST['employer_requirements']);
    $location = htmlspecialchars($_POST['employer_location']);

    // Check for empty fields
    if (empty($company) || empty($email) || empty($phone) || empty($position) || empty($job_description) || empty($job_requirements) || empty($location)) {
        $_SESSION['message'] = "All fields are required!";
        header("Location: submit_employer.php");
        exit();
    }

    // Prepare SQL statement
    $sql = $conn->prepare("INSERT INTO employers (company, email, phone, position, job_description, job_requirements, location)
                           VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($sql) {
        // Bind parameters
        $sql->bind_param("sssssss", $company, $email, $phone, $position, $job_description, $job_requirements, $location);

        // Execute query
        if ($sql->execute()) {
            $_SESSION['message'] = "Employer information successfully submitted!";
        } else {
            $_SESSION['message'] = "Error submitting employer information: " . $sql->error;
        }
        $sql->close();
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
    }

    // Redirect
    header("Location: submit_employer.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Employer Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
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
        
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .card-container {
    display: flex;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.card {
    width: 45%;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.card img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.card h1 {
    margin-bottom: 15px;
    color: brown;
    font-size: 1.8em;
}
.card h2 {
    margin-bottom: 15px;
    color: black;
    font-size: 1.4em; 
}

.card p {
    color: black;
    line-height: 1.7;
    text-align: center;
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
    text-align: right;
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
        <li><a href="submit_employee.php">ABAKOZI</a></li>
        <li><a href="submit_employer.php">ABAKORESHA</a></li>
        <li><a href="view_employees.php">REBA UMUKOZI</a></li>
        <li><a href="view_employers.php">REBA ABAKORESHA</a></li>
        <li><a href="about.php">IBYO DUKORA</a></li>
       </ul>
       <div>
    <h1> ABAKORESHA </h1>
    <h3> AHABANZA // ABAKORESHA</h3> 
    </div>
</nav>

<section class="card-container">
    <div class="card">
    <img src="charli.jpeg" alt="Sample Image">
    </div>
    <div class="card">
    <h1>Ibyo ukeneye nk’umukoresha.</h1>
        <h2>Shyigikira abakozi bawe n'ibisubizo by'ubukoresha bihuye n'ibikenewe by'ikigo cyawe</h2>
<p>Sura serivisi zoroheje z'ubukoresha zateguwe kugira ngo zigufashe kubona impano zihambaye zihuje n'icyerekezo cy'ikigo cyawe. Dufasha abakoresha kubona abakozi bafite ubumenyi buhamye, bashobora guteza imbere umusaruro no guteza imbere umuco mwiza w’akazi.
</p>
<h2>Kwamamaza Amahirwe mu buryo Bunoze</h2>

<p>Sangiza imyanya y'akazi yawe ku bantu benshi kugira ngo ukurure abakandida b'icyitegererezo. Urubuga rwacu rwemeza ko abakenewe bashobora kubona amahirwe yawe, bikongera ikigero cyo kugera ku bakandida no gukurura abantu bashoboye.
</p>
<h2>Abakandida Basuzumwe mbere, Bafite Ubushobozi</h2>
<p>
Bura igihe gito mu gusuzuma ibyasabwe. Dusuzuma abakandida byimbitse kugira ngo tugaragaze gusa abafite ubumenyi, ubunararibonye, n'agaciro bihuye n'ibikenewe byawe, bigatuma uburyo bwo gukoresha abakozi bwawe burushaho kuba bwiza kandi bukora neza.
</p>
<h2>Ibisubizo by'Ubukoresha Bihinduka kandi Byahujwe n'Ibikenewe</h2>
<p>
Hindura uburyo bwo gukoresha abakozi bwawe kugira ngo buhuze n'ibikenewe by'ubucuruzi bihindagurika. Niba ikigo cyawe gikenera abakozi b'igihe cyose, ab'igihe gito, cyangwa abakozi b'ibikorwa byihariye, ibisubizo byacu bihinduka bizafasha mu guhangana n'ibikenewe by'abakozi bihora bihinduka.
</p>
    </div>
</section>

</section>

<div class="container">
    <h1>Tanga Amakuru y’Umukoresha</h1>

    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="message">'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>

    <form action="submit_employer.php" method="POST">
        <label for="employer_company">Izina ry'Ikigo:</label>
        <input type="text" id="employer_company" name="employer_company" required>

        <label for="employer_email">Email:</label>
        <input type="email" id="employer_email" name="employer_email" required>

        <label for="employer_phone">NUMERO:</label>
        <input type="text" id="employer_phone" name="employer_phone" required>

        <label for="employer_position">Umwanya:</label>
        <input type="text" id="employer_position" name="employer_position" required>

        <label for="employer_description">Ibisobanuro by'Akazi:</label>
        <textarea id="employer_description" name="employer_description" rows="4" required></textarea>

        <label for="employer_requirements">Ibisabwa ku kazi:</label>
        <textarea id="employer_requirements" name="employer_requirements" rows="4" required></textarea>

        <label for="employer_location">Ahantu:</label>
        <input type="text" id="employer_location" name="employer_location" required>

       

        <button type="submit">Submit</button>
    </form>
</div>
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
</body>
</html>
