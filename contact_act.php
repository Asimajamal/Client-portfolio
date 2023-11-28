<?php
include 'database.php';
if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //storing data in session
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;




    //valiation

    if (empty($name)) {
        $_SESSION['alert-name'] = "Please enter first name";
        header('Location:index.php#contact');
    } else if (empty($email)) {
        $_SESSION['alert-email'] = "Please enter your email";
        header('Location:index.php#contact');
    } else if (empty($subject)) {
        $_SESSION['alert-subject'] = "Please enter your subject";
        header('Location:index.php#contact');
    } else if (empty($message)) {
        $_SESSION['alert-textmsg'] = "Please enter your message";
        header('Location:index.php#contact');
    } else {
        $result = mysqli_query($con, "select * from `contact` where email='" . $email . "'");
        $fetch = mysqli_num_rows($result);
        if ($fetch > 0) {
            $_SESSION['alert-unique'] = "This email already existed";
            header('Location:index.php#contact');
        } else {
            $result = mysqli_query($con, "insert into contact(name,email,subject,message) values('$name','$email','$subject','$message')");
            $_SESSION['alert_msg'] = "Thanks! Your Message has been sent.";
            header('Location:index.php#contact');
        }
    }




    mysqli_close($con);
}
