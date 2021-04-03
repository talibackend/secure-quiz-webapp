function id(x){
    return document.getElementById(x);
}
const btn = id('submit');
const form = id('login-form');
const error_logger = id('error-handler');

const submit_form = ()=>{
    const uid = id('uid').value.trim();
    const pwd = id('pwd').value.trim();

    const async_submit = async ()=>{
        return await new Promise((resolve, reject)=>{
            const body = new FormData();
            body.append('uid', uid);
            body.append('pwd', pwd);

            const options = {
                method : "POST",
                body : body
            }

            fetch('login-api.php', options).then(res=>{
                res.json().then((json)=>{
                    if(json.status == true){
                        window.location = "index.php";
                    }else{
                        reject(json.msg);
                    }
                }).catch(err=>reject(err))
            }).catch(err=>reject(err));

            setTimeout(()=>{reject("Network Error");}, 20000);
        });
    }
    if(val.email_val(uid) && val.number_val(uid)){
        error_logger.innerHTML ="Invalid Id(Use email or mobile number.)";
    }else{
        async_submit().then((res)=>{error_logger.innerHTML = res}).catch(err=>{error_logger.innerHTML = err})
    }
                                    
}

form.addEventListener("submit", ()=>{submit_form();});
btn.addEventListener("click", (e)=>{e.preventDefault(); submit_form();});
