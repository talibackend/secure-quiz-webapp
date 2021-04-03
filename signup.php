<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Signup</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <main class="main">
        <div class="form-container">
            <form id="signup-form" class="signup-form" onsubmit="return false;">
                <h2 class="label">Signup</h2>
                <div class="each-input">
                    <label for="fname">First Name:</label><br>
                    <input type="text" id="fname" class="input-fields" placeholder="First Name">
                </div>
                <div class="each-input">
                    <label for="lname">Last Name:</label><br>
                    <input type="text" id="lname" class="input-fields" placeholder="Last Name">
                </div>
                <div class="each-input">
                    <label for="dob">Date of Birth:</label><br>
                    <input type="date" id="dob" class="input-fields">
                </div>
                <div class="each-input">
                    <label for="gender">Gender:</label><br>
                    <select class="input-fields" id="gender">
                        <option value="" selected>Select Gender</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>
                <div class="each-input">
                    <label for="mobile">Phone Number:</label><br>
                    <input type="number" id="mobile" class="input-fields" placeholder="Phone Number">
                </div>
                <div class="each-input">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" class="input-fields" placeholder="Email">
                </div>
                <div class="each-input">
                    <label for="pwd">Password:</label><br>
                    <input type="password" id="pwd" class="input-fields" placeholder="Password">
                </div>
                <div class="each-input">
                    <label for="cpwd">Confirm Password:</label><br>
                    <input type="password" id="cpwd" class="input-fields" placeholder="Confirm Password">
                </div>
                <p class="error-handler" id="error-handler"></p>
                <div id="btn-container" class="each-input">
                    <button id="submit" class="submit">Submit</button>
                </div>
                <div id="btn-container" class="each-input">
                    If you already have an account click <a href="login.php">Login</a>.
                </div>
            </form>
        </div>
    </main>
    <script src="js/validator.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>