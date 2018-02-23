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
    header('Location:parasite.php');
}


$sql = "select * from Parasites where ParasiteID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $ParasiteName = stripslashes($row['ParasiteName']);
        $PrimaryHost = stripslashes($row['PrimaryHost']);
        $Transmission = stripslashes($row['Transmission']);
        $BodyPartsAffected = stripslashes($row['BodyPartsAffected']);
        $CasesPerYear = stripslashes($row['CasesPerYear']);
        $FunFact = stripslashes($row['FunFact']);
        $title = "Title Page for " . $ParasiteName;
        $pageID = $ParasiteName;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This parasite does not exist</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo '<p>Parasite Name: ' . $ParasiteName . '</p> ';
    echo '<p>Primary Host: ' . $PrimaryHost . '</p> ';
    echo '<p>Transmission: ' . $Transmission . '</p> ';
    echo '<p>Body Parts Affected: ' . $BodyPartsAffected . '</p> ';
    echo '<p>Cases Per Year: ' . $CasesPerYear . '</p> ';
    echo '<p>Fun Fact: ' . $FunFact . '</p> ';
	
	echo '<img src="uploads/parasite' . $id . '.jpg" />';
    

    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="parasite.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>