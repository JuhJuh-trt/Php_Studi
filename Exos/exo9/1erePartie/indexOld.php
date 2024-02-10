<?php
  $user = [
    'name' => 'John',
    'language' => 'fr',
    'hobbies' => [
      [
        'name' => 'piano',
        'type' => 'music'
      ],
      [
        'name' => 'volley-ball',
        'type' => 'sport'
      ],
      [
        'name' => 'tennis',
        'type' => 'sport'
      ],
      [
        'name' => 'saxophone',
        'type' => 'music'
      ],
    ]
  ];
  ?>
<html>
  <head></head>
  <body>
    <h1>
      <?php
        if ($user['language'] === 'fr') {
          echo 'Bonjour '.$user['name'].'!';
        } else {
          echo 'Hello '.$user['name'].'!';
        }
      ?>
    </h1>
    <div>
      <?php
        if ($user['language'] === 'fr') {
          echo 'Sports préférés :';
        } else {
          echo 'Favorites sports :';
        }
      ?>
      <ul>
        <?php
          foreach ($user['hobbies'] as $hobby) {
            if ($hobby['type'] == 'sport') {
              echo '<li>'.$hobby['name'].'</li>';
            }
          }
        ?>
      </ul>
    </div>
  </body>
</html>