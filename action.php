<?php $numbers = explode(',', $_POST['numbers']);
      function increasing($arr, $length) {
          $result = true;
          for ($i = 0; $i < $length - 1; $i++) {
              if ($arr[$i] <= $arr[$i + 1]) {
                  $result = true;
              }
              else {
                  return false;
              }
          }
          return $result;
      }  
      if (isset($_POST['first'])) {
        $arrayLength = count($numbers);
        $inc = increasing($numbers, $arrayLength);
        if (!$inc) {
            $i = 0;
            $found = false;
            $result = null;
            while ($i < $arrayLength  && $found == false) {
                $removed = $numbers;
                unset($removed[$i]);
                $newNumbers = array_values($removed);
                if (increasing($newNumbers, $arrayLength - 1)) {
                    $found = true;
                    $result = $i;

                }
                $i++;
            }
            if ($found) {
                echo 'Rasta '.$newNumbers[$result];
            } else echo 'Nerasta';


        } else echo 'Didejanti';
        echo '<br/>';
      }
      if (isset($_POST['second'])) {
          $arrayLength = count($numbers);
          $max = null;
          for ($i = 0; $i < $arrayLength - 1; $i++ ) {
            $newMax = $numbers[$i] * $numbers[$i + 1];
            if ($newMax > $max) $max = $newMax;
          }
          echo 'Didžiausia sandauga: '.$max;
          echo '<br/>';
      }
      if (isset($_POST['third'])) {
          $arrayLength = count($numbers);
          function factors($number) {
              $count = 0;
              for ($i = 1; $i <= $number; $i++) {
                if ($number % $i == 0) {
                    $count++;
                }
              }
              return $count;
          }
          $primes = [];
          $compounds = [];
          for ($i = 0; $i < $arrayLength; $i++) {
              if (factors($numbers[$i]) > 2) {
                array_push($compounds, $numbers[$i]);
              } else {
                  array_push($primes, $numbers[$i]);
              }
          }
          echo 'Pirminiai: '.implode(', ',$primes).' ';
          echo 'Sudetiniai: '.implode(', ',$compounds);
      }

?>