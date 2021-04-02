let icon = document.getElementById('icon');
let mdp = document.querySelector('#inputPassword');

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