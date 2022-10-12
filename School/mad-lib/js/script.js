var noun1 = prompt("Enter a noun");
var noun2 = prompt("Enter a different noun");
var verb1 = prompt("Enter a verb");
var verb2 = prompt("Enter a different verb");
var adjective1 = prompt("Enter a adjective");
var adjective2 = prompt("Enter a different adjective");
alert("Went for a drive in my " + noun1 + ". It was a lovely day so I decided to stop and enjoy the scenery. That's when I realized I forgot my "
+ noun2 + " I then " + verb1 + " to go get it. After I got it I Then " + verb2 + " back to where. I was feeling " + adjective1
+ ". Regardless it was all and all a " + adjective2 + " day.");

const output = document.getElementById("madlib");
output.innerHTML = "Went for a drive in my " + noun1 + ". It was a lovely day so I decided to stop and enjoy the scenery. That's when I realized I forgot my "
+ noun2 + " I then " + verb1 + " to go get it. After I got it I Then " + verb2 + " back to where. I was feeling " + adjective1
+ ". Regardless it was all and all a " + adjective2 + " day.";