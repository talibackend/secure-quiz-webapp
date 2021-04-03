<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Quiz Website</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <main class="main">
        <div class="form-container">
            <ul class="list-of-items">
                <?php if(isset($_SESSION['id'])){?>
                    <li class="each-list-item"><a href="post.php">Post Question</a></li>
                    <li class="each-list-item"><a href="start.php">Start Quiz</a></li>
                    <li class="each-list-item"><a href="results.php">My Results</a></li>
                <?php }else{?>
                    <li class="each-list-item"><a href="login.php">Login</a></li>
                    <li class="each-list-item"><a href="signup.php">Signup</a></li>
                <?php }?>
            </ul>
        </div>
    </main>
</body>
</html>