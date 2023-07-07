const container = document.querySelector(".container");
const startBtn = document.querySelector(".startBtn");
const zakoncz = document.querySelector("#polowanie_wynik");
const terrorist = document.createElement("img");
terrorist.setAttribute("class", "terrorist");
terrorist.setAttribute("src", "grafika/mysz.png");

const contHeight = container.offsetHeight;
const contWidth = container.offsetWidth;

setInterval(() => {
  const randTop = Math.random() * (contHeight - 100);
  const randLeft = Math.random() * (contWidth - 100);

  terrorist.style.position = "absolute";
  terrorist.style.top = randTop + "px";
  terrorist.style.left = randLeft + "px";
}, 800);

let score = 0;

startBtn.addEventListener("click", () => {
  container.appendChild(terrorist);

  startBtn.innerHTML= "<p class='nagroda'>Nagroda: "+score+"</p><img src='grafika/coin.png' class='coins_gra'>";
});

window.addEventListener("click", (e) => {

  if (e.target === terrorist) score++;
  startBtn.innerHTML = "<div class='nagroda'><p>Nagroda: "+score+"</p><img src='grafika/coin.png' class='coins_gra'></div>";
});

zakoncz.addEventListener("click", () => {
    window.location = "http://localhost/STUDIA-Podstawy_Technologii_WWW-PROJEKT/aktualnosci.php?wynik="+score+"";
});
  