//Javascript
var audio = new Audio('audio/sonic-ring.mp3');
var quote = ["The journey of a thousand miles begins with one step.", "That which does not kill us makes us stronger.", "Life is what happens when you’re busy making other plans.", "When the going gets tough, the tough get going.", "You must be the change you wish to see in the world.", "You only live once, but if you do it right, once is enough.", "Tough times never last but tough people do."]

document.getElementById("sound").addEventListener("mouseover", () => {
    audio.play()
})

document.getElementById("quote").addEventListener("click", () => {
    console.log("anything");
    audio.play()
    document.getElementById("show-quote").innerHTML = quote[Math.floor(Math.random()*quote.length)];
})