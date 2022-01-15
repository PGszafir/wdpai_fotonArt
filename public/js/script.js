const form = document.querySelector("form");
const emailInput = form.querySelector('input[name = "email"]');
const confirmedPassInput = form.querySelector('input[name = "confirmedPassword"]')

function isEmail(email){
    return /\S+@\S+\.+\S/.test(email);
}

function arePassSame(password,confirmedPassword){
    return password === confirmedPassword;
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

emailInput.addEventListener('keyup', function (){
    setTimeout(function (){
        markValidation(emailInput,isEmail(emailInput.value));
    },
        1000
    );
});

confirmedPassInput.addEventListener('keyup', function (){
    setTimeout(function (){
        const condition =  arePassSame(
            confirmedPassInput.previousElementSibling.value,
            confirmedPassInput.value
        );
            markValidation(confirmedPassInput,condition);
        },
        1000
    );
});