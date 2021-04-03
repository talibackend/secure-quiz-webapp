<?php
    include_once 'config.php';
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
    $cpwd = mysqli_real_escape_string($con, $_POST['cpwd']);
    
    if (empty($fname) || empty($lname) || empty($gender) || empty($mobile) || empty($email) || empty($pwd) || empty($cpwd)) {
        json_formatter(false, "All fields are required");
    }else{
        $current = time();
        if(strtotime($dob) > $current){
            json_formatter(false, "Invalid Date of Birth");
        }else{
            $genders = ['m', 'f'];
            if (!in_array($gender, $genders)) {
                json_formatter(false, "Invalid Gender");
            }else{
                if (!filter_var($email, FILTER_DEFAULT)) {
                    json_formatter(false, "Invalid Email");
                }else{
                    $check = "SELECT * FROM users WHERE mobile='$mobile'";
                    $check = mysqli_query($con, $check);
                    if(mysqli_num_rows($check) > 0){
                        json_formatter(false, "Mobile number have been used");
                    }else{
                        $check = "SELECT * FROM users WHERE email='$email'";
                        $check = mysqli_query($con, $check);
                        if(mysqli_num_rows($check) > 0){
                            json_formatter(false, "Email have been used");
                        }else{
                            if($pwd != $cpwd){
                                json_formatter(false, "Invalid Confirm Password");
                            }else{
                                $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
                                $insert = "INSERT INTO users(first, last, dob, gender, mobile, email, pwd)
                                VALUES('$fname', '$lname', '$dob', '$gender', '$mobile', '$email', '$pwd_hash')";
                                if(mysqli_query($con, $insert)){
                                    json_formatter(true, "Success");
                                }else{
                                    json_formatter(true, "Error");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>