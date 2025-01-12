<?php
 include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
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
    }
}
/* Section Styling */
.joblink-section {
  background-color: rgb(193, 233, 245);
  padding: 60px 20px;
  
  border-radius: 10px;
}

/* Intro Section */
.intro h1 {
  font-size: 2.5rem;
  margin: 0;
  font-weight: bold;
  color: #005580;
  text-align: center;
}

.intro p {
  text-align: left;
  font-size: 1.2rem;
  color: black;
  margin: 20px 0;
}
</style>
</head>
<body>
<nav>
    <ul>
    <li><a href="index.html">AHABANZA</a></li>
        <li><a href="submit_employee.php">abakozi</a></li>
        <li><a href="submit_employer.php">ABAKORESHA</a></li>
        <li><a href="view_employees.php">REBA UMUKOZI</a></li>
        <li><a href="view_employers.php">REBA ABAKORESHA</a></li>
        <li><a href="about.php">IBYO DUKORA</a></li>
    </ul>
    <div>
       <h1>Inama z’Umwuga</h1>
        <h3> AHABANZA // INAMA</h3> 
    </div>
</nav> 

<section class="joblink-section">
    <div class="intro">
      <h1>Murakaza neza kuri JobLink</h1>
      <h1>Inama Nziza Zikuganisha ku Itsinda ry’Umwuga Wawe</h1>
      <p>
      Kugira ngo ukore neza kandi ugire umusaruro uhora uhagaze neza, ndetse ube uhora uboneka igihe cyose bikenewe, ni ngombwa gutegura no gushyira ibyihutirwa mu mwanya hakoreshejwe ibikoresho nka to-do lists cyangwa software z’imicungire y’imishinga. Teganya intego zisobanutse kandi zishoboka, ukagabanya imirimo minini mu byiciro bito byoroshye, kandi ucunge igihe cyawe neza ukoresheje uburyo nka time-blocking. Gira isuku mu byo ukora, ukore ahantu hateguwe neza kandi witegure neza inyandiko zawe kugira ngo ubashe kwibanda neza ku byo ukora. Jya uvugana n’abandi neza kandi ubashyiraho amakuru agezweho, unakemure ibibazo bitaramenyekana cyane. Emerera ikoranabuhanga gufasha mu kunoza imirimo no kwiyungura ubumenyi buhoraho kugira ngo ushobore guhangana n’ibibazo bishya ufite icyizere. Shyiraho umubano ukomeye kandi wizewe n’ikipe yawe, kandi ushyireho ibyitezwe bisobanutse ku bijyanye no kuboneka, wemeze ko uhora uhari mu masaha y’akazi no mu bihe byihutirwa. Kugira ngo ugumane imbaraga n’umusaruro, jya ugerageza kugumana umwanya wo kuruhuka, gukora imyitozo ngororamubiri, no kurya neza. Binyuze mu gushyiraho ahantu heza ho gukorera kandi hizewe, uratera imbere mu guhora ukora neza kandi witeguye guhura n’ibyo usabwa igihe icyo ari cyo cyose.
      </p>
     
       
     
      
    </div>
    
  </section>
</body>
</html>