<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\materialicons\MD;

return [
  [
    'icon' => MD::icon('home'),
    'label' => 'Dashboard',
    'badge' => Html::tag('span', 'New', ['class' => 'label label-primary']),
    'items' => [
      [
        'icon' => MD::icon('timeline'),
        'label' => 'Charts',
        'url' => ['dashboard/chart'],
        'badge' => Html::tag('span', '4', ['class' => 'label label-warning'])
      ],
      [
        'icon' => MD::icon('lightbulb-outline'),
        'label' => 'Idea',
        'url' => ['dashboard/idea']
      ],
      [
        'icon' => MD::icon('dvr'),
        'label' => 'Projects',
        'url' => ['dashboard/project']
      ]
    ]
  ],
  [
    'label' => 'Features'
  ],
  [
    'icon' => FA::icon('diamond')->fixedWidth(),
    'label' => 'UI Features',
    'items' => [
      [
        'label' => 'Grid System',
        'url' => ['feature/grid'],
      ],
      [
        'label' => 'General Components',
        'url' => ['feature/general-component'],
      ],
      [
        'label' => 'Buttons',
        'url' => ['feature/button'],
      ],
    ]
  ],
  [
    'icon' => FA::icon('puzzle-piece')->fixedWidth(),
    'label' => 'Components',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => '#',
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Heading 2'
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => ['test/index'],
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
  [
    'icon' => '',
    'label' => 'Menu Level 1',
    'items' => [
      [
        'icon' => '',
        'label' => 'Menu Level 2',
        'url' => ['site/site'],
        'items' => [
          [
            'icon' => '',
            'label' => 'Menu Level 2',
            'url' => '#',
          ],
          [
            'icon' => '',
            'label' => 'Menu Level 2 Again',
            'url' => '#',
          ],
        ]
      ],
      [
        'icon' => '',
        'label' => 'Menu Level 2 Again',
        'url' => '#',
      ],
    ]
  ],
];
