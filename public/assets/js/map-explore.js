let map        = document.querySelector('#map');
let titleRecto = document.querySelector('.title-recto');
let imgRecto   = document.querySelector('.img-recto');
let btnRecto   = document.querySelector('.btn-recto');
// let heartRecto = document.querySelector('.heart-recto');
let cardRecto      = document.querySelector('.card-recto');
let titleVerso     = document.querySelector('.card-verso h2');
let imgVerso       = document.querySelector('.img-verso');
let imgVersoMirror = document.querySelector('.img-verso-mirror');
let paragraph1     = document.querySelector('.paragraph1');
let paragraph2     = document.querySelector('.paragraph2');
let diet = document.querySelector('#diet');
let population = document.querySelector('#population');
let statusA = document.querySelector('#status');
let imgDiet = document.querySelector('#imgDiet');


let lienAnimal = document.querySelector('#lien-animal');

let asie                = document.querySelector('#map-asie');
let asieElements        = document.querySelectorAll('#map-asie *');
let europe              = document.querySelector('#map-europe');
let europeElements      = document.querySelectorAll('#map-europe *');
let afrique             = document.querySelector('#map-afrique');
let afriqueElements     = document.querySelectorAll('#map-afrique *');
let oceanie             = document.querySelector('#map-oceanie');
let oceanieElements     = document.querySelectorAll('#map-oceanie *');
let amnord              = document.querySelector('#map-amnord');
let amnordElements      = document.querySelectorAll('#map-amnord *');
let amsud               = document.querySelector('#map-amsud');
let amsudElements       = document.querySelectorAll('#map-amsud *');
let antarctique         = document.querySelector('#map-antarctique');
let antarctiqueElements = document.querySelectorAll('#map-antarctique *');
let oceanAntarctique    = document.querySelectorAll('.ocean-antarctique');
let oceanIndien         = document.querySelectorAll('.ocean-indien');
let oceanAtlantique     = document.querySelectorAll('.ocean-atlantique');
let oceanPacifique      = document.querySelectorAll('.ocean-pacifique');
let oceanArctique       = document.querySelectorAll('.ocean-arctique');

let habitats = document.querySelector('#habitats');
let types    = document.querySelector('#types');
let aliments = document.querySelector('#aliments');

let alimentsType = document.querySelector('#aliments-type');
let habitatsType = document.querySelector('#habitats-type');
let typesType    = document.querySelector('#types-type');

let getUrl = window.location;

asie.addEventListener('mouseover',()=>{
  for(element of asieElements) {
    element.setAttribute('fill','#d3613a');
  }
})

asie.addEventListener('mouseout',()=>{
  for(element of asieElements) {
    element.setAttribute('fill','#ccb6ae');
  }
})

asie.addEventListener('click',()=>{
    document.location.href = '/continent/5?continentSelected=Asie';
})

europe.addEventListener('mouseover',()=>{
  for(element of europeElements) {
    element.setAttribute('fill','#3284c7');
  }
})

europe.addEventListener('mouseout',()=>{
  for(element of europeElements) {
    element.setAttribute('fill','#8da6ba');
  }
})

europe.addEventListener('click',()=>{
  document.location.href = '/continent/6?continentSelected=Europe';
})

afrique.addEventListener('mouseover',()=>{
  for(element of afriqueElements) {
    element.setAttribute('fill','#fcae37');
  }
})

afrique.addEventListener('mouseout',()=>{
  for(element of afriqueElements) {
    element.setAttribute('fill','#efdbbc');
  }
})

afrique.addEventListener('click',()=>{
  document.location.href = '/continent/1?continentSelected=Afrique';
})

oceanie.addEventListener('mouseover',()=>{
  for(element of oceanieElements) {
    element.setAttribute('fill','#ffd171');
  }
})

oceanie.addEventListener('mouseout',()=>{
  for(element of oceanieElements) {
    element.setAttribute('fill','#f0e1c3');
  }
})

oceanie.addEventListener('click',()=>{
  document.location.href = '/continent/7?continentSelected=Océanie';
})

