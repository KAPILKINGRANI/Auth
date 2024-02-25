<?php

require_once("./app/init.php");

if (isset($_POST["register"])) {
    $rules = [
        'username' => [
            'required' => true,
            'minlength' => 3,
            'maxlength' => 255,
            'unique' => 'users.username'
        ],
        'email' => [
            'required' => true,
            'minlength' => 3,
            'maxlength' => 255,
            'email' => true,
            'unique' => 'users.email'
        ],
        'password' => [
            'required' => true,
            'minlength' => 8,
            'maxlength' => 20
        ]
    ];
    $validator->check($_POST, $rules);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth | Register</title>

    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/responsive.css">
</head>

<body>
    <div class="container">
        <div class="d-grid grid-cols-2 main-container">
            <!-- FORM CONTAINER STARTS -->
            <div class="form-container d-flex flex-column">
                <h2 class="form-container__title">Start your journey!</h2>
                <p class="form-container__subtitle">
                    Register now and embark on your digital journey
                </p>
                <!-- FORM STARTS -->
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="mt-3">
                    <div class="input-container d-flex flex-column">
                        <label for="username" class="input-label">Username</label>
                        <input type="text" value="<?= old($_POST, "username") ?>" name="username" id="username" class="input-field" placeholder="Enter your username">
                        <span class="error-message" id="usernameError">
                            <?= $validator->errors()->has('username') ? $validator->errors()->first('username') : ''; ?>
                        </span>
                    </div>
                    <div class="input-container d-flex flex-column">
                        <label for="email" class="input-label">Email</label>
                        <input type="text" value="<?= old($_POST, "email") ?>" name="email" id="email" class="input-field" placeholder="Enter your email">
                        <span class="error-message" id="emailError">
                            <?= $validator->errors()->has('email') ? $validator->errors()->first('email') : ''; ?>
                        </span>

                    </div>
                    <div class="input-container d-flex flex-column">
                        <label for="password" class="input-label">Password</label>
                        <input type="password" name="password" id="password" class="input-field" placeholder="Enter your password">
                        <span class="error-message" id="passwordError">
                            <?= $validator->errors()->has('password') ? $validator->errors()->first('password') : ''; ?>
                        </span>

                    </div>
                    <div class="input-container d-flex flex-space-between">
                        <p>By continuing, you agree to the <span class="text-primary">Terms & Conditions</span>.</p>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </form>
                <!-- FORM ENDS -->
                <p class="create-account">Don't have an account? <a href="#" class="text-primary">Create account</a></p>
            </div>
            <!-- FORM CONTAINER ENDS -->
            <!-- VISUAL CONTAINER STARTS -->
            <div class="visual-container bg-primary d-flex flex-column flex-center">
                <h2 class="visual-container__title">
                    Guarding your data with robust security measures.
                </h2>
                <p class="visual-container__subtitle">
                    Your trust, our priority. Register for a secure and seamless experience.
                </p>
                <img src="images/register.svg" alt="login image" class="img-responsive visual-container__image">
            </div>
            <!-- VISUAL CONTAINER ENDS -->
        </div>
    </div>
</body>

</html>