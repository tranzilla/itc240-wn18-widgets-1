<?php
/* Config.php

Put Configuration information here
*/

define('DEBUG',TRUE); #we want to see all errors
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo THIS_PAGE;

//to make a dynamic navigation
$nav1[index.php] = "HOME";
$nav1[customer.php] = "CUSTOMER";
$nav1[contact.php] = "CONTACT";
$nav1[daily.php] = "DAILY";

// defaults for header.php
$banner = 'WIDGETS';
$slogan = 'Our Widgents are better!';

switch(THIS_PAGE){
	
	case'index.php':
		$title = 'Template Page';
	break;

	default:
	$title = 'THIS_PAGE';
		
		
		
}

//other include files referenced here

include 'credentials.php';


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}

function coffee_link($nav1){
	
	foreach($nav1 as $url => $text){
		//echo '<li><a href="' . $url . '">' . $text . '</a></li>';
		
		if(THIS_PAGE == $url)
		{//current page - add higlight
			echo'
			<li class="nav-item active px-lg-4">
				<a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
			</li>
			';
		}else{//no highligh
			echo '
			<li class="nav-item px-lg-4">
			<a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
			</li>
			';
			}      
      
    }

}//end coffee_link()
	



?>