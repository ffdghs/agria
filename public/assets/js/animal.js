let hearts = document.querySelectorAll('.heart-recto');
let cards = document.querySelectorAll('.card-recto');

let titleVerso = document.querySelector('.card-verso h2');
let imgVerso = document.querySelector('.img-verso');
let imgVersoMirror = document.querySelector('.img-verso-mirror');
let paragraph1 = document.querySelector('.paragraph1');
let paragraph2 = document.querySelector('.paragraph2');
let diet = document.querySelector('#diet');
let population = document.querySelector('#population');
let statusA = document.querySelector('#status');
let imgDiet = document.querySelector('#imgDiet');
let imgContinent = document.querySelector('#imgContinent');
let continent = document.querySelector('#continent');



let lienAnimal = document.querySelector('#lien-animal');

let user = document.querySelector('#user');

let userLogin = '';

for(values of hearts) {
  userLogin = user.dataset.user;
  let idAnimal = values.dataset.animal;
  values.addEventListener('click', (e) => {
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
}

for(card of cards) {
  let nomAnimal = card.dataset.animal;
  card.addEventListener('click', (e) => {
    e.preventDefault();
    window.fetch('/animal/'+nomAnimal)
    .then((response) => {
      return response.json();
    })
    .then((animal) => {
      console.log(animal);
      console.log(animal[14]);
      console.log(animal[15]);
      imgVerso.setAttribute('src',"/assets/images/animal/cutOuts/"+animal[12]);
      imgVersoMirror.setAttribute('src',"/assets/images/animal/cutOuts/"+animal[12]);
      titleVerso.innerHTML = animal[1];
      paragraph1.innerText = animal[6];
      paragraph2.innerText = animal[13];
      diet.innerHTML = animal[2];
      population.innerHTML = animal[5];
      statusA.innerHTML = animal[3];
      imgDiet.setAttribute('src',"/assets/svg/other/icons/diet/"+animal[2]+'.svg');
      let nomLienAnimal = animal[1].split(" ");
      lienAnimal.setAttribute('href','/detail/'+nomLienAnimal[1].toLowerCase().replace('é','e'));
    })
  })
}
