const password = document.querySelector(".passwordSignIn")
const passwordConfirm = document.querySelector(".passwordConfirmSignIn")
const passMsgError = document.querySelector(".passMsgError")
const passMsg = document.getElementById("passwordStrength");
const passMsgMaj = document.getElementById("passwordMin");
const regexMaj = /^(?=.*[a-z]).{8,}$/
const regexMinMaj = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/
const regexMinMajNumber = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{8,}$/

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

const passStrength = () => {
    passMsg.classList.remove("text-danger", "text-danger", "text-warning", "text-success");
    passMsgMaj.classList.remove("text-danger", "text-danger", "text-warning", "text-success");
    passMsg.textContent = "";
    passMsgMaj.textContent = "";
    if (password.value == "") {
        return;
    };
    if (password.value.length < 8) {
        passMsg.classList.add("text-danger");
        passMsg.textContent = "Mot de passe sous les 8 caractères";
    };
    if (regexMaj.test(password.value) == true) {
        passMsgMaj.textContent = "";
        passMsg.classList.add("text-danger");
        passMsg.textContent = "Veuillez mettre au moins une majuscule";
    };
    if (regexMinMaj.test(password.value) == true) {
        passMsgMaj.textContent = "";
        passMsg.classList.add("text-danger");
        passMsg.textContent = "Veuillez mettre au moins un nombre";
    };
    if (regexMinMajNumber.test(password.value) == true) {
        passMsgMaj.textContent = "";
        passMsg.classList.remove("text-danger");
        passMsg.classList.add("text-warning");
        passMsg.textContent = "Veuillez mettre un caractère spécial";
    };
    if (regexPwdStrong.test(password.value) == true) {
        passMsgMaj.textContent = "";
        passMsg.classList.remove("text-warning");
        passMsg.classList.add("text-success");
        passMsg.textContent = "Mot de passe fort";
    };
};


password.addEventListener("input", passStrength);

validPassword()