<?php 

session_start();

include 'components/database.php';


$id = "";
$name = "";
$subject = "";
$number = "";
$email = "";
$message = "";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $name = $_POST['name'];
    $query = "INSERT INTO contact (name, subject, number, email, message) VALUES (?,?,?,?,?)";
    $stmt = $dbCon->prepare($query);
    $stmt->bind_param("sssss", $name,$subject,$number,$email,$message);
    $stmt->execute();

    header('Location: contact.php');
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cstyle.css">
    <title>Kapcsolat</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="contactInfo">
                <div>
                    <h2>Elérhetőségek</h2>
                    <ul class="info">
                        <li>
                            <span><img src="img/location.png"></span>
                            <span>1223, Budapest,<br>
                                  Hunyadi utca <br>    
                                  2.</span>
                        </li>
                        <li>
                            <span><img src="img/mail.png"></span>
                            <span>valaki@valami.com</span>
                        </li>
                        <li>
                            <span><img src="img/call.png"></span>
                            <span>+36123456789</span>
                        </li>
                    </ul>
                </div>
            </div>

            <form id="myForm" action="#" method="post">
            <h2 class="sent-notification"></h2>
                <div class="contactForm">
                    <h2>Küldj üzenetet!</h2>
                    <div class="formBox">
                        <div class="inputBox w50">
                            <input type="text" name="name" value="<?= $name; ?>" required>
                            <span>Teljes Név</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="subject" value="<?= $subject; ?>" required>
                            <span>Üzenet Tárgya</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="number" name="number" value="<?= $number; ?>" required>
                            <span>Telefonszám</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="email" name="email" value="<?= $email; ?>" required>
                            <span>E-mail cím</span>
                        </div>
                        <div class="inputBox w100">
                            <textarea name= "message" cols="30" rows="5" value="<?= $message; ?>" required></textarea>
                            <span>Írd ide a kívánt üzenetet...</span>
                        </div>
                        <div class="inputBox w100">
                            <input type="submit" name="submit" value="Küldés">
                        </div>
                        <div class="inputBox w100">
                            <a class="getback" href="#">Vissza</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
