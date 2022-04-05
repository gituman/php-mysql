<!DOCTYPE html>
<html lang="en">
    <head>
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
  }.txt{
    width: 80%;
    height: 5%;
    border: 1px solid brown;
    border-radius: 05px;
    padding: 20px 15px 20px 15px;
    margin: 10px 0px 15px 0px;
}
  </style>
</head>
<body>
<center><h2>game selection</h2></center>  
    <div class = "container">
        <form action="gamescontroller.php" method="post">
        
       

     
          <label>fifa 20</label><br> 
            <input type="radio" name="fifa"  value="yes" required> yes
            <input type="radio" name="fifa"  value="no"> no
  
        <br/><br/>
        
          <label>mortalkombat</label> <br>
            <input type="radio" name="mortalkombat"  value="yes" required> yes
            <input type="radio" name="mortalkombat"  value="no"> no
  
      <br/><br/>
      
          <label>callofduty</label><br> 
            <input type="radio" name="callofduty"  value="yes" required> yes
            <input type="radio" name="callofduty"  value="no"> no
            <br/><br/>
        <input type="submit" class="txt" name="submit" value="submit values">
</form>
</div>
</body>
</html>