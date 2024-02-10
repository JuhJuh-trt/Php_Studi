<div>
  <h3><?php echo $platTitle; ?></h3>
  <div>Temps de préparation : <?php echo $temps; ?> minutes</div>
  <div>Difficulté :<?php
      
      for ($number = 0; $number < $difficulty; $number++) {
        echo '*';
      }
    ?>
  </div>
</div>