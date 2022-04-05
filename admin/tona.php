<DOCTYPE html>
<html>
<head>
<title>tournament creation</title>
<style>
  body{
      background-color: #81ecec;

  }
  .container{
      background-color: whitesmoke;
      box-shadow: 1px 1px 2px 1px grey;
      padding: 50px 28px 50px 38px;
      width: 30%;
      height: 65%;
      margin-left: 35%;
  }
.txt{
    width: 100%;
    height: 5%;
    border: 1px solid brown;
    border-radius: 05px;
    padding: 20px 15px 20px 15px;
    margin: 10px 0px 15px 0px;
}

  </style>
</head>
<body>
<center><h2>tournament creation</h2></center>
<div class="container">
<form id="wagers" method="POST" action="tonaat.php">
<label>tournament name</label><br>
<input type="text" class="txt" name="torn" placeholder="enter tournament name"><br>
<label>game</label><br>
<input type="text" class="txt" name="game" placeholder="enter game to be played"><br>
<label>participants</label><br>
<input type="number" class="txt" name="pat" placeholder="enter tournament patricipants"><br>
<label>grand prize</label><br>
<input type="number" class="txt" name="prize" placeholder="enter grand prize"><br>
<label>start date</label><br>
<input type="text" class="txt" name="date" placeholder="enter start date"><br>
   </select><br><br>
   <input type="submit" name="submit" class="txt" value="submit" id="button"></br>
   </form>
   </div>
   </body>

 