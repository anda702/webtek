<?php

$ACTIVE_PAGE = '';
$ACTIVE_PRODUCT = '';

function PrintRating($Rating) {
	$WholeStars = $Rating / 2;
	$HalfStars = $Rating % 2;
	if ($HalfStars != 0) {
		$WholeStars--;
	}
	for ($i = 0; $i < $WholeStars; $i++) {
		echo '<i class="fa fa-star"></i>';
	}
	if ($HalfStars != 0) {
		$WholeStars++;
		echo '<i class="fa fa-star-half-o"></i>';
	}
	for ($i = $WholeStars + $HalfStars; $i < 5; $i++) {
	   echo '<i class="fa fa-star-o"></i>';
	}
}

function PrintProductPage($ProductName) {
	global $PAGES;
	$ProductName = strtolower($ProductName);
	if (!isset($PAGES[$ProductName])) {
		echo '<p>Page not found.</p>';
		return;
	}
	$Page = $PAGES[$ProductName];
	echo '<aside></aside>
	<section>
    <h1>Product page</h1>
    <div class="productPage">
        <ul>
            <li><img src="' . $Page['image'] . '" alt=""></li>
            <li>
                <ul>';
    if (isset($Page['gallery'])) {
    	foreach ($Page['gallery'] as $Image) {
    		echo '<li><a><img src="' . $Image['src'] . '" alt="' . $Image['alt'] .'"></a></li>';
    	}
    }
               echo '</ul>
            </li>
        </ul>
        <ul>
            <li>
                <h2>' . $Page['title'] . '</h2>
            </li>
            <li>
                <hr>
                <div>';
    if (isset($Page['discountedPrice'])) {
    	echo '<del>$' . $Page['price'] . '</del>$' . $Page['discountedPrice'];
    } else {
    	echo '$' . $Page['discountedPrice'];
    }
    echo '</div>';
    $NumReviews = count($Page['reviews']);
    echo '<div>
          	<a>(' . $NumReviews . ' reviews)</a>';
    if (isset($Page['rating'])) {
	    PrintRating($Page['rating']);
	} else {
		PrintRating(0);
	}
    echo '</div>
   			<hr>
            </li>
            <li>' . $Page['description'] . '</li>
            <li>
                <a class="btn-themed">Add to cart</a>
                <a target="_blank" href="/products/' . $ProductName . '" class="btn-themed external">Preview Theme</a>
            </li>
        </ul>
        <hr>
        <div>
            <h2>Item Details</h2>
            ' . $Page['details'] . '
        </div>
        <hr>
        <div>
        	<h2>Reviews</h2>';
        if (isset($Page['reviews'])) {
        	foreach ($Page['reviews'] as $Review) {
        		echo '<blockquote>' . PrintRating($Review['rating']) . $Review['comment'] .'</blockquote>';
        	}
        }
    echo '</div>
    </div>
    </section>';
}

function SetActivePage($Name) {
	global $ACTIVE_PAGE;
	$Name = strtolower($Name);
	if ($Name == '' || $Name == 'home' || $Name == 'contact' || $Name == 'shop') {
		$ACTIVE_PAGE = $Name;
	}
}

function SetActiveProduct($Product) {
	global $ACTIVE_PRODUCT;
	$ACTIVE_PRODUCT = strtolower($Product);
}

function PrintActivePage() {
	global $ACTIVE_PAGE;
	global $ACTIVE_PRODUCT;
	// This is pretty much terrible, but it's a last minute thing.
	if ($ACTIVE_PRODUCT != '') {
		PrintProductPage($ACTIVE_PRODUCT);
		return;
	}
	if ($ACTIVE_PAGE == '') {
		$ACTIVE_PAGE = 'home';
	}
	include('html/' . $ACTIVE_PAGE . '.html');
}

function PrintLinks($Links, $Separator) {
	$Html = '';
	foreach ($Links as $Link => $Name) {
		$Html .= '<a href="/' . $Link . '">' . $Name . '</a>' . $Separator;
	}
	echo substr($Html, 0, -strlen($Separator));
}

function PrintProductFile($Product, $File) {
	$Path = 'products/' . $Product . '/' . $File;
	if (file_exists($Path)) {
		echo file_get_contents($Path);
	} else {
		echo 'Bad luck. File does not exist.';
	}
}

?>