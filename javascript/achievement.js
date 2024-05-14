function checkAchievements(score) {
    console.log("Checking achievements for score:", score);
    if (score >= 100) {
        console.log("Achievement: 100");
        document.getElementById('achievement100').checked = true;
    }
    if (score >= 1000) {
        console.log("Achievement: 1000");
        document.getElementById('achievement1k').checked = true;
    }
    if (score >= 10000) {
        console.log("Achievement: 10000");
        document.getElementById('achievement10k').checked = true;
    }
    if (score >= 50000) {
        console.log("Achievement: 50000");
        document.getElementById('achievement50k').checked = true;
    }
    if (score >= 100000) {
        console.log("Achievement: 100000");
        document.getElementById('achievement100k').checked = true;
    }
    if (score >= 1000000) {
        console.log("Achievement: 1000000");
        document.getElementById('achievement1mil').checked = true;
    }
}

function add() {
    console.log("Score before increment:", score);
    score++;
    console.log("Score after increment:", score);
    document.getElementById("score").innerHTML = score + "D";
    checkAchievements(score);
}
