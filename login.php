<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <main class="main">
        <div class="form-container">
            <form id="login-form" class="signup-form" onsubmit="return false;">
                <h2 class="label">Login</h2>
                <div class="each-input">
                    <label for="uid">Mobile Number Or Email:</label><br>
                    <input type="text" id="uid" class="input-fields" placeholder="Mobile Number Or Email">
                </div>
                <div class="each-input">
                    <label for="pwd">Password:</label><br>
                    <input type="password" id="pwd" class="input-fields" placeholder="Password">
                </div>
                <p class="error-handler" id="error-handler"></p>
                <div id="btn-container" class="each-input">
                    <button id="submit" class="submit">Submit</button>
                </div>
                <div id="btn-container" class="each-input">
                    If you don't have an account click <a href="signup.php">Signup</a>.
                </div>
            </form>
        </div>
    </main>
    <script src="js/validator.js"></script>
    <script src="js/login.js"></script>
</body>
</html>