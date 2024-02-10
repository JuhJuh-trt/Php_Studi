<html>
  <head></head>
  <body>
    <h1>
      <?php
        echo WELCOME_TEXT.' '.$user['name'].' !';
      ?>
    </h1>
    <div>
      <?php
        echo SPORTS_TEXT; 
      ?>
      <ul>
        <?php
          foreach ($sports as $sport) {
            echo '<li>'.$sport.'</li>';
          };
        ?>
      </ul>
    </div>
  </body>
</html>