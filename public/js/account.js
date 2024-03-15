function sendDangky() {
    
    let email = document.querySelector('.email');
    let password = document.querySelector('.password');
    let name = document.querySelector('.name');
    let address = document.querySelector('.address');
    let phone = document.querySelector('.phone');

    let name__err = document.querySelector('.name__err');
    let email__err = document.querySelector('.email__err');
    let pass__err = document.querySelector('.pass__err');
    let address__err = document.querySelector('.address__err');
    let phone__err = document.querySelector('.phone__err');

    let count = 0;

    if(email.value == "") {
        email__err.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        email__err.innerHTML = "";
    }

    if(password.value == "") {
        pass__err.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        pass__err.innerHTML = "";
    }

    if(name.value == "") {
        name__err.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        name__err.innerHTML = "";
    }

    if(address.value == "") {
        address__err.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        address__err.innerHTML = "";
    }
    
    if (phone.value === "") {
        phone__err.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else if (isNaN(phone.value) || phone.value.length !== 10) {
        phone__err.innerHTML = "Số điện thoại gồm 10 chữ số và chỉ chứa số";
        count++;
    } else {
        phone__err.innerHTML = "";
    }

    if(count > 0) {
        return false;
    }
}


function sendDangnhap() {
    let email = document.querySelector('.emailLogin');
    let password = document.querySelector('.passwordLogin');

    let email__errLogin = document.querySelector('.email__errLogin');
    let pass__errLogin = document.querySelector('.pass__errLogin');

    let count = 0;

    if(email.value == "") {
        email__errLogin.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        email__errLogin.innerHTML = "";
    }

    if(password.value == "") {
        pass__errLogin.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        pass__errLogin.innerHTML = "";
    }

    if(count > 0) {
        return false;
    }
}