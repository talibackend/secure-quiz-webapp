<header class="header-container">
    <div class="main-container">
        <div class="left-container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if(!isset($_SESSION['id'])){
                    echo '
                    <li><a href="signup.php">Signup</a></li>
                    <li><a href="login.php">Login</a></li>';
                }?>
            </ul>
        </div>
        <div class="right-container">
            <ul>
                <?php if(isset($_SESSION['id'])){
                    echo '
                    <li>'.$_SESSION['fname'].' '.$_SESSION['lname'].'</li>
                    <li><a href="logout.php">Logout</a></li>';
                }?>
            </ul>
        </div>
    </div>
</header>