amnord.addEventListener('mouseover',()=>{
  for(element of amnordElements) {
    element.setAttribute('fill','#69772f');
  }
})

amnord.addEventListener('mouseout',()=>{
  for(element of amnordElements) {
    element.setAttribute('fill','#a1a78b');
  }
})

amnord.addEventListener('click',()=>{
  document.location.href = '/continent/2?continentSelected=Amérique%20du%20Nord';
})

amsud.addEventListener('mouseover',()=>{
  for(element of amsudElements) {
    element.setAttribute('fill','#81bf72');
  }
})

amsud.addEventListener('mouseout',()=>{
  for(element of amsudElements) {
    element.setAttribute('fill','#c8d8c4');
  }
})

amsud.addEventListener('click',()=>{
  document.location.href = '/continent/3?continentSelected=Amérique%20du%20Sud';
})

antarctique.addEventListener('mouseover',()=>{
  for(element of antarctiqueElements) {
    element.setAttribute('fill','#6399F0');
  }
})

antarctique.addEventListener('mouseout',()=>{
  for(element of antarctiqueElements) {
    element.setAttribute('fill','#C6E2EA');
  }
})

antarctique.addEventListener('click',()=>{
  document.location.href = '/continent/4?continentSelected=Antarctique';
})

for(ocean of oceanArctique) {
  ocean.addEventListener('click',()=>{
    document.location.href = '/continent/8?continentSelected=Océan%20Arctique';
  })
}

for(ocean of oceanAtlantique) {
  ocean.addEventListener('click',()=>{
    document.location.href = '/continent/9?continentSelected=Océan%20Atlantique';
  })
}

for(ocean of oceanAntarctique) {
  ocean.addEventListener('click',()=>{
    document.location.href = '/continent/10?continentSelected=Océan%20Antarctique';
  })
}

for(ocean of oceanIndien) {
  ocean.addEventListener('click',()=>{
    document.location.href = '/continent/11?continentSelected=Océan%20Indien';
  })
}

for(ocean of oceanPacifique) {
  ocean.addEventListener('click',()=>{
    document.location.href = '/continent/12?continentSelected=Océan%20Pacifique';
  })
}

pins = document.querySelectorAll('.pin');

for (pin of pins) {
  let nomAnimal = pin.dataset.animal;
  pin.addEventListener('click', () => {
    window.fetch('/animal/'+nomAnimal)
    .then((response) => {
      return response.json();
    })
    .then((response2) => {
      console.log(response2)
      imgRecto.setAttribute('src',"assets/images/animal/"+response2[8]);
      titleRecto.innerHTML = response2[1];
      titleRecto.setAttribute('data-animal',response2[1])
      btnRecto.setAttribute('data-animal',response2[1])
      cardRecto.setAttribute('data-animal',response2[1])
    })
  })
  pin.setAttribute("data-bs-target",'#card');
  pin.setAttribute("data-bs-toggle",'modal'); 
}

cardRecto.addEventListener('click', (e) => {
    let nomAnimal = cardRecto.dataset.animal;
    e.preventDefault();
    window.fetch('/animal/'+nomAnimal)
    .then((response) => {
      return response.json();
    })
    .then((response2) => {
      console.log(response2)
      imgVerso.setAttribute('src',"/assets/images/animal/cutOuts/"+response2[12]);
      imgVersoMirror.setAttribute('src',"/assets/images/animal/cutOuts/"+response2[12]);
      titleVerso.innerHTML = response2[1];
      paragraph1.innerText = response2[6];
      paragraph2.innerText = response2[13];
      diet.innerHTML = response2[2];
      population.innerHTML = response2[5];
      statusA.innerHTML = response2[3];
      imgDiet.setAttribute('src',"/assets/svg/other/icons/diet/"+response2[2]+'.svg');
      let nomLienAnimal = response2[1].split(" ");
      lienAnimal.setAttribute('href','/detail/'+nomLienAnimal[1].toLowerCase().replace('é','e'));
    })
  })

