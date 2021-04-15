<html>
  <head> 
    <title>Guess The Number Game</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@900&family=Baloo+2:wght@300&display=swap" rel="stylesheet"> 
</head>
    <body>
      <div class="wrapper">
        <header>
          <h1> Guess The Number </h1>
        </header>
      
        <section class="form">
          <form action="" method="post">
            <label>Pick a number between 0 and 100:</label>
            <input type="number" name="number" autofocus="autofocus" required>
          </form>
        </section>

        <section class="php">
          <?php 
            session_start();

            $random = $_SESSION["rand"] ?? rand(1, 100);
            $_SESSION["rand"] = $random;
            // echo $random . "<br>";

            $number = $_POST["number"];


            if($number == null){   //Als er op try again geklikt wordt, begint counter op 0
              if(!isset($_SESSION["counter"])){
                $_SESSION["counter"] = 0;
              } else {
                $_SESSION["counter"]++ ;
              }
            } else{               //Als er direct een getal ingevoerd wordt, begint counter op 1
              if(!isset($_SESSION["counter"])){
                $_SESSION["counter"] = 1;
              } else {
                $_SESSION["counter"]++ ;
              }
            }

            // if condition user variabel == random number, echo congrats
            if ($number == null){
              echo "Start guessing";
            } elseif($number == $random){
              echo "You have guessed " . $_SESSION["counter"] . " times!<br>";
              echo "Congratulations, you guessed the correct number: " . "$random!";
              session_destroy();
              echo "<a href='gtn.php'><br><br>Try again</a><br><br><br>";
              echo '<iframe src="https://giphy.com/embed/kyLYXonQYYfwYDIeZl" width="480" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/sesamestreet-sesame-street-50th-anniversary-kyLYXonQYYfwYDIeZl">via GIPHY</a></p>';
              
              // else condition user variabel < random number, guess again, higher
            } elseif ($number < $random) {
              echo "You have guessed " . $_SESSION["counter"] . " times.<br>";
              echo "Try again with a <b>higher</b> number!<br>";
            }
              // else guess again, lower
            else {
              echo "You have guessed " . $_SESSION["counter"] . " times.<br>";
              echo "Try again with a <b>lower</b> number!<br>";
            }

            if($number == true){
              if(!isset($_SESSION["guesses"])){
                $guesses = array();
                array_push($guesses, $number);
                $_SESSION["guesses"] = $guesses;
              } else {
                array_push($_SESSION["guesses"], $number);
              }
            }


            echo "<br>You have guessed the following numbers:<br>";
            foreach($_SESSION["guesses"] as $guess){
              echo "- " . $guess . "<br>";
            }

          ?>

        </section>
      </div>
    </body>
</html>