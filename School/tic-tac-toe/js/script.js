//Javascript
//Set up
var markers = ["X", "O"];
var whoseTurn = [0];
var players = [];
var totals = [];
var winCodes = [7,56,73,84,146,273,292,448];
var gameOver = false;
var gameTied = false;
var audio = new Audio('../audio/win-sound.wav');
players[0] = prompt("Enter Player 1 Name")
players[1] = prompt("Enter Player 2 Name")

//Allows the script to stay in the head
function startGame()
{
    var counter = 1;
    var innerDivs = "";
    for (i = 1; i <= 3; i++) {
        innerDivs += '<div id="row-' + i + '">';

        for (j = 1; j <=3; j++) {
            innerDivs += '<div class="cell" onclick="playGame(this,' + counter + ');"></div>';
            counter *= 2;
        }

        innerDivs += '</div>';
    }
    document.getElementById("game-board").innerHTML = innerDivs;
    totals = [0, 0];
    gameOver = false;
    document.getElementById("status").innerText = "It's " + players[whoseTurn] + "'s Turn";
}

function playGame(clickedDiv, divValue)
{
    console.log(totals);
    //Check win
    if (!gameOver)
    {
    document.getElementById("status").innerText = "It's " + players[whoseTurn] + "'s Turn";
    //Add X or O
    clickedDiv.innerText = markers[whoseTurn];

    //Count for win
    totals[whoseTurn] += divValue;

    //Call win function
    isWin()
    
    //For alternating turn
    if (whoseTurn == 0) whoseTurn = 1; else whoseTurn = 0;

    //Prevents interacting again
    clickedDiv.attributes["0"].nodeValue = "";

    clickedDiv.style.fontSize = "120px"
    clickedDiv.style.textAlign = "center"
    }
}

function isWin() {
    winCodes.forEach(code => {
        if (totals[whoseTurn] === code) {
            gameOver = true;
            document.getElementById("status").innerText = players[whoseTurn] + " Wins!";
            audio.play();

        } else if (totals[0] + totals[1] === 511) {
            gameOver = true;
            document.getElementById("status").innerText = players[whoseTurn] + " Tie!"; 
        }
    })
}

