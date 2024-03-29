<?php 

include('config.php');
include('includes/header.php');

?>

<main>
<h1>Welcome to our People Page</h1>

<?php

$sql = 'SELECT * FROM people';

// connect to database

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

        echo '
        <h2>Information about: '.$row['first_name'].' '.$row['last_name'].' </h2>

        <ul>
            <li>Email: '.$row['email'].' </li>
            <li>Birthdate: '.$row['birthdate'].' </li>
        </ul>
        
        <p>For more information about '.$row['first_name'].', click <a href="people-view.php?id='.$row['people_id'].'">here</a></p>
        ';

    } // end while loop
}

else {
    echo 'nobody home!';
}

// end if statement

@mysqli_free_result($result);

@mysqli_close($iConn);

?>

</main>

<aside>

</aside>

</div>
<!-- end wrapper -->

<?php 

include('includes/footer.php');