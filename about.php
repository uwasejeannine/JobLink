<?php
 include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>abaut us</title>
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

/* Navigation Bar */
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
    }
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
    color: #333;
    font-size: 1.8em;
}

.card p {
    color: #666;
    line-height: 1.6;
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
    <h1> IBYO DUKORA</h1>
    <h3> AHABANZA // IBYO DUKORA</h3> 
    </div>
</nav>

<section class="card-container">
    <div class="card">
        <img src="images (4).jfif" alt="Sample Image">
    </div>
    <div class="card">
        <h1>IBYO DUKORA</h1>
        <p>
            Kuri JobLink, duhuza ibigo n’abakozi b’abahanga kandi tugafasha abashaka akazi kubona umwuga wuzuye ubuzima.
            Urubuga rwacu rworoshya uburyo bwo gushaka abakozi, rutanga serivisi zigenewe abatanga akazi ndetse n’abashaka akazi.
            Abatanga akazi bashobora gushyiraho ibyifuzo by’akazi, kwinjiza abakozi bashoboye, no kubona ibisubizo byihuse mu guhitamo abakozi,
            mu gihe abashaka akazi bashobora gushaka ibyifuzo by’akazi, kohereza ubusabe bw’akazi, no kwakira inama ku mwuga.
            Twiyemeje guteza imbere intsinzi y’impande zombi, twizeza ko ibigo n’abakozi bazahigira imbere.
            Twiyunge natwe none, maze twubake umusingi hagati y’ubushobozi n’amahirwe!
        </p>
    </div>
</section>

</section>

<form style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 100%; text-align: center;">
        <label for="contact" style="display: block; margin-bottom: 20px; font-size: 16px; color: #333;">NIMERO: 0793487065</label>
        <label for="email" style="display: block; margin-bottom: 20px; font-size: 16px; color: #333;">EMAIL: murenzicharles24@gmail.com</label>
        <label for="location" style="display: block; margin-bottom: 20px; font-size: 16px; color: #333;">LOCATION: Kigali</label>
    </form>
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