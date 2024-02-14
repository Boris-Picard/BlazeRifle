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
            email.classList.add('border-danger');
        } else {
            email.classList.remove('border-danger');
        }
    })
}
email.addEventListener('blur', checkEmail)