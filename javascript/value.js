var score = 0;

var coinCost = 50;
var DIT = 0;

function buyCoins() {
  if (score >= coinCost){
  score = score - coinCost;
  DIT = DIT + 1;
  coinCost =  Math.round(coinCost * 1.25);
  document.getElementById("coincost").innerHTML = coinCost; 
  document.getElementById("score").innerHTML = score + "D"; 
  document.getElementById("DIT").innerHTML = DIT; 
  }
}

setInterval ( function(){
  score=score + DIT
  document.getElementById("score").innerHTML = score + "D"; 
},1000) ;



function add() {
  score++;
  document.getElementById("score").innerHTML = score + "D"; 
  sessionStorage.setItem("score", score);
}

