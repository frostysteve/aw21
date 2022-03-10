<?php

return [
  'debug' => true,
  'panel' =>[
    'install' => false
  ],
  'cache' => [
    'pages' => [
        'active' => false
    ]
    ],
  'thumbs' => [
    'srcsets' => [
      'driver' => 'im',
      'default' => [
        '300w' => ['width' => 300, 'quality' => 70],
        '800w' => ['width' => 800, 'quality' => 90],
        '1024w' => ['width' => 1024, 'quality' => 90],
        '1440w' => ['width' => 1440, 'quality' => 90],
        '2048w' => ['width' => 2048, 'quality' => 90]
      ]
  ]
  ]
];

?>