<DOCTYPE html>
<html>
<head>
<title>award points</title>
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
    width: 40%;
    height: 5%;
    border: 1px solid brown;
    border-radius: 05px;
    padding: 20px 15px 20px 15px;
    margin: 10px 0px 15px 0px;
}

  </style>
</head>
<body>
<center><h2>award points</h2></center>
<div class="container">
<form  method="POST" action="poncon.php">
<label> username</label><br>
<input type="text" class="txt" name="username" placeholder="enter username"><br>
<label> fifa points</label><br>
<input type="number" class="txt" name="fifa" placeholder="enter fifa points"><br>
<label> call of duty points</label><br>
<input type="number" class="txt" name="cod" placeholder="enter cod points"><br>
<label> mortal kombat points</label><br>
<input type="number" class="txt" name="mk" placeholder="enter mk points"><br>
   </select><br><br>
   <input type="submit" name="submit" class="txt" value="submit" id="button"></br>
   </form>
   </div>
   </body>

  