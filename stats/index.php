<!DOCTYPE html>
<html lang="en">

<!-- Metadata, Stylesheet, Title -->

<head>
    <title>SkStats</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stats for your server">
    <meta name="author" content="MinePlugins">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<?php
include "include/header.php";
require "config/db-connect.php";
?>

    <div class="jumbotron">
        <div class="container">
<?php
if(isset($_POST['requete']) && $_POST['requete'] != NULL)
{
$requete = htmlspecialchars($_POST['requete']);
$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_errno) {
    echo "Error : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$res = $mysqli->query("Select * From ".$table_prefix."Player Where ".$table_prefix."Player.Player = '$requete'");
?>

<h3>Result</h3>

<br/> 
<?php
while ($row = mysqli_fetch_array($res)) {

?>

<button type="button" class="btn btn-lg btn-success"><?php echo $row['Player']; ?>
</button><br><br><img class="glow2 img-rounded" src="https://minotar.net/avatar/<?php echo $row['Player']; ?>/150.png">
<h3><u>Stats of <? echo $row['player']; ?></u></h3>
<h3><?php echo $row['Kills']; ?><small> Kills</small></h3>
<h3><?php echo $row['Deaths']; ?><small> Deaths</small></h3>
<h3><?php echo $row['Breaks']; ?><small> Block destroyed</small></h3>
<h3><?php echo $row['Placed']; ?><small> Block placed</small></h3>
<h3><?php echo $row['Walk']; ?><small> Meter walk</small></h3>
<h3><?php echo $row['Messages']; ?><small> Messages sent</small></h3>
<h3><?php echo $row['Commands']; ?><small> Commands sent</small></h3>
<h3><?php echo $row['Shoot']; ?><small> Projectile shooted</small></h3>
<h3><?php echo $row['BowKills']; ?><small> Kills with bow</small></h3>



<br/>
<br/>
<a href="player.php">New research ?</a></p>

</form>
<?php
}
}
?><p>Search stats of a player.</p>
 <form action="player.php" method="Post">
 <div class="col-xs-3">
<input class="form-control" type="text" name="requete" size="10"></div>
<input class="btn btn-default" type="submit" value="Chercher">
        </div>
    </div>

<?php
include "include/footer.php";
?>
<br>
    </div>
    <script src="js/jquery.min.js" type="text/javascript">
    </script>
    <script src="js/bootstrap.min.js" type="text/javascript">
    </script>