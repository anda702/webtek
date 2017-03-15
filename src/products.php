<?php

$PRODUCTS = [
    'mikal' => [
        'title' => "COOL N' Fancy",
        'price' => '35',
        'discountedPrice' => '25',
        'description' => '<p>This is a page that shines among its competitors</p>',
        'details' => '<p>If you want a page that draws a lot of attencion, then this is the site for you</p>',
        'gallery' => [
            [
                'src' => '/images/man-coffee-cup-pen.jpg',
                'alt' => 'Coffee Cup Pen'
            ]
        ],
        'reviews' => [
            [
                'rating' => 1,
                'comment' => 'Is this a joke?'
            ],
            [
                'rating' => 5,
                'comment' => 'Mediocre at best.'
            ],
            [
                'rating' => 10,
                'comment' => 'What are you guys talking about?! This is amazing!!'
            ],
            [
                'rating' => 8,
                'comment' => 'I agree, I love the flashy background.'
            ]
        ]
    ],
    'andreas' => [
        'title' => 'TopRight Ultra',
        'price' => '15',
        'discountedPrice' => '10',
        'description' => '<p>A great site if you want something simple</p>',
        'details' => '<p>If you dont have a lot of information you want to show, this site fits you. It is a simple site that has great color combination and easy to read text.</p>',
        'gallery' => [
            [
                'src' => '/images/pexels-photo-28245.jpg',
                'alt' => 'Nice Photo'
            ]
        ],
        'reviews' => [
            [
                'rating' => 4,
                'comment' => 'How do I navigate the site!'
            ],
            [
                'rating' => 8,
                'comment' => 'Excellent choice of layout and colours.'
            ],
            [
                'rating' => 9,
                'comment' => 'Incredible functionality for such a cheap price!'
            ]
        ]
    ],
    'sebastian' => [
        'title' => 'Mediocre At Best<sup>TM</sup>',
        'price' => '15',
        'discountedPrice' => '10',
        'description' => '<p>This is my nice simple page made for human users.</p>',
        'details' => '<p>This is a generic description.</p>',
        'gallery' => [
            [
                'src' => '/images/man-coffee-cup-pen.jpg',
                'alt' => 'Coffee Cup Pen'
            ]
        ],
        'reviews' => [
            [
                'rating' => 3,
                'comment' => 'Not very good'
            ],
            [
                'rating' => 10,
                'comment' => 'The other guy is clueless! This is perfection.'
            ],
            [
                'rating' => 6,
                'comment' => 'Meh, it does the job.'	
            ]
        ]
    ],
	'stian' => [
		'title' => 'White&Black 3000',
		'price' => '20',
		'discountedPrice' => '15',
		'description' => '<p>This is a white&black theme. It is a clean and sleek-looking webpage made for personal use.</p>',
		'details' => '<p>This is a theme that is intended to be a website about people or maybe even your pet. It can also be used as a blog or product site. You have a navigation bar on the left side, which is always visible and makes it easy to navigate the site.</p>',
		'gallery' => [
			[
				'src' => '/images/theme_sakarias/blog.png',
				'alt' => 'Preview of the blog page.'
			],
			[
				'src' => '/images/theme_sakarias/contact.png',
				'alt' => 'Preview of the contact page.'
			]
		],
		'reviews' => [
			[
				'rating' => 7,
				'comment' => 'Impressive!'
			],
			[
				'rating' => 5,
				'comment' => 'Definitely could be better.'
			],
			[
				'rating' => 9,
				'comment' => 'Almost perfect. Love the navigation bar!'
			]
		]
    ],
    'stian2' => [
        'title' => 'Sweet Silver Mist',
        'price' => '22',
        'discountedPrice' => '19',
        'description' => '<p>This is a more serious verion of the last page</p>',
        'details' => '<p>This is a generic description.</p>',
        'gallery' => [
            [
                'src' => '/images/pexels-photo-28245.jpg',
                'alt' => 'Nice Photo'
            ]
        ],
        'reviews' => [
            [
                'rating' => 4,
                'comment' => 'Boring!'
            ],
            [
                'rating' => 9,
                'comment' => 'Amazing shadows'
            ],
            [
                'rating' => 8,
                'comment' => 'Close to perfect.'
            ]
        ]
    ],
    'theme_sakarias' => [
        'title' => 'Fancy gray',
        'price' => '15',
        'discountedPrice' => '10',
        'description' => '<p>This theme is perfect for a personal website.</p>',
        'details' => '<p>If you want something easy and simple for you personal website, this is the theme for you! This theme futures an easy set up and is very easy to edit and make it your own.</p>',
        'gallery' => [
            [
                'src' => '/images/pexels-photo-265613.jpg',
                'alt' => 'Nice Photo'
            ]
        ],
        'reviews' => [
            [
                'rating' => 10,
                'comment' => 'Best theme from this site.'
            ],
            [
                'rating' => 5,
                'comment' => 'Boring theme.'
            ],
            [
                'rating' => 8,
                'comment' => 'Perfect for my use.'
            ]
        ]
    ],
	
	'jenny' => [
        'title' => 'Green swamp',
        'price' => '33',
        'discountedPrice' => '',
        'description' => '<p>Green swamp brings the damp to your website. </p>',
        'details' => '<p>Perfect for every Slytherin. </p>',
        'gallery' => [
            [
                'src' => '/images/pexels-photo-265613.jpg',
                'alt' => 'Nice Photo'
            ]
        ],
        'reviews' => [
            [
                'rating' => 10,
                'comment' => 'Perfect. '
            ],
            [
                'rating' => 3,
                'comment' => 'Not enough great squid. '
            ],
            [
                'rating' => 2,
                'comment' => 'Too much damp. '
            ]
        ]
    ]
];

// Calculate average ratings
foreach ($PRODUCTS as &$Product) {
    $Product['rating'] = 0;
    foreach ($Product['reviews'] as $Review) {
        $Product['rating'] += intval($Review['rating']);
    }
    $Product['rating'] /= count($Product['reviews']);
}
?>