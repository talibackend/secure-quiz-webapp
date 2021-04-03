function id(x){
    return document.getElementById(x);
}
const btn = id('submit');
const form = id('signup-form');
const error_logger = id('error-handler');

const submit_form = ()=>{
    const question = id('question').value.trim();
    const option_a = id('a').value.trim();
    const option_b = id('b').value.trim();
    const option_c = id('c').value.trim();
    const option_d = id('d').value.trim();
    const correct = id('correct').value.trim();
    error_logger.style.color = 'red';

    const async_submit = async ()=>{
        return await new Promise((resolve, reject)=>{
            const body = new FormData();
            body.append('question', question);
            body.append('option_a', option_a);
            body.append('option_b', option_b);
            body.append('option_c', option_c);
            body.append('option_d', option_d);
            body.append('correct', correct);

            const options = {
                method : "POST",
                body : body
            }

            fetch('post-api.php', options).then(res=>{
                res.json().then((json)=>{
                    if(json.status == true){
                        resolve(json.msg);
                    }else{
                        reject(json.msg);
                    }
                }).catch(err=>reject(err))
            }).catch(err=>reject(err));

            setTimeout(()=>{reject("Network Error");}, 20000);
        });
    }

    if(question.length <= 0 || option_a.length <= 0 || option_b.length <= 0 || option_c.length <= 0 || option_d.length <= 0 || correct <= 0){
            error_logger.innerHTML = "All fields are required";
    }else{
        if (option_a != correct && option_b != correct && option_c != correct && option_d != correct) {
            error_logger.innerHTML = "Invalid answer";
        }else{
            async_submit().then((res)=>{
                error_logger.style.color = 'green';
                id('question').value = "";
                id('a').value = "";
                id('b').value = "";
                id('c').value = "";
                id('d').value = "";
                id('correct').value = "";
                error_logger.innerHTML = res;
            }).catch(err=>error_logger.innerHTML = err)
        }
    }
}

form.addEventListener("submit", ()=>{submit_form();});
btn.addEventListener("click", (e)=>{e.preventDefault(); submit_form();});