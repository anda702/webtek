<?php

$PAGES = [
	'sebastian' => [
		'title' => 'Simple Page',
		'price' => '15',
		'discountedPrice' => '10',
		'description' => '<p>This is my nice simple page made for human users.</p>',
		'details' => '<p>This is a generic description.</p>',
		'image' => '/images/color-paint-palette-wall-painting.jpg',
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
		'title' => 'Light Scroller',
		'price' => '20',
		'discountedPrice' => '15',
		'description' => '<p>This is my nice simple page made for human users.</p>',
		'details' => '<p>This is a generic description.</p>',
		'image' => '/images/pexels-photo-28245.jpg',
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
	]
];

foreach ($PAGES as $Page) {
	$Page['rating'] = 0;
	foreach ($Page['reviews'] as $Review) {
		$Page['rating'] += intval($Review['rating']);
	}
	$Page['rating'] /= count($Page['reviews']);
}

?>