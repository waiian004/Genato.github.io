<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Genato - Personal Website</title>
</head>

<body>
    <header>
        <img src="me.jpg" alt="Profile Picture" class="profile-picture">
        <h1>Mikhael Genato</h1>
        <h3>Web Developer | Graphic Designer</h3>
        <a href="logout.php" class="logout-btn">Logout</a>
        <a href="registration.php" class="signup-btn">Sign up</a>
        <a href="login.php" class="login-btn">Log In</a>

    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="skills.php">Skills</a>
        <a href="contact.php">Contact</a>
    </nav>

    <section id="bio">
        <h2></h2>
        <p id="bio-content">"As a passionate individual with a deep love for the IT industry, you find joy in the intricacies of database management and graphic design, and your eagerness to explore the world of web development reflects your commitment to continuous learning. Beyond the tech realm, your creative spirit extends to your role as a musician, where you skillfully play the guitar and various instruments, showcasing a diverse range of talents."</p>
    </section>

    <section class="skills">

<h2>My Skills</h2>
<ul>
    <li>Web Development</li>
    <li>Music Composition and Performance</li>
    <li>Culinary Arts</li>
    <li>Database Management</li>
</ul>

        </ul>
    </section> 

    <script src="script.js"></script>

</body>

</html>
