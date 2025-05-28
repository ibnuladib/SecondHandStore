document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('sellerForm');
    const fullName = document.getElementById('full_name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const phone = document.getElementById('phone_number');
    const businessName = document.getElementById('business_name');
    const storeType = document.getElementById('store_type');
    const businessAddress = document.getElementById('business_address');

    form.addEventListener('submit', function(e){
        e.preventDefault();
        if(validateForm()){
            form.submit();
        }
    })

    const errorMessages = {
        nameError: document.getElementById('nameError'),
        emailError: document.getElementById('emailError'),
        passwordError: document.getElementById('passwordError'),
        confirmPasswordError: document.getElementById('confirmPasswordError'),
        phoneError: document.getElementById('phoneError'),
        businessError: document.getElementById('businessError'),
        storeError: document.getElementById('storeError'),
        yearsError: document.getElementById('yearsError'),
        addressError: document.getElementById('addressError')
    };

    email.addEventListener('input', validateEmail);
    password.addEventListener('input', validatePassword);
    confirmPassword.addEventListener('input', validateConfirmPassword);
    phone.addEventListener('input', validatePhone);


    function validateForm() {
        let isValid = true;

        if (fullName.value.trim() === '') {
            showError(errorMessages.nameError, 'Full name is required');
            isValid = false;
        } else {
            clearError(errorMessages.nameError);
        }

        if (businessName.value.trim() === '') {
            showError(errorMessages.businessError, 'Business name is required');
            isValid = false;
        } else {
            clearError(errorMessages.businessError);
        }

        if (storeType.value === '') {
            showError(errorMessages.storeError, 'Store type is required');
            isValid = false;
        } else {
            clearError(errorMessages.storeError);
        }

        if (businessAddress.value.trim() === '') {
            showError(errorMessages.addressError, 'Business address is required');
            isValid = false;
        } else {
            clearError(errorMessages.addressError);
        }

        if (!validateEmail()) isValid = false;
        if (!validatePassword()) isValid = false;
        if (!validateConfirmPassword()) isValid = false;
        if (!validatePhone()) isValid = false;

        return isValid;
    }

    function validateEmail() {
        const emailValue = email.value.trim();
        if (!emailValue.includes('@')) {
            showError(errorMessages.emailError, 'Email must contain @');
            return false;
        }
        clearError(errorMessages.emailError);
        return true;
    }

    function validatePassword() {
        if (password.value.length < 6) {
            showError(errorMessages.passwordError, 'Password must be at least 6 characters');
            return false;
        }
        clearError(errorMessages.passwordError);
        return true;
    }

    function validateConfirmPassword() {
        if (confirmPassword.value !== password.value) {
            showError(errorMessages.confirmPasswordError, 'Passwords do not match');
            return false;
        }
        clearError(errorMessages.confirmPasswordError);
        return true;
    }

    function validatePhone() {
        const phoneValue = phone.value.trim();
        if (phoneValue.length !== 11 || isNaN(phoneValue)) {
            showError(errorMessages.phoneError, 'Phone number must be 11 digits');
            return false;
        }
        clearError(errorMessages.phoneError);
        return true;
    }

    function showError(element, message) {
        element.textContent = message;
        element.classList.add('toggle');
    }

    function clearError(element) {
        element.textContent = '';
        element.classList.remove('toggle');
    }
});