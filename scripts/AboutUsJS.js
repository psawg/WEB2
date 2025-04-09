// Create a map function to calc the size of the img
function map(val, minA, maxA, minB, maxB) {
  return minB + ((val - minA) * (maxB - minB)) / (maxA - minA);
}

// Create a 3D effect function
function Card3D(card, ev) {
  let img = card.querySelector("img");
  let imgRect = card.getBoundingClientRect();
  let width = imgRect.width;
  let height = imgRect.height;
  let mouseX = ev.offsetX;
  let mouseY = ev.offsetY;
  let rotateY = map(mouseX, 0, 300, -20, 20);
  let rotateX = map(mouseY, 0, 300, 20, -20);
  let brightness = map(mouseY, 0, 300, 1.5, 0.5);

  img.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
  img.style.filter = `brightness(${brightness})`;
}


this.setTimeout(function () {
  // Find "only" card3d class
  var cards = document.querySelectorAll(".card3d");

  // Pass through value of the card value
  cards.forEach((card) => {
    card.addEventListener("mousemove", (ev) => {
      Card3D(card, ev);
    });

    card.addEventListener("mouseleave", (ev) => {
      let img = card.querySelector("img");

      img.style.transform = "rotateX(0deg) rotateY(0deg)";
      img.style.filter = "brightness(1)";
    });
  });
}, 2010); //Important plz don't touch this :-)

console.log("Testing....")