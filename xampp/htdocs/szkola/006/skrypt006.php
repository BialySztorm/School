<html>

<head>
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css2?family=Bilbo+Swash+Caps&display=swap" rel="stylesheet">
</head>

<body>
   <div class="t1">Kalkulator</div>
   <div class="t2">V2.1 Alpha</div>
   <div class="t3">by Andrzej Manderla</div>
   <div class="calosc">
      <form method="POST" action="" class="inne">
         <span><input class="liczba" type="text" name="liczba1" size="10" value="<?php if (isset($_POST['liczba1'])) {
                                                                                    if ($_POST['liczba1']) {
                                                                                       echo $_POST['liczba1'];
                                                                                    }
                                                                                 } ?>">
            <select name="znak">
               <option <?php if (isset($_POST['znak'])) {
                           if (($_POST['znak']) == "+") {
                              echo 'selected="selected"';
                           }
                        } ?>>+</option>
               <option <?php if (isset($_POST['znak'])) {
                           if (($_POST['znak']) == "-") {
                              echo 'selected="selected"';
                           }
                        } ?>>-</option>
               <option <?php if (isset($_POST['znak'])) {
                           if (($_POST['znak']) == "*") {
                              echo 'selected="selected"';
                           }
                        } ?>>*</option>
               <option <?php if (isset($_POST['znak'])) {
                           if (($_POST['znak']) == "/") {
                              echo 'selected="selected"';
                           }
                        } ?>>/</option>
            </select>
            <input class="liczba" type="text" name="liczba2" size="10" value="<?php if (isset($_POST['liczba2'])) {
                                                                                 if ($_POST['liczba2']) {
                                                                                    echo $_POST['liczba2'];
                                                                                 }
                                                                              } ?>"></span>
         <span class="historia1"><input type="text" name="historia" size="10" value="<?php
                                                                                       if (isset($_POST['liczba1']) && isset($_POST['liczba2']) && isset($_POST['znak'])) {
                                                                                          if (!is_numeric($_POST['liczba1']) || !is_numeric($_POST['liczba2'])) {
                                                                                             echo $_POST['historia'];
                                                                                          } else {
                                                                                             $liczba1 = $_POST['liczba1'];
                                                                                             $liczba2 = $_POST['liczba2'];
                                                                                             $znak = $_POST['znak'];
                                                                                             $wynik = "";
                                                                                             $prawie_wynik = 1;
                                                                                             if ($znak == "+")
                                                                                                $wynik = $liczba1 + $liczba2;
                                                                                             elseif ($znak == "-")
                                                                                                $wynik = $liczba1 - $liczba2;
                                                                                             elseif ($znak == "*")
                                                                                                $wynik = $liczba1 * $liczba2;
                                                                                             elseif ($znak == "/") {
                                                                                                if ((int) $liczba2 == 0)
                                                                                                   $wynik = "Inf / -Inf";
                                                                                                else
                                                                                                   $wynik = $liczba1 / $liczba2;
                                                                                             }

                                                                                             echo $_POST['historia'] . "<br>" . $liczba1 . $znak . $liczba2 . "=" . $wynik;
                                                                                          }
                                                                                       }
                                                                                       ?>"></span>
         <div><input class="enter" type="submit" value="Oblicz"></div>
      </form>
      <?php
      if (isset($_POST['liczba1']) && isset($_POST['liczba2']) && isset($_POST['znak'])) {
         if (!is_numeric($_POST['liczba1']) || !is_numeric($_POST['liczba2']))
            echo '<span class="wynik liczba">Nie wprowadzono danych</span>';
         else {
            $liczba1 = $_POST['liczba1'];
            $liczba2 = $_POST['liczba2'];
            $znak = $_POST['znak'];
            $wynik = "";
            $prawie_wynik = 1;
            if ($znak == "+")
               $wynik = $liczba1 + $liczba2;
            elseif ($znak == "-")
               $wynik = $liczba1 - $liczba2;
            elseif ($znak == "*")
               $wynik = $liczba1 * $liczba2;
            elseif ($znak == "/") {
               if ((int) $liczba2 == 0)
                  $wynik = "Inf / -Inf";
               else
                  $wynik = $liczba1 / $liczba2;
            }

            echo '<span class="wynik liczba">' . $wynik . '</span>';
         }
      }
      ?>
   </div>
   <div class="historia3 ">Historia </div>
   <input type="checkbox" id="checks1" name="checks">
   <?php
   if (isset($_POST['historia'])) {
      $history = $_POST['historia'];
      echo '<div class="historia2 ">' . $history . '</div>';
   }
   ?>



</body>

</html>