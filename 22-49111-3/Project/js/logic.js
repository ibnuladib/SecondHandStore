let fname = document.getElementById("fname");
let lname = document.getElementById("lname");
let form = document.getElementById("onSubmit");
let usrname = document.getElementById("usrname");
let pass = document.getElementById("pass");
let confirmpass = document.getElementById("confirmpass");
let email = document.getElementById("email");
let phone = document.getElementById("Phone");
let DOB = document.getElementById("DOB");
let male = document.getElementById("male");
let female = document.getElementById("female");
let other = document.getElementById("other");


function showError(input, message) {
    let small = input.parentElement.querySelector("small");
    small.innerText = message;
    return false;
}


function clearError(input) {
    let small = input.parentElement.querySelector("small");
    small.innerText = "";
    return true;
}


function validateName(input) {
    let value = input.value.trim();
    
    if (value === "") {
        showError(input, "Name cannot be blank");
    } else if (hasNumber(value)) {
        showError(input, "Name cannot contain a number");
    } else {
        clearError(input);
    }
}

function hasNumber(str) {
    for (let i = 0; i < str.length; i++) {
        if (!isNaN(str[i]) && str[i] !== " ") {
            return true;
        }
    }
    return false;
}

function validateUsername(input) {
    let value = input.value.trim();

    if (value === "") {
        showError(input, "Username cannot be blank");
    } else {
        clearError(input);
    }
}

function validatePassword(input) {
    let value = input.value.trim();

    if (value === "") {
        showError(input, "Password cannot be blank");
    } else if (value.length < 8) {
        showError(input, "Password must be at least 8 characters");
    } else {
        clearError(input);
    }
}

function validateConfirmPassword(input) {
    let confirmValue = input.value.trim();
    let passwordValue = pass.value.trim();

    if (confirmValue === "") {
        showError(input, "Confirm Password cannot be blank");
    } else if (confirmValue !== passwordValue) {
        showError(input, "Passwords do not match");
    } else {
        clearError(input);
    }
}

function validateEmail(input) {
    let value = input.value.trim();

    if (value === "") {
        showError(input, "Email cannot be blank");
    } else {
        clearError(input);
    }
}

function validatePhone(input) {
    let value = input.value.trim();

    if (value === "") {
        showError(input, "Phone number cannot be blank");
    } else if (isNaN(value)) {
        showError(input, "Phone number must be numeric");
    } else if (value.length!=11){
        showError(input, "Phone number must contain 11 digits");
    } else {
        clearError(input);
    }
}

function validateDOB(input) {
    let value = input.value.trim();

    if (value === "") {
        showError(input, "Date of Birth is required");
    } else {
        clearError(input);
    }
}

function validateGender() {
    const gender = document.querySelector('input[name="gender"]:checked');
    const error = document.querySelector('input[name="gender"]').parentElement.querySelector("small");

    if (!gender) {
        error.innerText = "Please select a gender";
        return false;
    } else {
        error.innerText = "";
        return true;
    }
}



fname.addEventListener("input", () => {
    validateName(fname);
});

lname.addEventListener("input", () => {
    validateName(lname);
});

usrname.addEventListener("input", () => {
    validateUsername(usrname);
});

pass.addEventListener("input", () => {
    validatePassword(pass);
});

confirmpass.addEventListener("input", () => {
    validateConfirmPassword(confirmpass);
});

email.addEventListener("input", () => {
    validateEmail(email);
});

phone.addEventListener("input", () => {
    validatePhone(phone);
});

DOB.addEventListener("input",() => {
    validateDOB(DOB);
});

[male, female, other].forEach((radio) => {
    radio.addEventListener("change",() => {
        validateGender();
    });
});


form.addEventListener("submit", (e) => {
    e.preventDefault();

    // Call each validation function and check if they're all true
    let fnameValid = validateName(fname);
    let lnameValid = validateName(lname);
    let usrnameValid = validateUsername(usrname);
    let passValid = validatePassword(pass);
    let confirmValid = validateConfirmPassword(confirmpass);
    let emailValid = validateEmail(email);
    let phoneValid = validatePhone(phone);
    let dobValid = validateDOB(DOB);
    let genderValid = validateGender();

    // If all are valid (all return true), submit the form
    if (fnameValid && lnameValid && usrnameValid && passValid && confirmValid && emailValid && phoneValid && dobValid && genderValid) {
        form.submit(); 
    }
});
