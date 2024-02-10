<?php
function getUser() : array {
  return [
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
}

function getUserSports(array $user)
{
  $sports = [];
  foreach ($user['hobbies'] as $hobby) {
    if ($hobby['type'] == 'sport') {
      $sports[] = $hobby['name'];
    }
  }
  return $sports;
}