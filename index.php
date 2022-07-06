<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect(getenv('HOSTNAME'),getenv('ROOT_USERNAME'),getenv('ROOT_PASSWORD'),getenv('DB_NAME'));
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$show_result="select * from records";
$result= mysqli_query($link,$show_result);
 
// Attempt insert query execution
if(isset($_POST["message"])) {
    $message=$_POST["message"];
    $sql = "INSERT INTO records (message) VALUES ('$message')";
    if(mysqli_query($link, $sql)) {
        echo '<script>alert("Records inserted successfully")</script>';
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

}
?>

<html>
<head>
  <title>Hello!</title>
</head>
<body style="font-family: Verdana,Tahoma,sans-serif">
    <h2>Welcome to MyApp! Post a message to the board using the form at the bottom!</h2>
    <div style="border: 1px solid #BBB; padding: 5px; font-weight: bold; font-size: small">
        Message Board
    </div>
    <div style="border-left: 1px solid #BBB; border-right: 1px solid #BBB; border-bottom: 1px solid #BBB; padding: 5px; font-size: small">
    <?php
        if(mysqli_num_rows($result) == 0)
            echo "No records in database!";
        else
        {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                echo "{$row['message']}<br />";
        }
    ?>
    </div>

    <form name="message" action="" method="POST" style="padding-top: 15px">
        Message:<br />
        <input type="text" name="message" style="length: 300px" />
        <input type="submit" name="submit" value="Submit" />
    </form>

	<div style="font-size: small; font-size: small; font-color: #DDD">
		Served from <?php echo `hostname`; ?>.
	</div>
</body>
</html>
