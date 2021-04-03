function id(x){
    return document.getElementById(x);
}
const btn = id('submit');
const form = id('options-to-start');
const error_logger = id('error-handler');
const full_container = id('all_question_container');
const btn_container = id('btns-container');
const answers = {};
const timer = id("timer");
time = 0;
const submit_form = ()=>{
    const no_of_questions = id('no_of_questions').value.trim();
    const duration = id('duration').value.trim();

    const async_submit = async ()=>{
        return await new Promise((resolve, reject)=>{
            const body = new FormData();
            body.append('no_of_questions', no_of_questions);
            body.append('duration', duration);

            const options = {
                method : "POST",
                body : body
            }

            fetch('fetch-questions-api.php', options).then(res=>{
                res.json().then((json)=>{
                    if(json.status == true){
                        resolve(json.msg)
                    }else{
                        reject(json.msg);
                    }
                }).catch(err=>reject(err))
            }).catch(err=>reject(err));

            setTimeout(()=>{reject("Network Error");}, 20000);
        });
    }

    if(no_of_questions.length == 0 || duration.length == 0){
            error_logger.innerHTML = "All fields are required";
    }else{
        monitor(duration);
        async_submit().then((res)=>{
            full_container.innerHTML = '';
            render_q(res, 0, duration);
            btn_logger(res, 0);
            for (let index = 0; index < res.length; index++) {
                answers[`${index}`] = [res[index].question_id, ''];
            }
        }).catch(err=>error_logger.innerHTML = err)
    }
}

form.addEventListener("submit", ()=>{submit_form();});
btn.addEventListener("click", (e)=>{e.preventDefault(); submit_form();});


const render_q = (questions, position, duration)=>{
    full_container.innerHTML = `
        <h2 class="label">Question ${position + 1} of ${questions.length}</h2>
        <p class="question"> ${questions[position]['question']}</p>
        <p class="options"><input type="radio" name="option" id="option_1" value="${questions[position]['option_a']}">${questions[position]['option_a']}</p>
        <p class="options"><input type="radio" name="option" id="option_2" value="${questions[position]['option_b']}">${questions[position]['option_b']}</p>
        <p class="options"><input type="radio" name="option" id="option_3" value="${questions[position]['option_c']}">${questions[position]['option_c']}</p>
        <p class="options"><input type="radio" name="option" id="option_4" value="${questions[position]['option_d']}">${questions[position]['option_d']}</p>
        
    `;

}
const btn_logger = (questions, position)=>{
    btn_container.innerHTML = "";
    btn_container.innerHTML = `<button id="previous" class="all-questions-btn">Previous</button>`;
    for (let index = 0; index < questions.length; index++) {
        btn_container.innerHTML += `<button id="question-${index}" name="each-questions-btn" class="all-questions-btn" value="${index}">${index+1}</button>`;
    }
    btn_container.innerHTML += `<button id="next" class="all-questions-btn">Next</button>
    <br>
    <button id="submit" class="all-questions-btn">Submit</button>`;
    const btns = document.getElementsByName('each-questions-btn');
    const options = document.getElementsByName('option');
    for (let index = 0; index < btns.length; index++) {
        each = btns[index];
        each.addEventListener('click', (e)=>{
           mark_incrementor(questions[position].question_id, options, position);
           e.preventDefault();
           render_q(questions, index, time);
           btn_logger(questions, index);
        });
    }

    id('previous').addEventListener('click', (e)=>{
        e.preventDefault();
        mark_incrementor(questions[position].question_id, options, position);
        if(position > 0){
            new_index = position - 1;
            render_q(questions, new_index, time);
            btn_logger(questions, new_index);
        }
    });
    id('next').addEventListener('click', (e)=>{
        e.preventDefault();
        mark_incrementor(questions[position].question_id, options, position);
        if(position < questions.length - 1){
            new_index = position + 1;
            render_q(questions, new_index, time);
            btn_logger(questions, new_index);
        }
    });
    id('submit').addEventListener('click', (e)=>{
        e.preventDefault();
        mark_incrementor(questions[position].question_id, options, position);
        submit_answers(questions, answers);
    });
}
const mark_incrementor = (question_id, options, position)=>{
    for (let index = 0; index < options.length; index++) {
        if (options[index].checked == true) {
            answers[`${position}`][1] = options[index].value;
        }
    }
}
const submit_answers_async = async (answers)=>{
    return await new Promise((resolve, reject)=>{
        const options = {
            headers : {
                'Content-type' : 'application/json'
            },
            method : "POST",
            body : JSON.stringify(answers)
        }
        fetch('submit-api.php', options).then(res=>{res.json().then((json)=>{
            if (json.status == true) {
                window.location = 'results.php';
            }else{
                reject(json.msg);
            }
        }).catch(err=>reject(err))}).catch(err=>reject(err));
        setTimeout(()=>{reject("Network Error")}, 20000);
    })
}
const submit_answers = (questions, answers)=>{
    counter = [];
    for (let index = 0; index < questions.length; index++) {
        if(answers[`${index}`] == ''){
            counter.push(index+1);
        }
    }
    if (counter.length > 0) {
        ask = confirm(`Question ${counter.join()} have not been answered, are you sure you still want to submit?`);
        if(ask == true){
            submit_answers_async(answers).then().catch(err=>alert(err));
        }
    }else{
        submit_answers_async(answers).then().catch(err=>alert(err));
    }
}
const monitor = (duration)=>{
    time = duration;
    setInterval(() => {
        if(time == 0){
            submit_answers_async(answers).then().catch(err=>alert(err));
        }else{
            time--;
            timer.innerHTML = `Time Left : ${time} Seconds`;
        }
    }, 1000);
}