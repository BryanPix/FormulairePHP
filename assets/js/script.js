document.addEventListener("DOMContentLoaded", function() {
    console.log("Le DOM est chargé. Le script fonctionne.");
    
    const password = document.getElementById("password-input");
    const confirmPassword = document.getElementById("confirm-password-input");
    const passwordAlert = document.getElementById("password-alert");
    const requirements = document.querySelectorAll(".requirements");
    const leng = document.querySelector(".leng");
    const bigLetter = document.querySelector(".big-letter");
    const num = document.querySelector(".num");
    const specialChar = document.querySelector(".special-char");
    
    requirements.forEach((element) => element.classList.add("wrong"));
    
    password.addEventListener("focus", () => {
        passwordAlert.classList.remove("d-none");
        if (!password.classList.contains("is-valid")) {
            password.classList.add("is-invalid");
        }
    });
    
    password.addEventListener("input", () => {
        const value = password.value;
        const isLengthValid = value.length >= 8;
        const hasUpperCase = /[A-Z]/.test(value);
        const hasNumber = /\d/.test(value);
        const hasSpecialChar = /[!@#$%^&*()\[\]{}\\|;:'",<.>/?`~]/.test(value);

        leng.querySelector(".bi-x").classList.toggle("d-none", isLengthValid);
        leng.querySelector(".bi-check").classList.toggle("d-none", !isLengthValid);
        bigLetter.querySelector(".bi-x").classList.toggle("d-none", hasUpperCase);
        bigLetter.querySelector(".bi-check").classList.toggle("d-none", !hasUpperCase);
        num.querySelector(".bi-x").classList.toggle("d-none", hasNumber);
        num.querySelector(".bi-check").classList.toggle("d-none", !hasNumber);
        specialChar.querySelector(".bi-x").classList.toggle("d-none", hasSpecialChar);
        specialChar.querySelector(".bi-check").classList.toggle("d-none", !hasSpecialChar);
    
        const isPasswordValid = isLengthValid && hasUpperCase && hasNumber && hasSpecialChar;
        const isPasswordMatching = password.value === confirmPassword.value;
    
        if (confirmPassword.value.length > 0) {
        if (isPasswordMatching) {
            confirmPassword.classList.remove("is-invalid");
            confirmPassword.classList.add("is-valid");
            confirmPassword.nextElementSibling.classList.remove("invalid-feedback");
            confirmPassword.nextElementSibling.classList.add("valid-feedback");
        } else {
            confirmPassword.classList.remove("is-valid");
            confirmPassword.classList.add("is-invalid");
            confirmPassword.nextElementSibling.classList.remove("valid-feedback");
            confirmPassword.nextElementSibling.classList.add("invalid-feedback");
        }
        }
        if (isPasswordValid) {
        password.classList.remove("is-invalid");
        password.classList.add("is-valid");
    
        requirements.forEach((element) => {
        element.classList.add("good");
        });
        passwordAlert.classList.remove("alert-warning");
        passwordAlert.classList.add("alert-success");
        } else {
        password.classList.remove("is-valid");
        password.classList.add("is-invalid");
        passwordAlert.classList.add("alert-warning");
        passwordAlert.classList.remove("alert-success");
    }})
});
