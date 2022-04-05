<DOCTYPE html>
<html>
<head>
<title>wager creation</title>
<style>
  body{
      background-color: #81ecec;

  }
  .container{
      background-color: whitesmoke;
      box-shadow: 1px 1px 2px 1px grey;
      padding: 50px 28px 50px 38px;
      width: 30%;
      height: 55%;
      margin-left: 35%;
  }
.txt{
    width: 100%;
    height: 5%;
    border: 1px solid brown;
    border-radius: 05px;
    padding: 20px 15px 20px 15px;
    margin: 10px 0px 15px 0px;s
}
ul{
   margin: 0px;
   padding: 0px;
   list-style: none;
}
ul li{
    float: right;
    width: 200px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    font-size: 20px;
    background-color: blue;
}
ul li a{
     text-decoration: none;
     color: black;
     display: block;
}  </style>
</head>
<body>
<ul>
<li><a href="wage.php"> wagers</a></li>
</ul>
<center><h2>wager creation</h2></center>
<div class="container">
<form id="wagers" method="POST" action="wagermanage.php">

<label>select game</label><br>
 <select name="game" >
 <option value="" >--selectgame--</option>s
   <option value="fifa">fifa</option>
   <option value="cod">callofduty</option>
   <option value="mk">mortalkombat</option></br>
   </select>
   </br>
   <label>select amount</label><br>
   <input type="number" class="txt" name="amount" placeholder="enter amount">
   <input type="submit" name="submit" class="txt" value="submit" id="button"></br>
   </form>
   </div>
   </body>

  