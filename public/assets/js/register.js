let icon = document.getElementById('icon');
let icon2 = document.getElementById('icon2');
let mdp = document.querySelector('#registration_form_plainPassword_first');
let conf = document.querySelector('#registration_form_plainPassword_second');

icon.addEventListener('click',function(){
    if(icon.getAttribute('class') == 'far fa-eye-slash'){
        icon.setAttribute('class','far fa-eye');
        mdp.type = 'text';        
    }
    else{
        icon.setAttribute('class','far fa-eye-slash');
        mdp.type = 'password';
    }
});
icon2.addEventListener('click',function(){
    if(icon2.getAttribute('class') == 'far fa-eye-slash'){
        icon2.setAttribute('class','far fa-eye');
        conf.type = 'text';        
    }
    else{
        icon2.setAttribute('class','far fa-eye-slash');
        conf.type = 'password';
    }
});
