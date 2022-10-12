//Javascript
var num = 0;
var lotto = [];
var lottoPicks ="";

// Prompt numbers
num = prompt("How many numbers would you like to select? *Up to 8*");

// Check number count
if (num >= 8) {
    alert("Less numbers")
    window.location.reload();
}

// Generate numbers
for (var i = 0; i < num; i++) {
    lotto[i] = Math.floor(Math.random() * 100);
}

// Append numbers
for (var i = 0; i < lotto.length; i++) {
    if (i === lotto.length - 1) {
        lottoPicks += lotto[i];
    } else {
        lottoPicks += lotto[i] + "-";
    }
}

// Output numbers
console.log(lottoPicks);
const output = document.getElementById("display-stuff");
output.innerHTML = lottoPicks;