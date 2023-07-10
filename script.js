var range = document.getElementById("slider");
var bubble = document.getElementById("sliderOutput");
var usd = document.getElementById("usd");
var followerInput = document.getElementById("follower-input");

range.addEventListener("input", () => {
  setBubble(range.value, bubble);
  followerInput.value = addCommas(range.value);
});

followerInput.addEventListener("input", () => {
  var inputValue = followerInput.value.replace(/,/g, ''); // Remove existing commas, if any
  var parsedValue = parseInt(inputValue);
  if (!isNaN(parsedValue) && parsedValue >= 100 && parsedValue <= 1000000) {
    setBubble(parsedValue, bubble);
    range.value = parsedValue;
    followerInput.value = addCommas(parsedValue);
  }
});

function addCommas(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function setBubble(range, bubble) {
  var followers = range;
  var min = range.min ? range.min : 100;
  var max = range.max ? range.max : 1000000;
  var newVal = Number(((followers - min) * 100) / (max - min));

  var monthly = Math.trunc(followers * 0.004 * 20); // MONTHLY VALUE
  usd.innerHTML = `$ ${addCommas(monthly)}`; // CHANGING HTML VALUE
  bubble.innerHTML = `${addCommas(followers)} Followers`; // CHANGING BUBBLE INDICATOR VALUE

  // Sorta magic numbers based on size of the native UI thumb
  bubble.style.left = `calc(${newVal}% + (${-56 - newVal * 0.33}px))`;
}
