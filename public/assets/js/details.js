heart = document.querySelector('.fa-heart');


  userLogin = user.dataset.user;
  let idAnimal = heart.dataset.animal;
  heart.addEventListener('click', (e) => {
    if(e.target.classList.contains('far')) {
      e.target.classList.replace('far','fas');
      window.fetch('/favorite/'+userLogin+'/'+idAnimal)
        .then((response)=>{
          return response
        })
        .then((response) => {
          console.log(response);
        })
    }
    else {
      e.target.classList.replace('fas','far');
      window.fetch('/rmfavorite/'+userLogin+'/'+idAnimal)
      .then((response)=>{
        return response
      })
      .then((response) => {
        console.log(response);
      })
    }
  })
