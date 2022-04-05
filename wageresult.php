<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
  body{
      background-color: red;

  }
  .container{
      background-color: whitesmoke;
      box-shadow: 1px 1px 2px 1px grey;
      padding: 50px 28px 50px 38px;
      width: 30%;
      height: 55%;
      margin-left: 35%;
  }.txt{
    width: 80%;
    height: 5%;
    border: 1px solid brown;
    border-radius: 05px;
    padding: 20px 15px 20px 15px;
    margin: 10px 0px 15px 0px;
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
}
  </style>
</head>
<body>
<ul>
<li><a href="mywager.php">my wagers</a></li>
</ul>
<center><h2>wager result</h2></center>  
    <div class = "container">
        <form action="wagecontroller.php" method="post">
        
        <label>wager id</label></br>
            <input type="number" class="txt" name="number" 
            placeholder="enter the wager id" required></br>

     
          <label>winner</label><br> 
          <input type="text" class="txt" name="winner" 
            placeholder="enter wager winner" required></br>
  
        <br/><br/>
        <label>loser</label><br> 
          <input type="text" class="txt" name="loser" 
            placeholder="enter wager loser" required></br>
          
  
      <br/><br/>
      
      <label>complaint</label><br> 
          <input type="text" class="txt" name="comp" 
            placeholder="enter complaint" required></br>
          
  
      <br/><br/>
        <input type="submit" class="txt" name="submit" value="submit values">
</form>
</div>
</body>
</html>