const checkEmail = () => {

    let myForm = new FormData();
    myForm.append('email', email.value);

    options = {
        body: myForm,
        method: 'POST'
    }

    fetch('/controllers/login/ajax-checkemail.php', options)
    .then((response) => {
        return response.json();
    })
    .then( (isExist) => {
        if(isExist) {
            email.classList.remove('border-danger');
            email.classList.add('border-success');
        } else {
            email.classList.remove('border-success');
            email.classList.add('border-danger');
        }
        if(email.value == '') {
            email.classList.remove('border-succes')
            email.classList.remove('border-danger')
        }
    })
}
email.addEventListener('blur', checkEmail)