aliments.addEventListener('click',()=>{
  aliments.classList.toggle('move');
  alimentsType.classList.toggle('d-none');
  habitatsType.classList.add('d-none');
  typesType.classList.add('d-none');
  types.classList.remove('move');
  habitats.classList.remove('move');
})
types.addEventListener('click',()=>{
  types.classList.toggle('move');
  typesType.classList.toggle('d-none');
  alimentsType.classList.add('d-none');
  habitatsType.classList.add('d-none');
  habitats.classList.remove('move');
  aliments.classList.remove('move');
})
habitats.addEventListener('click',()=>{
  habitats.classList.toggle('move');
  habitatsType.classList.toggle('d-none');
  alimentsType.classList.add('d-none');
  typesType.classList.add('d-none');
  aliments.classList.remove('move');
  types.classList.remove('move');
})

let iconCarn = document.querySelector('#icon-carn');
let iconFrug = document.querySelector('#icon-frug');
let iconGran = document.querySelector('#icon-gran');
let iconHerb = document.querySelector('#icon-herb');
let iconPisc = document.querySelector('#icon-pisc');

let textHerb = document.querySelector('#text-herb');
let textCarn = document.querySelector('#text-carn');
let textFrug = document.querySelector('#text-frug');
let textGran = document.querySelector('#text-gran');
let textPisc = document.querySelector('#text-pisc');

iconCarn.addEventListener('click',()=>{
  document.location.href = '/diet/Carnivore'
})
iconCarn.addEventListener('mouseover',()=>{
  textCarn.classList.remove('d-none')
})
iconCarn.addEventListener('mouseout',()=>{
  textCarn.classList.add('d-none')
})

iconFrug.addEventListener('click',()=>{
  document.location.href = '/diet/Frugivore'
})
iconFrug.addEventListener('mouseover',()=>{
  textFrug.classList.remove('d-none')
})
iconFrug.addEventListener('mouseout',()=>{
  textFrug.classList.add('d-none')
})

iconGran.addEventListener('click',()=>{
  document.location.href = '/diet/Granivore'
})
iconGran.addEventListener('mouseover',()=>{
  textGran.classList.remove('d-none')
})
iconGran.addEventListener('mouseout',()=>{
  textGran.classList.add('d-none')
})

iconHerb.addEventListener('click',()=>{
  document.location.href = '/diet/Herbivore'
})
iconHerb.addEventListener('mouseover',()=>{
  textHerb.classList.remove('d-none')
})
iconHerb.addEventListener('mouseout',()=>{
  textHerb.classList.add('d-none')
})

iconPisc.addEventListener('click',()=>{
  document.location.href = '/diet/Piscivore'
})
iconPisc.addEventListener('mouseover',()=>{
  textPisc.classList.remove('d-none')
})
iconPisc.addEventListener('mouseout',()=>{
  textPisc.classList.add('d-none')
})

let iconDesert   = document.querySelector('#icon-desert');
let iconEauDouce = document.querySelector('#icon-eau-douce');
let iconEauSalee = document.querySelector('#icon-eau-salee');
let iconForet    = document.querySelector('#icon-foret');
let iconJungle   = document.querySelector('#icon-jungle');
let iconMontagne = document.querySelector('#icon-montagne');
let iconNeige    = document.querySelector('#icon-neige');
let iconPrairie  = document.querySelector('#icon-prairie');
let iconSavane   = document.querySelector('#icon-savane');

let textDesert   = document.querySelector('#text-desert');
let textEauDouce = document.querySelector('#text-eau-douce');
let textEauSalee = document.querySelector('#text-eau-salee');
let textForet    = document.querySelector('#text-foret');
let textJungle   = document.querySelector('#text-jungle');
let textMontagne = document.querySelector('#text-montagne');
let textNeige    = document.querySelector('#text-neige');
let textPrairie  = document.querySelector('#text-prairie');
let textSavane   = document.querySelector('#text-savane');



