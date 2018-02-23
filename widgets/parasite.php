<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
$sql = "select * from Parasites";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Parasite Name: <b>' . $row['ParasiteName'] . '</b> ';
       
        
        echo '<a href="parasite_view.php?id=' . $row['ParasiteID'] . '">' . $row['ParasiteName'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no parasite</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>