<?php
if(isset($_POST['email'])){
	// Email to information
	$email_to = "cjsaunders22@gmail.com";
	$email_subject = "Hello!";
	$email_from = "Oneder Tech";

	// Errors
	function died($error){
		echo "Failed to submit form.";
		echo "Here's why:<br/><br/>";
		echo $error. "<br/>";
		echo "Try again!";
		die();
	}

	// Validation
	if(!isset($_POST['name']) && 
	   !isset($_POST['email']) && 
	   !isset($_POST['comments'])) {
		died("Fields cannot be empty.");
	}

	$name = $_POST['name'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];

	$error_message = "";

	// Expected Email
	$email_expected = 
		'/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.+[A-Za-z]{2,4}$/';
	if(!preg_match($email_expected, $email)) {
		$error_message .= 'Invalid email.<br/> Must be in the form of your@email.com<br/>';
	}

	// Expected Name
	$name_expected = "/^[A-Za-z.' - ]+$/";
	if(!preg_match($name_expected, $name)) {
		$error_message .= 'Invalid name.<br/>';
	}

	// Expected Comments
	if(strlen($comments) < 2) {
		$error_message .= 'Field must have at least TWO characters.<br/>';
	}

	if(strlen($error_message) > 0) {
		died($error_message);
	}
	$email_message = "Form details below.\n\n";

	function clean_string($string) {
		$bad = array("content-type", "bcc:", "to:", "cc:", "href");
		return str_replace($bad, "", $string);
	}

	$email_message .= "Name: " . clean_string($name) . "\n";
	$email_message .= "Email: " . clean_string($email) . "\n";
	$email_message .= "Comments: " . clean_string($comments) . "\n";

	// Create email headers
	$headers = 'From: ' .$email_from . "\r\n". 'Reply-To:' . $email. "\r\n" . 'X-Mailer: PHP/' . phpversion();
	mail($email_to, $email_subject, $email_message, $headers);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oneder Tech | Contact</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    </head>
    <body>
     	<div id="header">
     		<a href="../index.html"><span class="title">ONEDER TECH</span></a>
            <a href="../index.html"><img class="ank" src="../res/ank_up.png" onmouseover="this.src='../res/ank_down.png';" onmouseout="this.src='../res/ank_up.png';">
            <nav class="menu">
         		<ul>
         			<li><a href="../pages/news.html">News</a></li>
         			<li><a href="../pages/collection.html">Collection</a></li>
         			<li><a href="../pages/contact.html">Contact</a></li>
         		</ul>
            </nav>
     	</div>

     	<div id="content">
     		&nbsp;
            <img class="mainLogo" src="../res/logo.png" alt="Oneder Tech Logo"><br>
            <span class="tagline">Thanks for saying hello!</span>
     	</div>

     	<div id="footer">
     		<br><span class="copyright">Oneder Tech &copy; 2016</span>
     	</div>
    </body>
</html>


<?php
}
?>

