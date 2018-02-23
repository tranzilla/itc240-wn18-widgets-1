<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:daily.php');
}


$sql = "select * from daily_special where dailyid = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $day = stripslashes($row['day']);
        $special = stripslashes($row['special']);
        $description = stripslashes($row['description']);
        $title = "Title Page for " . $day;
        $pageID = $day;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This daily special does not exist</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Day: <b>' . $day . '</b> ';
    echo 'Special: <b>' . $special . '</b> ';
    echo 'Description: <b>' . $description . '</b> ';
    
    echo '<img src="uploads/daily' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="daily.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>