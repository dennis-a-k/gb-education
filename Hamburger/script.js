class Hamburger {
  constructor(stuffing) {
    this.calc();
    this.stuffing = {
      small: {
        price: 50,
        calories: 20
      },
      large: {
        price: 100,
        calories: 40
      },
      cheese: {
        price: 10,
        calories: 20
      },
      salad: {
        price: 20,
        calories: 5
      },
      potato: {
        price: 15,
        calories: 10
      }
    };
  }

  calc(){

  }

  getInfo() {
    let radios = document.querySelectorAll('input[type="radio"], input[type="checkbox"]');
    let button = document.querySelector('#button');

    button.addEventListener('click', function(event) {
      event.preventDefault();
      let additions = [];
	    radios.forEach(radio => {
		    if (radio.checked) {
          additions.push(radio.value);
		    }
      });
      console.log(additions);
    });
  }
}

let hamburger = new Hamburger();
hamburger.getInfo();