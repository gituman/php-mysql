<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <style>
        *{
            padding: 0;
            margin: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
        nav{
            background: red;
            height: 80px;
            weight: 100px;
        
        }
        nav ul{
            float: right;
            margin-right: 20px;
        }
        nav ul li{
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;

        }
        nav ul li a{
            color: white;
            font-size: 17px;
            padding: 7px 13px;
            border-radius: 3px;
            text-transform: uppercase;
        }
        a.active,a.hover{
          background: blue;
          transition: .5s;  
        }

    </style>
  </head>
  <body >
  <nav>

  <ul>
  
           <li><a href="index.php">home</a></li>
            <li><a href="#">leaderboards</a>
               <ul>
                  <li><a href="fifa.php">fifa</a></li>
                   <li><a href="cod.php">cod</a></li>
                   <li><a href="mk.php">mk</a></li>
                 </ul>
                    </li>
                  <li><a href="tournament.php">tournaments</a></li>
                  <li><a href="wage.php">wagers</a></li>
                  <li><a href="wallet.php">wallet</a></li>
                  <a href="index.php?logout=1" style="color: red">Logout</a>
          </ul>
    </ul>
  
</nav>
</body>
