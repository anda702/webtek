<?php

$PRODUCTS = [
	'mikal' => [
		'title' => "COOL N' Fancy",
		'price' => '35',
		'discountedPrice' => '25',
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
		'title' => 'Stian Pro 3000',
		'price' => '20',
		'discountedPrice' => '15',
		'description' => '<p>This is my nice simple page made for human users.</p>',
		'details' => '<p>This is a generic description.</p>',
		'gallery' => [
			[
				'src' => '/images/pexels-photo-28245.jpg',
				'alt' => 'Nice Photo'
			]
		],
		'reviews' => [
			[
				'rating' => 7,
				'comment' => 'Impressive!'
			],
			[
				'rating' => 4,
				'comment' => 'Definitely could be better.'
			],
			[
				'rating' => 9,
				'comment' => 'Almost perfect.'
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