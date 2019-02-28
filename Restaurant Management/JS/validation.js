function regFormValidation() {
    var name = document.getElementById('name').value;
    if (name.trim() == "") {
        alert('Please enter your name');
        return false;
    }
    
    var alphaExp = /^[a-z A-Z]+$/;
    if(!name.match(alphaExp)){
        alert("Name shoud be alphabatic.");
        return false;
    }
    
    var email = document.getElementById('email').value;
    if (email.trim() == "") {
        alert('Please enter your email');
        return false;
    }
    
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    
    if(reg.test(email) == false) {
        alert('Please enter valid email');
        return false;
    }
    
    var phone_no = document.getElementById('phone_no').value;
    if (phone_no.trim() == "") {
        alert('Please enter your phone no');
        return false;
    }
    if (phone_no.toString().length < 10) {
        alert("Phone no should be ten character long");
        return false;
    }

    var password = document.getElementById('password').value;
    if (password.trim() == "") {
        alert('Please select your password');
        return false;
    }
    
    if (password.toString().length < 5) {
        alert('password should be 5 character long.');
        return false;
    }    
    var cnfpassword = document.getElementById('cnfpassword').value;
    if (cnfpassword.trim() == "") {
        alert('Please select your confirm password');
        return false;
    }
}

function contactFormValidation() {
    var name = document.getElementById('name').value;
    if (name.trim() == "") {
        alert('Please enter your name');
        return false;
    }
	
	var alphaExp = /^[a-z A-Z]+$/;
    if(!name.match(alphaExp)){
        alert("Name shoud be alphabatic.");
        return false;
    }
	
    var email = document.getElementById('email').value;
    if (email.trim() == "") {
        alert('Please enter your email');
        return false;
    }
	
	 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    
    if(reg.test(email) == false) {
        alert('Please enter valid email');
        return false;
    }
	
    var phone_no = document.getElementById('phone_no').value;
    if (phone_no.trim() == "") {
        alert('Please enter your phone no');
        return false;
    }
    else {
        if (phone_no.trim().length != 10) {
            alert('phone_no should be 10 character long.');
            return false;
        }
    }
    var subject = document.getElementById('subject').value;
    if (subject.trim() == "") {
        alert('Please enter your subject');
        return false;
    }
    var message = document.getElementById('message').value;
    if (message.trim() == "") {
        alert('Please enter your message');
        return false;
    }
}

function loginFormValidation() {
    var email = document.getElementById('email').value;
    if (email.trim() == "") {
        alert('Please enter your email');
        return false;
    }
    var password = document.getElementById('password').value;
    if (password.trim() == "") {
        alert('Please select your password');
        return false;
    }
}

function changeFormValidation() {
    var password = document.getElementById('oldpwd').value;
    if (password.trim() == "") {
        alert('Please select your old password');
        return false;
    }
    var password = document.getElementById('newpwd').value;
    if (password.trim() == "") {
        alert('Please select your new password');
        return false;
    }
    var password = document.getElementById('conpwd').value;
    if (password.trim() == "") {
        alert('Please select your confirm password');
        return false;
    }
}

function myaccountFormValidation() {
    var name = document.getElementById('name').value;
    if (name.trim() == "") {
        alert('Please enter your name');
        return false;
    }
    var email = document.getElementById('email').value;
    if (email.trim() == "") {
        alert('Please enter your email');
        return false;
    }
    var phone_no = document.getElementById('phone_no').value;
    if (phone_no.trim() == "") {
        alert('Please enter your phone_no');
        return false;
    }


    var city = document.getElementById('city').value;
    if (city.trim() == "") {
        alert('Please enter your city');
        return false;
    }
    var state = document.getElementById('state').value;
    if (state.trim() == "") {
        alert('Please enter your state');
        return false;
    }
    
    var country = document.getElementById('country').value;
    if (country.trim() == "") {
        alert('Please enter your country');
        return false;
    }
    var pin_no = document.getElementById('pin_no').value;
    if (pin_no.trim() == "") {
        alert('Please enter your pin_no');
        return false;
    }
}

function FormValidation() {
    var txtquery = document.getElementById('txtquery').value;
    if (txtquery.trim() == "") {
        alert('Please enter your query');
        return false;
    }
}

function postFormValidation() {
    var txtpost = document.getElementById('txtpost').value;
    if (txtpost.trim() == "") {
        alert('Please enter your post');
        return false;
    }
}