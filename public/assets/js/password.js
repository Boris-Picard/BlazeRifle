const password = document.querySelector(".passwordSignIn")
const passwordConfirm = document.querySelector(".passwordConfirmSignIn")
const passMsgError = document.querySelector(".passMsgError")
const regexPwdMedium = /^(?=.*[A-Z])(?=.*[0-9]).{8,}$/
const regexPwdStrong = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[&é"'-]).{8,}$/

/*============= fonction gestion des mots de passes fort moyen ou faible =============*/

const validPassword = () => {
    password.classList.remove("border-success", "border-danger");
    passwordConfirm.classList.remove("border-success", "border-danger");
    passMsgError.textContent = "";
    if (password.value == "" && passwordConfirm.value == "") {
        return;
    };
    if (password.value == passwordConfirm.value) {
        password.classList.add("border-success", "border-3");
        passwordConfirm.classList.add("border-success", "border-3");
        passMsgError.textContent = "";
    } else {
        password.classList.remove("border-success");
        passwordConfirm.classList.remove("border-success");
        password.classList.add("border-danger", "border-3");
        passwordConfirm.classList.add("border-danger", "border-3");
        passMsgError.textContent = "Les passwords ne sont pas identiques";
    };
};

validPassword()