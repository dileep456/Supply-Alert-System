<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



if(isset($_POST['notification'])) {
    // Retrieve selected subject from the form
    $subject = $_POST['subject'];

    // Establish database connection
    $servername = "localhost"; // Change this to your server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "contact"; // Change this to your database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to select students by subject
    $sql = "SELECT contacts.username, contacts.email, dates.subject, dates.exam_date
    FROM contacts
    INNER JOIN supply ON contacts.username = supply.username
    INNER JOIN dates ON supply.subject = dates.subject";

    // Execute query
    $result = mysqli_query($conn,$sql);

    // Check if query executed successfully
    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        // Check if any rows returned
        if ($result->num_rows > 0) {
            // Loop through each student
            while($row = $result->fetch_assoc()) {
                $mail = new PHPMailer(true);
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'dileepsrkrec@gmail.com';                     //SMTP username
                    $mail->Password   = 'crkk txft bbgf ycsj';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('dileepsrkrec@gmail.com', 'project');
                    $mail->addAddress($row["email"], 'Joe User');     //Add a recipient
                
                    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Exam Notification';
                    $mail->Body    = "<html>
                        <head>
                        </head>
                        <body>
                        <p>Dear {$row["username"]} ,</p>
                        <p>You are hereby notified that the $subject exam is scheduled on {$row["exam_date"]}.</p>
                        <p>You can register for the exam by paying the supply fee through the given link</p>
                        <p><a href= http://www.srkrexams.in >Click here</a></p>
                        <p>Best Regards.</p>
                        </body>
                        </html>";
                
                    if($mail->send()){
                        header("Location: adminui.php");
                    }
            }
        }
    }



}
?>