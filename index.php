<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - POI Web</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      /* Existing reset or base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background: #f9f9f9;
    color: #333;
}

/* Header section */
.header {
    text-align: center;
    padding: 20px;
    background-color: #fff3cd;
}

.logo {
    max-width: 120px;
    height: auto;
    margin-bottom: 10px;
}

/* Main content */
.main-content {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

.intro {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.2rem;
}

/* Feature section using flex */
.features {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.feature-card {
    background-color: #fff;
    padding: 20px;
    width: 300px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    text-align: center;
    transition: transform 0.3s;
}

.feature-card:hover {
    transform: translateY(-5px);
}

/* Footer */
.footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 10px;
    margin-top: 40px;
}

/* 🌐 Media Query for Responsiveness */
@media (max-width: 768px) {
    .features {
        flex-direction: column;
        align-items: center;
    }

    .feature-card {
        width: 90%;
    }

    .header h1 {
        font-size: 1.4rem;
    }

    .intro {
        font-size: 1rem;
        padding: 0 10px;
    }
}

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        h1 {
            font-size: 2.5em;
            color: #2d3748;
            margin-bottom: 20px;
            font-family: 'Georgia', serif;
        }

        p {
            font-size: 1.1em;
            color: #4A5568;
            line-height: 1.6;
        }

        /* Desktop - Default Container Style */
.container {
    background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95)),
                url('rajasthan_container_bg.jpg') center/cover no-repeat;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 40px;
    text-align: center;
    max-width: 900px;
    width: 90%;
    margin-top: 100px;
    transition: background-image 0.5s ease;
}

/* Mobile - Override for small screens */
@media (max-width: 768px) {
    .container {
        background: linear-gradient(rgba(255, 255, 255, 0.96), rgba(255, 255, 255, 0.96)),
                    url('rajasthan_container_bg_mobile.jpg') center/cover no-repeat;
        padding: 20px;
    }
}

        

/* Navbar */
nav {
    background-color: #FF7722;
    padding: 15px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 70px;
}

/* Logo */
nav img {
    width: 48px;
    height: 48px;
    margin-right: 15px;
    border-radius: 50%; /* Make it circular */
    border: 2px solid #ffffff; /* White border for contrast */
    background-color: #ffffff; /* Optional: fills inside the circle */
    object-fit: cover; /* Ensure full logo visibility */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); /* Soft shadow for better contrast */
}

/* Links */
nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    margin: 0 10px;
    font-size: 1.1em;
    transition: background-color 0.3s, box-shadow 0.3s;
}

nav a:hover {
    background-color: green;
    border-radius: 5px;
    box-shadow: 0 0 10px green;
}

