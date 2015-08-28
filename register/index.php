<?php
  require ("../casl_inc/cn.php");
  if(isset($_POST['register'])){
    
    $coname=$_POST['coname'];
    $location=$_POST['location'];
    $name1=$_POST['name'];
    $desg=$_POST['designation'];
    $mail1=$_POST['mail'];
    $contact=$_POST['contact'];
    $event=implode(",",$_POST['event']);

    $sql1=mysql_query("insert into register (coname,location,name1,desg,mail,contact,event) values('$coname','$location','$name1','$desg','$mail1','$contact','$event');");
    if($sql1){
      $success='Your have been successfully registered. Our team will contact you shortly.';
      $to = $mail1;
        $subject = 'CASL 2014 Registration';
      $message = "
      <span style=\"font-family: 'Trebuchet MS', sans-serif;\">
      Welcome to CASL 2014!<br/><br/>You've been successfully registered. Our team shall revert back to you within 24 hours.
      <br/><br/>For further details, please contact Rukmini Sengupta - 09626415031
      <br/><br/><br/>Regards<br/>Team CASL<br/>
      <br/><i>This is a system generated mail. Please do not reply.</i></span>";
      $headers  = "MIME-Version: 1.0\r\n"; 
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
      $headers .= "From: VIT CASL <noreply@vitcasl.com>\r\n"; 

      mail($to, $subject, $message, $headers);
    }
    else{
      $success='Something went Wrong! Try Again Later!';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Corporate All Star League 2014" />
    <meta name="keywords" content="CASL, Corporate All star League 2014, VIT, VIT Business School, sports, quiz, corporate employees, cricket, table tennis, basketball, chess, Vellore, recreation, recreational event" />
    <meta property="og:title" content="REGISTER | Corporate All Star League 2014"/>
    <meta property="og:image" content="http://www.vitcasl.com/images/logo.png" />
    <meta property="og:url" content="http://www.vitcasl.com/register"/>
    <meta property="og:type" content="website" />
    <meta property="og:description" content="CASL is a collaboration of India's biggest corporate giants for purposes of recreation and intellectual stimulation of their executives."/>
    <meta name="author" content="Deepak Grover, Prasad Tambekar" />

    <link rel="icon" type="image/ico"  href="../images/favicon.ico">
    <link rel="shortcut icon"  href="../images/favicon.ico">
	
  	<title>REGISTER | Corporate All Star League 2014</title>

  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../css/font.css">
  	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="multiple-select.css">
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-53821392-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>
<body class="indigo">
    <div class="width-wrapper intro light white-color register">
      <h1 class="red-color">REGISTER FOR CASL 2014</h1>
      <div class="dark-color">
      <?php
        if(isset($_POST['register'])){
          if(isset($success)){
            echo $success;
          }
        }
      ?>
      </div>
      <form method="POST" action="index.php">
        <li>
          <label for="field1">What's your company name?</label>
          <input type="text" required name="coname" id="field1" />
        </li>
        <li>
          <label for="field2">Where is your company located?</label>
          <input type="text" required name="location" id="field2" />
        </li>
        <li>
          <label for="field3">Tell us your name</label>
          <input type="text" required name="name" id="field3" />
        </li>
        <li>
          <label for="field4">What's your designation?</label>
          <input type="text" required name="designation" id="field4" />
        </li>
        <li>
          <label for="field7">Choose any Event</label>
          <select name="event[]" multiple="multiple">
            <option value="cricket">Cricket (INR 25000)</option>
            <option value="basketball">Basketball (INR 15000)</option>
            <option value="table_tennis">Table Tennis (INR 3000)</option>
            <option value="chess">Chess (INR 3000)</option>
            <option value="badminton">Badminton (INR 3000)</option>
            <option value="quiz">All Star Quiz (INR 6000)</option>
          </select> 
        </li>
        <li>
          <label for="field5">Tell us your email ID</label>
          <input type="email" required name="mail" id="field5" />
        </li>
        <li>
          <label for="field6">And, your contact number?</label>
          <input type="text" required name="contact" id="field6" />
        </li>
        <button type="submit" name="register" class="red" id="regButton">REGISTER</button>
      </form>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="jquery.multiple.select.js"></script>
    <script>
        $('select').multipleSelect({
            width: '100%'
        });
    </script>
</body>
</html>