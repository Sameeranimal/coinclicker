<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Clicker</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
     <header>
        <nav>


            <div><button onclick="overlayOn('invest')" id="investButton"><a>INVEST</a></button></div>
            <div><button id="loginButton" onclick="overlayOn('login')"><a>LOGIN</a></button></div>
        </nav>
     </header>
     <main onmouseover="overlayOff('invest') ; overlayOff('login') ; overlayOff('achievements') ">
        <canvas id="canvas"></canvas>
        <div class="action-space">
          <div id="in-part1">I</div>
          <div id="in-part2">II</div>
          <div id="in-part3">III</div>
          <div id="in-part4">IV</div>
        </div>
        <div class="items backpain">
          <style>
            .backpain {
              background-image: url('img/itemsbackground.png');
              background-position: -125px -120px;
           
            }
            </style>

           <div class="amount_glass"> <div class="amount"><p id="score"></p></div> </div>
           <button class="logo" onclick="add()"><img draggable="false" src="img/logo.png"></button>



        </div>
        <div class="icons">
            <button class="settings"><img src="img/settings.png" class="settings"></button>
            <button id="achievementsButton" onclick="overlayOn('achievements')">Achievements</button>
        </div>
        <div id="invest" >
            <div class="close" onclick="overlayOff('invest')">Close</div>
            <ul id="invest-left">
                <h1>INVEST</h1>
                <table>
                    <tr>
                      <tH class="bigger"> <span id="DIT">0</span> DITCOIN  </tH>
                      <td>  [<span id="coincost">50</span>]  </td>
                      <td> <button onclick = "buyCoins()">Buy</button> </td>
                      <td class="tableimg"> img </td>
                    </tr>
                    <tr>
                      <th class="bigger">DECACOIN</th>
                      <td> xxx </td>
                      <td> <button class="buybut">Buy</button> </td>
                      <td class="tableimg"> img </td>
                    </tr>
                    <tr>
                      <th class="bigger">DIX</th>
                      <td> xxx </td>
                      <td> <button class="buybut">Buy</button> </td>
                      <td class="tableimg"> img </td>
                    </tr>
                  </table>
            </ul>
            <ul id="invest-middle">
                <h2>SHARES</h2>
                <table>
                    <tr>
                      <th class="bigger">GOLD</th>
                      <td> xxx </td>
                      <td> <button class="buybut">Buy</button> </td>
                      <td class="tableimg"> img </td>
                    </tr>
                    <tr>
                      <th class="bigger">DECACOIN</th>
                      <td> xxx </td>
                      <td> <button class="buybut">Buy</button> </td>
                      <td class="tableimg"> img </td>
                    </tr>
                    <tr>
                      <th class="bigger">GAS</th>
                      <td> xxx </td>
                      <td> <button class="buybut">Buy</button> </td>
                      <td class="tableimg"> img </td>
                    </tr>
                  </table>
            </ul>
        </div>
        <div id="login" >
          <div class="close" onclick="overlayOff('login')">Close</div>
              <div class="tab-bar">
                <button class="tab-item tab-button" onclick="openTab('Login')">Login With An Account</button>
                <button class="tab-item tab-button" onclick="openTab('Register')">Create An Account</button>
              </div>


              <div id="Login" class="tab-container tab">
                <form action="php/login.php" method="POST" class="meContainer2">
                  <div class="form-group">

                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="height: 50px; width: 300px; text-align: center; font-size: 20px;  margin-bottom: 20px;" required>
                  </div>
                  <div class="form-group">

                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" style="height: 50px; width: 300px; text-align: center; font-size: 20px;  margin-bottom: 20px;" required>
                  </div>
                  <button type="submit" class="btn btn-primary" style="height: 50px; width: 200px; text-align: center; font-size: 30px;  margin-bottom: 20px;">Login</button>
                </form>
              </div>


          
              <div id="Register" class="tab-container tab" style ="display:none;">
                <form action="php/formhandler.php" method = "post" class="meContainer23">
                  <input type= "text" name = "username" placeholder = " Username" style="height: 50px; width: 300px; text-align: center; font-size: 20px;  margin-bottom: 20px;">
                  <input type= "password" name = "pwd" placeholder = "Password" style="height: 50px; width: 300px; text-align: center; font-size: 20px;  margin-bottom: 20px;">
                  <input type= "text" name = "email" placeholder = " E-Mail" style="height: 50px; width: 400px; text-align: center; font-size: 30px;  margin-bottom: 20px;">
                  <button style="height: 50px; width: 200px; text-align: center; font-size: 30px;  margin-bottom: 20px;"> SignUp </button> 
                  
              </form>
              </div>
      </div>
       
<!--style="height: 50px; width: 300px; text-align: center; font-size: 30px;  margin-bottom: 20px;">-->

        <div id="achievements" >
            <div class="close" onclick="overlayOff('achievements')">Close</div>
            <div id="achievementList">
              <div id="achievementItem">
                <label for="achievement100"> Achieved 100 score! </label>
                <input type="checkbox" id="achievement100" disabled>
              </div>
              <div id="achievementItem"> 
                <label for="achievement1k"> Achieved 1000 score! </label>
                <input type="checkbox" id="achievement1k" disabled>
                </div>
              <div id="achievementItem"> 
                <label for="achievement10k"> Achieved 10,000 score! </label>
                <input type="checkbox" id="achievement10k" disabled>
              </div>
              <div id="achievementItem"> 
                <label for="achievement50k"> Achieved 50,000 score! </label>
                <input type="checkbox" id="achievement50k" disabled>
              </div>
              <div id="achievementItem"> 
                <label for="achievement100k"> Achieved 100,000 score! </label>
                <input type="checkbox" id="achievement100k" disabled>
              </div>
              <div id="achievementItem"> 
                <label for="achievement1mil"> Achieved 1,000,000 score! </label>
                <input type="checkbox" id="achievement1mil" disabled>
              </div>
            </div>
        </div>
     </main>
     <footer>
        
     </footer>
     <script src="javascript/value.js"></script>
     <script src="javascript/overlay.js"></script>
     <script src="javascript/particles.js"></script>
     <script src="javascript/tab.js"></script>
     <script src="javascript/achievement.js"></script>
     <script src="javascript/session.js"></script>





 
</body>
</html>
