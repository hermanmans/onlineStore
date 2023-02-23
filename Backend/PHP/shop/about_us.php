<?php 
template_header('about_us');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            // https://dashboard.emailjs.com/admin/account
            emailjs.init('6BXSWOkApd5RYLe73');
        })();
        window.onload = function() {
            document.getElementById('test').addEventListener('submit', function(event) {
                event.preventDefault();
                // these IDs from the previous steps
                emailjs.sendForm('service_budqe7w', 'template_w3kjoe8', this)
                    .then(function() {
                        console.log('SUCCESS!');
                    }, function(error) {
                        console.log('FAILED...', error);
                    });
            });
        }
    </script>
</head>
<body class=aboutUs>
    <div class=details>
        <h3>Our Story</h3>
            <p> Founded in 2022, we strive to maintain creative,intriguing and knowledgeable reads for the whole of Cape Town.  
                Let us feed your imaginative soul with our wide range of local and international reading material. 
                We have passionate staff, great coffee and fantastic books. Our community outreach program supports local communities
                to enrich lives and educate.Visit one of our branches or use our online store.
            </p>
        <div class = message>
        
        <ul><h3>Contact Details</h3>
            <li>Telephone:012 123 4567</li>
            <li>Cellphone:082 123 4567</li>
            <li>Email: www.thebookshop.co.za</li>
            <li>Facebook:www.facebook.com</li>
        </ul>
        <!-- action="index.php" method="POST"-->
        <form id="test" class="searchBlock" action="index.php" method="POST" enctype="multipart/form-data">
            <h3 id='contactHead'>Contact Us...</h3>
            <label for="user">User Name</label>
            <input type="text" name="user" id="user">
            <label>Email</label>
            <input type="email" name="user_email">
            <label for="message">Message</label>
            <input type="text" name="message" id="message">
            <input type="submit" name="go" value="Send Message" id="go">
        </form>
        </div>
        <h3>Location</h3>
            <ul>
                <li><address>Address: 1 Serpentine Rd, Oranjezicht Cape Town</address></li>
            </ul>
        <div>
            <iframe class = map src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.8869387802274!2d18.413605014925125!3d-33.9440359303983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc6784acc452cb%3A0x8f5e0bfa6d779340!2s1%20Serpentine%20Rd%2C%20Oranjezicht%2C%20Cape%20Town%2C%208001!5e0!3m2!1sen!2sza!4v1676986219834!5m2!1sen!2sza" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>
</html>