iconDesert.addEventListener('click',()=>{
  document.location.href = '/habitat/Desert'
})
iconDesert.addEventListener('mouseover',()=>{
  textDesert.classList.remove('d-none')
})
iconDesert.addEventListener('mouseout',()=>{
  textDesert.classList.add('d-none')
})
iconEauDouce.addEventListener('click',()=>{
  document.location.href = '/habitat/Eau douce'
})
iconEauDouce.addEventListener('mouseover',()=>{
  textEauDouce.classList.remove('d-none')
})
iconEauDouce.addEventListener('mouseout',()=>{
  textEauDouce.classList.add('d-none')
})
iconEauSalee.addEventListener('click',()=>{
  document.location.href = '/habitat/Eau de mer'
})
iconEauSalee.addEventListener('mouseover',()=>{
  textEauSalee.classList.remove('d-none')
})
iconEauSalee.addEventListener('mouseout',()=>{
  textEauSalee.classList.add('d-none')
})
iconForet.addEventListener('click',()=>{
  document.location.href = '/habitat/Forêt'
})
iconForet.addEventListener('mouseover',()=>{
  textForet.classList.remove('d-none')
})
iconForet.addEventListener('mouseout',()=>{
  textForet.classList.add('d-none')
})
iconJungle.addEventListener('click',()=>{
  document.location.href = '/habitat/Jungle'
})
iconJungle.addEventListener('mouseover',()=>{
  textJungle.classList.remove('d-none')
})
iconJungle.addEventListener('mouseout',()=>{
  textJungle.classList.add('d-none')
})
iconMontagne.addEventListener('click',()=>{
  document.location.href = '/habitat/Montagne'
})
iconMontagne.addEventListener('mouseover',()=>{
  textMontagne.classList.remove('d-none')
})
iconMontagne.addEventListener('mouseout',()=>{
  textMontagne.classList.add('d-none')
})
iconNeige.addEventListener('click',()=>{
  document.location.href = '/habitat/Neige'
})
iconNeige.addEventListener('mouseover',()=>{
  textNeige.classList.remove('d-none')
})
iconNeige.addEventListener('mouseout',()=>{
  textNeige.classList.add('d-none')
})
iconPrairie.addEventListener('click',()=>{
  document.location.href = '/habitat/Prairie'
})
iconPrairie.addEventListener('mouseover',()=>{
  textPrairie.classList.remove('d-none')
})
iconPrairie.addEventListener('mouseout',()=>{
  textPrairie.classList.add('d-none')
})
iconSavane.addEventListener('click',()=>{
  document.location.href = '/habitat/Savane'
})
iconSavane.addEventListener('mouseover',()=>{
  textSavane.classList.remove('d-none')
})
iconSavane.addEventListener('mouseout',()=>{
  textSavane.classList.add('d-none')
})


let iconMam = document.querySelector('#icon-mam');
let iconOis = document.querySelector('#icon-ois');
let iconRep = document.querySelector('#icon-rep');
let iconPoi = document.querySelector('#icon-poi');

let textPoi = document.querySelector('#text-poi');
let textMam = document.querySelector('#text-mam');
let textOis = document.querySelector('#text-ois');
let textRep = document.querySelector('#text-rep');

iconMam.addEventListener('click',()=>{
  document.location.href = '/type/Mammifère'
})
iconMam.addEventListener('mouseover',()=>{
  textMam.classList.remove('d-none')
})
iconMam.addEventListener('mouseout',()=>{
  textMam.classList.add('d-none')
})
iconOis.addEventListener('click',()=>{
  document.location.href = '/type/Oiseau'
})
iconOis.addEventListener('mouseover',()=>{
  textOis.classList.remove('d-none')
})
iconOis.addEventListener('mouseout',()=>{
  textOis.classList.add('d-none')
})
iconRep.addEventListener('click',()=>{
  document.location.href = '/type/Reptile'
})
iconRep.addEventListener('mouseover',()=>{
  textRep.classList.remove('d-none')
})
iconRep.addEventListener('mouseout',()=>{
  textRep.classList.add('d-none')
})
iconPoi.addEventListener('click',()=>{
  document.location.href = '/type/Poisson'
})
iconPoi.addEventListener('mouseover',()=>{
  textPoi.classList.remove('d-none')
})
iconPoi.addEventListener('mouseout',()=>{
  textPoi.classList.add('d-none')
})