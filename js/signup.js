function id(x){
    return document.getElementById(x);
}
const btn = id('submit');
const form = id('signup-form');
const error_logger = id('error-handler');

const submit_form = ()=>{
    const fname = id('fname').value.trim();
    const lname = id('lname').value.trim();
    const dob = id('dob').value.trim();
    const gender = id('gender').value.trim();
    const mobile = id('mobile').value.trim();
    const email = id('email').value.trim();
    const pwd = id('pwd').value.trim();
    const cpwd = id('cpwd').value.trim();

    const async_submit = async ()=>{
        return await new Promise((resolve, reject)=>{
            const body = new FormData();
            body.append('fname', fname);
            body.append('lname', lname);
            body.append('dob', dob);
            body.append('gender', gender);
            body.append('mobile', mobile);
            body.append('email', email);
            body.append('pwd', pwd);
            body.append('cpwd', cpwd);

            const options = {
                method : "POST",
                body : body
            }

            fetch('signup-api.php', options).then(res=>{
                res.json().then((json)=>{
                    if(json.status == true){
                        window.location = "login.php";
                    }else{
                        reject(json.msg);
                    }
                }).catch(err=>reject(err))
            }).catch(err=>reject(err));

            setTimeout(()=>{reject("Network Error");}, 20000);
        });
    }

    if(fname.length == 0 || lname.length == 0 || dob.length == 0 || 
        gender.length == 0 || mobile.length == 0 || 
        email.length == 0 || pwd.length == 0 || cpwd.length == 0){
            error_logger.innerHTML = "All fields are required";
    }else{
        if(val.string_val(fname) != true){
            error_logger.innerHTML = "Invalid first name";
        }else{
            if(val.string_val(lname) != true){
                error_logger.innerHTML = "Invalid last name";
            }else{
                if(val.string_val(gender) != true){
                    error_logger.innerHTML = "Invalid gender";
                }else{
                    if(val.number_val(mobile) != true){
                        error_logger.innerHTML = "Invalid mobile number";
                    }else{
                        if(val.email_val(email) != true){
                            error_logger.innerHTML = "Invalid email";
                        }else{
                            if (val.pass_val(pwd) != true) {
                                error_logger.innerHTML = "Password is too week";
                            }else{
                                if(pwd != cpwd){
                                    error_logger.innerHTML = "Invalid confirm password";
                                }else{
                                    current = new Date();
                                    if(current < new Date(dob)){
                                        error_logger.innerHTML = "Invalid date of birth";
                                    }else{
                                        async_submit().then((res)=>{error_logger.innerHTML = res}).catch(err=>{error_logger.innerHTML = err})
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

form.addEventListener("submit", ()=>{submit_form();});
btn.addEventListener("click", (e)=>{e.preventDefault(); submit_form();});