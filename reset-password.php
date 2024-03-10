<?php
require_once("./app/init.php");

if (!(isset($_GET['t']) || isset($_POST['t']))) {
    dd("How The Hell You Came Here");
}

$t = isset($_GET['t']) ? $_GET['t'] : $_POST['t'];

$tokenData = Token::isValid($connection, $t);
if (!$tokenData) {
    dd("Your Link Has Been Expired,Please Generate A New One");
}
if (isset($_POST['reset'])) {
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    $data['password'] = $newPassword;
    $isUpdated = User::update($connection, $tokenData['user_id'], $data);
    if ($isUpdated) {
        Token::deleteForgetPasswordToken($connection, $tokenData['user_id']);
        redirect("login.php");
    } else {
        dd("Updation Failed");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth | Reset Password</title>

    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/responsive.css">
</head>

<body>
    <div class="container">
        <div class="d-grid grid-cols-2 main-container">
            <!-- VISUAL CONTAINER STARTS -->
            <div class="visual-container bg-primary d-flex flex-column flex-center">
                <img src="images/reset-password.svg" alt="login image" class="img-responsive visual-container__image">
            </div>
            <!-- VISUAL CONTAINER ENDS -->
            <!-- FORM CONTAINER STARTS -->
            <div class="form-container d-flex flex-column">
                <h2 class="form-container__title">Reset Password!</h2>
                <!-- FORM STARTS -->
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="mt-3">
                    <!-- imp -->
                    <input type="hidden" name="t" value="<?= $t; ?>">
                    <div class="input-container d-flex flex-column">
                        <label for="newpassword" class="input-label">New Password</label>
                        <input type="password" name="newpassword" id="newpassword" class="input-field" placeholder="Enter your new password">
                        <!-- <span class="error-message" id="newPasswordError">inavlid new password</span> -->
                    </div>
                    <div class="input-container d-flex flex-column">
                        <label for="confirmpassword" class="input-label">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="input-field" placeholder="Enter your confirm password">
                        <!-- <span class="error-message" id="newPasswordError">inavlid confirm password</span> -->
                    </div>
                    <button type="submit" name="reset" class="btn btn-primary">Reset Password</button>
                </form>
                <!-- FORM ENDS -->
            </div>
            <!-- FORM CONTAINER ENDS -->
        </div>
    </div>
</body>

</html>