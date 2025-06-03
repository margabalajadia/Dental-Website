<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $service = $_POST['service'];
    $payment = $_POST['payment'];
    
    $sql = "INSERT INTO bookings (fullName, age, email, phone, date, service, payment) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssss", $name, $age, $email, $phone, $date, $service, $payment);
    
    if ($stmt->execute()) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".modal").style.display = "flex";
            });
        </script>';
    } else {
        echo "Error: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dental Services - Your Smile Matters</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script defer src="script.js"></script>
    
</head>
<body>

<!-- Navigation Bar -->
<header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#appointment">Book An Appointment</a></li> 
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>
            <span class="oralux">ORALUX</span>
        </h1>
        <p>At Oralux, we’re dedicated to transforming your smile with exceptional care and advanced dental solutions.
            <br>ensuring every visit is comfortable and personalized to your oral health goals.</p>
        <a href="#services" class="btn">Explore Our Services</a>
    </div>
</section>

<!-- Service Section -->
<section id="services" class="service-titles">
    <h2 class="small-title">OUR SERVICES</h2>
    <h3 class="big-title">What We Offer</h3>
</section>

<section class="services">
    <div class="service">
        <img src="root_canal.jpg" alt="Root Canal">
        <h2>Root Canal</h2>
        <p>Save your teeth with this procedure that treats infection in the root of the tooth.</p>
    </div>
    <div class="service">
        <img src="teeth_alignment.jpg" alt="Teeth Alignment">
        <h2>Teeth Alignment</h2>
        <p>Achieve a straighter smile with personalized orthodontic treatments.</p>
    </div>
    <div class="service">
        <img src="cavity_inspection.jpg" alt="Cavity Inspection">
        <h2>Cavity Inspection</h2>
        <p>Regular check-ups to detect early signs of tooth decay and prevent damage.</p>
    </div>
    <div class="service">
        <img src="oral_hygiene.jpg" alt="Oral Hygiene">
        <h2>Oral Hygiene</h2>
        <p>Maintain a healthy smile with professional cleaning and care advice.</p>
    </div>
    <div class="service">
        <img src="cosmetic_teeth.jpg" alt="Cosmetic Teeth">
        <h2>Cosmetic Teeth</h2>
        <p>Enhance your smile with cosmetic procedures like whitening and veneers.</p>
    </div>
</section>

<!-- About Us -->
<section id="about" class="about">
    <div class="about-container">
        <div class="about-image">
            <img src="dentist.jpg" alt="Dentist">
        </div>
        <div class="about-content">
            <h2>About Oralux</h2>
            <p>Our dental clinic has been serving the community for over 20 years. Our team of experienced professionals is committed to providing the highest quality dental care. From routine checkups to advanced treatments, we ensure every patient receives personalized attention and care.</p>
        </div>
    </div>
</section>

<!-- Book Dental Appointment Section -->
<section id="appointment" class="appointment">
    <div class="appointment-container">
        <h2 class="small-title">BOOK AN APPOINTMENT</h2>
        <h3 class="big-title">Your Smile Starts Here</h3>
        <p class="form-heading">Fill out the form to schedule your visit. Our team will contact you to confirm your appointment.</p> 
        <form action="#" method="POST" class="appointment-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" placeholder="Enter your age" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="service">Select Service</label>
                    <select id="service" name="service" required>
                        <option value="" disabled selected>Choose a service</option>
                        <option value="root-canal">Root Canal</option>
                        <option value="teeth-alignment">Teeth Alignment</option>
                        <option value="cavity-inspection">Cavity Inspection</option>
                        <option value="oral-hygiene">Oral Hygiene</option>
                        <option value="cosmetic-teeth">Cosmetic Teeth</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="payment">Payment Method</label>
                    <select id="payment" name="payment" required>
                        <option value="" disabled selected>Select Payment Method</option>
                        <option value="card">Credit/Debit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="gcash">Gcash</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn">Submit Appointment</button>

            </div>
        </form>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact">
    <h2>Connect With Us</h2>
    <h2 class="sub-heading">Our friendly team would love to hear from you.</h2>

    <div class="contact-info">
        <div class="contact-item">
            <i class="fa fa-map-marker"></i>
            <h3>Our Address</h3>
            <p>440 Pureza Ext. St. Sta. Mesa, Manila, 3086 Esqtate One Building, Magsaysay Blvd, Metro Manila</p>
        </div>
        <div class="contact-item">
            <i class="fa fa-phone"></i>
            <h3>Contact Us</h3>
            <p>0946-456-4526</p>
        </div>
        <div class="contact-item">
            <i class="fa fa-envelope"></i>
            <h3>Send Us an Email for More Inquiries</h3>
            <p>Send us an email and we will answer ASAP: <a href="mailto:admin@oralux.com">admin@oralux.com</a></p>
        </div>
        <div class="contact-item">
            <i class="fa fa-calendar"></i>
            <h3>Clinic Schedule</h3>
            <p>Mondays – Saturdays: 8:00 AM to 6:00 PM</p>
            <p>Closed during Sundays and Holidays</p>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer>
    <p>&copy; 2025 Dental Care Clinic | All Rights Reserved</p>
</footer>

<!--  -->
<div class="modal" style="display: none !important;">
    <div class="card">
        <div class="check">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
        </div>
        <h2>Booking Confirmed!</h2>
        <p>
            Your booking has been confirmed.<br>
            Check your email for details.
        </p>
        <button onclick="hideModal()">OK</button>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