nav a.active {
    background-color: #FF7722;
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Zoom Controls */
.zoom-controls {
    display: flex;
    gap: 5px;
    align-items: center;
}

.zoom-controls button {
    font-size: 14px;
    padding: 4px 8px;
    background: white;
    color: black;
    border: 1px solid #ccc;
    cursor: pointer;
    border-radius: 4px;
    font-weight: bold;
}

.zoom-controls button:hover {
    background: #f0f0f0;
}

/* Google Translate Dropdown Fix */
#google_translate_element {
    margin-right: 10px;
    font-size: 14px;
}


        /* Hamburger for mobile */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .bar {
            height: 3px;
            width: 25px;
            background-color: white;
            margin: 4px 0;
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
                justify-content: space-between;
                height: auto;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                background-color: blue;
            }

            .nav-links a {
                padding: 15px;
                margin: 0;
                border-top: 1px solid rgba(255, 255, 255, 0.2);
            }

            .nav-links.show {
                display: flex;
            }

            .hamburger {
                display: flex;
                margin-left: auto;
            }

            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }

            .container {
                padding: 20px;
            }

            .button {
                font-size: 1em;
                padding: 12px 25px;
            }

            .mySlides {
                height: 250px !important;
            }
        }

        /* Slideshow */
        .mySlides {
            display: none;
            width: 100%;
            height: 1400px;
            object-fit: cover;
            border-radius: 8px;
            z-index:10;
        }

        .slideshow-container {
            position: relative;
            max-width: 100%;
            width: 100%;
            margin-top: 70px;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 12px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            background-color: rgba(0,0,0,0.4);
            cursor: pointer;
            border-radius: 50%;
        }

        .prev { left: 10px; }
        .next { right: 10px; }

        .button {
            background-color: #6A0DAD;
            color: white;
            padding: 15px 30px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            display: inline-block;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button:hover {
            background-color: #8A2BE2;
            transform: scale(1.05);
        }
        /* Dropdown Menu */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.dropbtn:hover {
    background-color: green;
    border-radius: 5px;
    box-shadow: 0 0 10px green;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #FF7722;
    min-width: 160px;
    z-index: 1001;
    border-radius: 0 0 8px 8px;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.dropdown-content a:hover {
    background-color: green;
    box-shadow: 0 0 10px green;
    border-radius: 0;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media (max-width: 768px) {
    .dropdown {
        width: 100%;
    }

    .dropdown-content {
        position: static;
        background-color: #FF7722;
        border-radius: 0;
    }

    .dropbtn {
        width: 100%;
        text-align: left;
        padding: 15px;
    }

    .dropdown-content a {
        padding: 15px;
    }
}

/* Overlay Background */
.overlay {
  position: fixed;
  top: 0; left: 0;
  width: 100vw;
  height: 100vh;
  background: linear-gradient(to right, rgba(0,0,0,0.3), rgba(247, 237, 237, 0.2)),
              url('rajasthan_background.jpg') center/cover no-repeat;
  backdrop-filter: blur(2px); /* reduced blur for stronger image */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  padding: 20px;
  animation: fadeIn 0.6s ease;
}


/* Welcome Banner Box */
.welcome-banner {
  background: white;
  padding: 30px 40px;
  border-radius: 15px;
  text-align: center;
  max-width: 500px;
  width: 100%;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  animation: floatIn 1s ease;
}

.welcome-logo {
  width: 70px;
  height: 70px;
  margin-bottom: 15px;
  border-radius: 50%;
  border: 3px solid #6A0DAD;
}

.welcome-banner h2 {
  font-size: 2em;
  margin-bottom: 15px;
  color: #6A0DAD;
  font-family: 'Georgia', serif;
}

.welcome-banner p {
  font-size: 1.1em;
  color: #333;
  margin-bottom: 20px;
}

.checkbox-container {
  font-size: 0.95em;
  margin-bottom: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  color: #555;
}

.welcome-banner button {
  background: linear-gradient(to right, #D97706, #8A2BE2);
  border: none;
  color: white;
  padding: 12px 28px;
  font-size: 1.1em;
  border-radius: 8px;
  cursor: pointer;
  transition: transform 0.2s, background 0.3s;
}

.welcome-banner button:hover {
  transform: scale(1.05);
  background: linear-gradient(to right, #8A2BE2, #D97706);
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes floatIn {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Mobile Responsive */
@media (max-width: 480px) {
  .welcome-banner {
    padding: 25px 20px;
  }

  .welcome-banner h2 {
    font-size: 1.5em;
  }

  .welcome-banner p {
    font-size: 1em;
  }

  .welcome-banner button {
    font-size: 1em;
    padding: 10px 22px;
  }
}


.explore-section {
  margin: 100px auto 50px;
  text-align: center;
  background: linear-gradient(to right, #f8f9fc, #f2f3f8);
  padding: 60px 20px;
  border-top: 5px solid #6A0DAD;
}

.explore-section h2 {
  font-size: 2em;
  color: #6A0DAD;
  margin-bottom: 40px;
  font-family: 'Georgia', serif;
}

.feature-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 30px;
  max-width: 1000px;
  margin: 0 auto;
}

.feature-card {
  background-color: white;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-8px);
}

.feature-card img {
  width: 60px;
  height: 60px;
  object-fit: contain;
  margin-bottom: 20px;
}

.feature-card h3 {
  font-size: 1.3em;
  color: #2D3748;
  margin-bottom: 10px;
}

.feature-card p {
  font-size: 1em;
  color: #4A5568;
}




/* General Styles */
body { 
  margin: 0;
  padding: 0;
  font-family: 'Georgia', serif;
  background: url('/Images/hawa_mahal.jpg') center center fixed;
  background-size: cover;
  background-attachment: fixed;
  overflow-x: hidden;
  position: relative;
}

/* Background blue overlay */
body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 139, 0.3);
  z-index: 1;
}

/* Container content block */
.container {
  position: relative;
  background-color: rgba(255, 255, 255, 0.92);
  padding: 20px;
  border-radius: 12px;
  margin: 80px auto;
  width: 80%;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
  z-index: 1;
  box-sizing: border-box; /* Ensure padding does not affect width */
}

/* Wrapper for positioning */
.main-wrapper {
  position: relative;
  z-index: 1;
}

/* Vijay Image Styles */
.vijay-img {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 150px;
  height: 480px;
  z-index: 1; /* Must be above overlay */
  opacity: 1;
  pointer-events: none;
}

/* Left image */
.vijay-left {
  left: -190px;
}

/* Right image */
.vijay-right {
  right: -190px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .container {
    width: 90%; /* Reduce width on smaller screens */
    padding: 15px; /* Adjust padding */
    margin-top: 60px; /* Adjust margin for better spacing */
  }

  .vijay-img {
    width: 100px; /* Reduce image width */
    height: 320px; /* Reduce image height */
  }

  .vijay-left {
    left: -120px; /* Adjust left image position */
  }

  .vijay-right {
    right: -120px; /* Adjust right image position */
  }
}

@media (max-width: 480px) {
  .container {
    width: 95%; /* Further reduce width */
    padding: 10px; /* Further adjust padding */
    margin-top: 40px; /* Reduce top margin */
  }

  .vijay-img {
    width: 80px; /* Reduce image width even further */
    height: 250px; /* Reduce image height */
  }

  .vijay-left {
    left: -100px; /* Further adjust left image position */
  }

  .vijay-right {
    right: -100px; /* Further adjust right image position */
  }
}








/* Dropdown parent */
li.dropdown {
  position: relative;
}

/* Style the submenu */
.submenu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #444;
  max-height: 300px; /* ≈ 7-8 items */
  overflow-y: auto;
  z-index: 9999;
  padding: 0;
  list-style: none;
  min-width: 200px;
  border-radius: 0 0 8px 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

/* Show submenu on hover */
li.dropdown:hover .submenu {
  display: block;
}

/* Style for submenu items */
.submenu li a {
  display: block;
  padding: 10px 16px;
  color: white;
  text-decoration: none;
  transition: background 0.3s ease;
  white-space: nowrap;
}

.submenu li a:hover {
  background-color: #666;
}

/* Custom scrollbar */
.submenu::-webkit-scrollbar {
  width: 8px;
}

.submenu::-webkit-scrollbar-track {
  background: #333;
}

.submenu::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 4px;
}

/* Dropdown wrapper */
li.dropdown {
  position: relative;
}

/* Hidden by default */
.submenu-scroll {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color:#FF7722;
  min-width: 200px;
  max-height: 280px; /* ~7-8 items */
  overflow-y: auto;
  z-index: 999;
  border-radius: 0 0 6px 6px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  padding: 0;
  margin: 0;
}

/* Show when hovering over parent */
li.dropdown:hover .submenu-scroll {
  display: block;
}

/* Submenu list style */
.submenu-scroll li {
  list-style: none;
}

/* Submenu link style */
.submenu-scroll li a {
  display: block;
  padding: 10px 15px;
  color: #fff;
  text-decoration: none;
  border-bottom: 1px solid #555;
  transition: background 0.3s ease;
}

.submenu-scroll li a:hover {
  background-color: green;
}

/* Scrollbar styling (optional) */
.submenu-scroll::-webkit-scrollbar {
  width: 8px;
}
.submenu-scroll::-webkit-scrollbar-track {
  background: #333;
}
.submenu-scroll::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 4px;
}











    </style>
    
</head>




<body>
<div id="google_translate_element" style="display: none;"></div>


<div class="tourist-deco top-left"></div>
<div class="tourist-deco top-right"></div>
<div class="tourist-deco bottom-left"></div>
<div class="tourist-deco bottom-right"></div>


  <!-- Welcome Banner -->
<div id="welcomeOverlay" class="overlay">
  <div class="welcome-banner">
    <img src="logo111.png" alt="Rajasthan Logo" class="welcome-logo">
    <h2>Welcome to Rajasthan POI Explorer</h2>
    <p>Discover the beauty, heritage, and secrets of Rajasthan – all in one place.</p>
    
    <label class="checkbox-container">
      <input type="checkbox" id="dontShowAgain"> Don’t show again
    </label>

    <button onclick="closeWelcome()">Start Exploring</button>
  </div>

</div>




    <!-- Navigation Bar -->
    <nav>
        <a href="index.php" class="active">
            <img src="logo111.png" alt="Rajasthan Logo">
        </a>

        <!-- Hamburger for mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>

        <div class="nav-links" id="navLinks">
            <a href="javascript:void(0);" class="home-link" onclick="reloadHome()" style="font-size: 23px;" >Home</a> 
            <?php if (isset($_SESSION['username'])): ?>
                <a href="in.html" style="font-size: 23px;">Add POI</a>
                <a href="display_poi_testing_main_file.php" style="font-size: 23px;">View POIs</a>
                 <a href="POI_status.php" style="font-size: 23px;">POI Status</a>
                <a href="logout.php" style="font-size: 23px;">Logout</a>
            <?php else: ?>
                <a href="login.php" style="font-size: 23px;">Login</a>
                <a href="register.php" style="font-size: 23px;">Register</a>
            <?php endif; ?>
        </div>
        
        <li class="dropdown">
  <a href="#" style="font-size: 23px;">Gallery</a>
  <ul class="submenu-scroll">
    <li><a href="ajmer.html">Ajmer</a></li>
    <li><a href="alwar.html">Alwar</a></li>
    <li><a href="banswara.html">Banswara</a></li>
    <li><a href="baran.html">Baran</a></li>
    <li><a href="barmer.html">Barmer</a></li>
    <li><a href="bharatpur.html">Bharatpur</a></li>
    <li><a href="bhilwara.html">Bhilwara</a></li>
    <li><a href="bikaner.html">Bikaner</a></li>
    <li><a href="bundi.html">Bundi</a></li>
    <li><a href="chittorgarh.html">Chittorgarh</a></li>
    <li><a href="churu.html">Churu</a></li>
    <li><a href="dausa.html">Dausa</a></li>
    <li><a href="dholpur.html">Dholpur</a></li>
    <li><a href="dungarpur.html">Dungarpur</a></li>
    <li><a href="hanumangarh.html">Hanumangarh</a></li>
    <li><a href="jaipur.html">Jaipur</a></li>
    <li><a href="jaisalmer.html">Jaisalmer</a></li>
    <li><a href="jalore.html">Jalore</a></li>
    <li><a href="jhalawar.html">Jhalawar</a></li>
    <li><a href="jhunjhunu.html">Jhunjhunu</a></li>
    <li><a href="jodhpur.html">Jodhpur</a></li>
    <li><a href="karauli.html">Karauli</a></li>
    <li><a href="kota.html">Kota</a></li>
    <li><a href="nagaur.html">Nagaur</a></li>
    <li><a href="pali.html">Pali</a></li>
    <li><a href="pratapgarh.html">Pratapgarh</a></li>
    <li><a href="rajsamand.html">Rajsamand</a></li>
    <li><a href="sawai_madhopur.html">Sawai Madhopur</a></li>
    <li><a href="sikar.html">Sikar</a></li>
    <li><a href="sirohi.html">Sirohi</a></li>
    <li><a href="sri_ganganagar.html">Sri Ganganagar</a></li>
    <li><a href="tonk.html">Tonk</a></li>
    <li><a href="udaipur.html">Udaipur</a></li>
  </ul>
</li>

<div style="display: flex; align-items: center; gap: 10px;">

  <!-- Language Switcher -->
  <select onchange="translateLanguage(this.value)" style="padding: 5px; border-radius: 5px;">
    <option value="">🌐 Language</option>
    <option value="en">English</option>
    <option value="hi">हिन्दी</option>
  </select>

  <!-- Zoom Controls -->
  <div style="display: flex; align-items: center; gap: 5px;">
    <button onclick="adjustFontSize(1)" style="font-size: 1.2em; padding: 5px 10px;">A+</button>
    <button onclick="adjustFontSize(0)" style="font-size: 1.1em; padding: 5px 10px;">A</button>
    <button onclick="adjustFontSize(-1)" style="font-size: 0.9em; padding: 5px 10px;">A-</button>
  </div>

</div>



<div class="dropdown">
    <a href="javascript:void(0);" class="dropbtn" style="font-size: 23px;">More</a>
    <div class="dropdown-content">
        <a href="about.html">About</a>
        <a href="how_it_works.php">How Website Works</a>
        <a href="Admin_login.php">Admin Login</a>
        <a href="contact.html">Contact Info</a>
    </div>
    </div>

    </nav>

    <!-- Image Slideshow -->
    <div class="slideshow-container">
        <img class="mySlides" src="rajasthan_image1.jpeg" alt="Rajasthan 1">
        <img class="mySlides" src="rajasthan_image2.jpeg" alt="Rajasthan 2">
        <img class="mySlides" src="rajasthan_image3.png" alt="Rajasthan 3">
        <img class="mySlides" src="rajasthan_image4.jpeg" alt="Rajasthan 4">
        <img class="mySlides" src="rajasthan_image5.jpeg" alt="Rajasthan 5">
        <img class="mySlides" src="rajasthan_image6.jpeg" alt="Rajasthan 6">
        <img class="mySlides" src="rajasthan_image7.jpeg" alt="Rajasthan 7">
        <img class="mySlides" src="rajasthan_image8.jpeg" alt="Rajasthan 8">
        <img class="mySlides" src="rajasthan_image9.jpeg" alt="Rajasthan 9">
        <img class="mySlides" src="rajasthan_image10.jpeg" alt="Rajasthan 10">
        <img class="mySlides" src="rajasthan_image11.jpeg" alt="Rajasthan 11">
        <img class="mySlides" src="rajasthan_image12.jpeg" alt="Rajasthan 12">
        <img class="mySlides" src="rajasthan_image13.jpeg" alt="Rajasthan 13">
        <img class="mySlides" src="rajasthan_image14.jpg" alt="Rajasthan 14">
        <img class="mySlides" src="rajasthan_image15.jpg" alt="Rajasthan 15">
        <img class="mySlides" src="rajasthan_image16.jpg" alt="Rajasthan 16">
        <img class="mySlides" src="rajasthan_image18.jpeg" alt="Rajasthan 18">
        <img class="mySlides" src="rajasthan_image17.jpg" alt="Rajasthan 17">
        




        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div class="main-wrapper">
    <img src="vijay.jpg" alt="Vijay Stambh Left" class="vijay-img vijay-left">
<img src="vijay.jpg" alt="Vijay Stambh Right" class="vijay-img vijay-right">


    <!-- Home Page Content -->
    <div class="container">
        <h1>Welcome to the Points of Interest in Rajasthan</h1>
        <p>Discover the most interesting places in Rajasthan and add your own favorite spots!</p>
        <p>Use the navigation above to either add a new Point of Interest or view all existing ones. Get started by either logging in or creating a new account.</p>

        <?php if (isset($_SESSION['username'])): ?>
            <p>Hello, <?= $_SESSION['username'] ?>! You are logged in.</p>
            <div>
                <a href="in.html" class="button">Add a New Point of Interest</a><br><br>
                <a href="display_poi_testing_main_file.php" class="button">View All Points of Interest</a>
            </div>
        <?php else: ?>
            <p>You need to log in or register to add or view POIs.</p>
        <?php endif; ?>
    </div>

   <!-- Decorative Footer Section -->
<section class="explore-section">
  <h2>Why Visit Rajasthan?</h2>
  <div class="feature-grid">
    <div class="feature-card">
      <img src="fort.png" alt="Forts">
      <h3>Majestic Forts</h3>
      <p>Explore iconic forts like Mehrangarh, Amer, and Jaisalmer – standing tall with history.</p>
    </div>
    <div class="feature-card">
      <img src="camel.png" alt="Camel Safari">
      <h3>Desert Adventures</h3>
      <p>Experience camel safaris, dunes, and cultural nights under the Thar desert sky.</p>
    </div>
    <div class="feature-card">
      <img src="palace.png" alt="Palaces">
      <h3>Royal Palaces</h3>
      <p>Discover regal palaces like Udaipur’s City Palace and Jaipur’s Hawa Mahal.</p>
    </div>
  </div>
        </div>
</section>

<!-- Footer Section --> 
<footer style="
    background: linear-gradient(to right, #f8f9fc, #e0d8c3);
    padding: 30px 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    border-top: 5px solid #6A0DAD;
    font-family: 'Georgia', serif;
    color: #2D3748;
    box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
    margin-top: 80px;
    row-gap: 30px;
    position: relative; /* Added to ensure footer stays at the bottom */
    z-index: 10; /* Ensure footer is above other content */
">

  <!-- Left side: Ministry info -->
  <div style="display: flex; align-items: center; flex: 1; min-width: 250px;">
    <img src="mof.png" 
         alt="Rajasthan Emblem" 
         style="width: 60px; height: 60px; margin-right: 15px;">
    <div>
      <strong style="font-size: 1.3em;">Ministry of Rajasthan Tourism</strong><br>
      <span style="font-size: 0.95em;">Preserving Culture | Promoting Beauty</span>
    </div>
  </div>

  <!-- Middle: Stay and E-Ticketing -->
  <div style="flex: 1; text-align: center; min-width: 250px;">
    <h4 style="margin-bottom: 10px; font-size: 1.2em; color: #6A0DAD;">Explore Services</h4>
    <a href="https://rtdc.tourism.rajasthan.gov.in/Client/HotelList.aspx" style="
        display: inline-block;
        margin: 5px 10px;
        padding: 10px 20px;
        background-color: #6A0DAD;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        transition: background 0.3s;
    " onmouseover="this.style.backgroundColor='#4b0b93'" onmouseout="this.style.backgroundColor='#6A0DAD'">
      Stay
    </a>
    <a href="https://www.tourism.rajasthan.gov.in/content/rajasthan-tourism/en/rajasthani-cuisine.html" style="
        display: inline-block;
        margin: 5px 10px;
        padding: 10px 20px;
        background-color: #6A0DAD;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        transition: background 0.3s;
    " onmouseover="this.style.backgroundColor='#4b0b93'" onmouseout="this.style.backgroundColor='#6A0DAD'">
      Eat
    </a>
    <a href="https://obms-tourist.rajasthan.gov.in/" style="
        display: inline-block;
        margin: 5px 10px;
        padding: 10px 20px;
        background-color: #6A0DAD;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        transition: background 0.3s;
    " onmouseover="this.style.backgroundColor='#4b0b93'" onmouseout="this.style.backgroundColor='#6A0DAD'">
      E-Ticketing
    </a>
     <a href="feedback.html" style="
        display: inline-block;
        margin: 5px 10px;
        padding: 10px 20px;
        background-color: #6A0DAD;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        transition: background 0.3s;
    " onmouseover="this.style.backgroundColor='#4b0b93'" onmouseout="this.style.backgroundColor='#6A0DAD'">
      Feedback
    </a>
  </div>

  <!-- Right side: Social Links -->
  <div style="display: flex; gap: 20px; flex: 1; justify-content: flex-end; min-width: 250px;">
    <a href="https://www.facebook.com/rajasthantourism" target="_blank" title="Facebook">
      <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" 
           alt="Facebook" 
           style="width: 32px; height: 32px;">
    </a>
    <a href="https://x.com/my_rajasthan" target="_blank" title="Twitter (X)">
      <img src="https://cdn-icons-png.flaticon.com/512/5968/5968958.png" 
           alt="Twitter X" 
           style="width: 32px; height: 32px;">
    </a>
    <a href="https://www.youtube.com/c/RajasthanTourismChannel/videos" target="_blank" title="YouTube">
      <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" 
           alt="YouTube" 
           style="width: 32px; height: 32px;">
    </a>
    <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Ffeed%2F" target="_blank" title="LinkedIn">
      <img src="https://cdn-icons-png.flaticon.com/512/145/145807.png" 
           alt="LinkedIn" 
           style="width: 32px; height: 32px;">
    </a>
    <a href="https://t.me/officialrajasthantourism" target="_blank" title="Telegram">
      <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" 
           alt="Telegram" 
           style="width: 32px; height: 32px;">
    </a>
  </div>

</footer>

    <script>


        let slideIndex = 0;
        showSlides();

        setInterval(() => {
            plusSlides(1);
        }, 3000);

        function plusSlides(n) {
            slideIndex += n;
            showSlides();
        }

        function showSlides() {
            const slides = document.getElementsByClassName("mySlides");
            if (slideIndex >= slides.length) slideIndex = 0;
            if (slideIndex < 0) slideIndex = slides.length - 1;

            for (let slide of slides) {
                slide.style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }

        function reloadHome() {
            location.reload();
        }

        function toggleMenu() {
            const nav = document.getElementById("navLinks");
            nav.classList.toggle("show");
        }

window.onload = function () {
  const dontShow = localStorage.getItem("hideWelcomeBanner");
  if (!dontShow) {
    document.getElementById("welcomeOverlay").style.display = "flex";
  }
};

function closeWelcome() {
  const checkbox = document.getElementById("dontShowAgain");
  if (checkbox.checked) {
    localStorage.setItem("hideWelcomeBanner", "true");
  }
  document.getElementById("welcomeOverlay").style.display = "none";
}
</script>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,hi',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
      autoDisplay: false
    }, 'google_translate_element');
  }

  function translateLanguage(lang) {
    const interval = setInterval(() => {
      const select = document.querySelector('.goog-te-combo');
      if (select) {
        select.value = lang;
        select.dispatchEvent(new Event('change'));
        clearInterval(interval);
      }
    }, 100);
  }

  let currentZoom = 1;
  function adjustFontSize(change) {
    if (change === 0) {
      currentZoom = 1;
    } else {
      currentZoom += change * 0.1;
    }
    document.body.style.transform = `scale(${currentZoom})`;
    document.body.style.transformOrigin = "top left";
  }
</script>

<!-- Google Translate Script -->
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



</body>
</html>
