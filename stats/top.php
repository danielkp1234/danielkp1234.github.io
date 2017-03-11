<!DOCTYPE html>
<html lang="en">

<!-- Metadata, Stylesheet, Title -->

<head>
    <title>SkStats</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SkStats">
    <meta name="author" content="MinePlugins">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<?php
	include 'include/header.php';
	require 'config/db-connect.php';
?>

    <div class="jumbotron">

<script>

function searchString() {
    var Sstring = $('#string').val();
    $("td:contains('" + Sstring + "')").css("background", "lightgrey");
    var n = $("td:contains('" + Sstring + "')").length;
	$("td:contains('" + Sstring + "')")[0].scrollIntoView(true)
}
function clearSearch() {
    var Sstring = $('#string').val();
    if (Sstring != '') {
        $("td:contains('" + Sstring + "')").css("background", "none");
        $('#string').val('');
    }
}
</script>
	<div class="container">
		<form role="form">
			  <div class="form-group">
				<br>
				<label for="exampleInputEmail1">Search:</label>
				<input id="string" name="string" type="text" class="form-control" id="exampleInputEmail1" onfocus="clearSearch()" placeholder="">
			  </div>  
			<button type="button" class="btn btn-primary" onclick="searchString()">Search</button>
		</form>
		<br>
		<div class="alert alert-info" id="alert" role="alert"><strong>Warning !</strong> Can have serveral reply
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		</div>
		<br>
		
	<div class="tool">
		<table class="table table-hover"> <tr>  <TH> Skin </TH>   
		<TH><?php echo sort_link('Pseudo', 'Player') ?></TH> 
		<TH><?php echo sort_link('Kills', 'Kills') ?></TH>
		<TH><?php echo sort_link('Kills w/ Bow', 'BowKills') ?></TH> 
		<TH><?php echo sort_link('Deaths', 'Deaths') ?></TH>
		<TH><?php echo sort_link('Meter Walk', 'Walk') ?></TH> 
		<TH><?php echo sort_link('Projectile Shoot', 'Shoot') ?></TH> 
		<TH><?php echo sort_link('Commands send', 'Commands') ?></TH> 
		<TH><?php echo sort_link('Block Destroyed', 'Beaks') ?></TH> 
		<TH><?php echo sort_link('Block Placed', 'Placed') ?></TH> 
		<TH><?php echo sort_link('Messages send', 'Messages') ?></TH> </tr> 

<?php
$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_errno) {
    echo "Error : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$tri_autorises = array('Player','Kills','Deaths','BowKills','Shoot','Breaks','Placed','Commands','Messages');
$order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'Kills';
$order_dir = isset($_GET['inverse']) ? 'ASC' : 'DESC';
$sql = $mysqli->query("SELECT * FROM ".$table_prefix."Player ORDER BY {$order_by} {$order_dir}");
function sort_link($text, $order=false)

{

    global $order_by, $order_dir;

 

    if(!$order)

        $order = $text;

 

    $link = '<a href="?order=' . $order;

    if($order_by==$order && $order_dir=='ASC')

        $link .= '&inverse=true';

    $link .= '"';

    if($order_by==$order && $order_dir=='ASC')

        $link .= ' class="order_asc"';

    elseif($order_by==$order && $order_dir=='DESC')

        $link .= ' class="order_desc"';

    $link .= '>' . $text . '</a>';

 

    return $link;

}


	
while ($row = mysqli_fetch_array($sql)) {
	echo"<tr>"."<td>"."<img class=\"glow2 img-rounded\" src=\"https://minotar.net/avatar/".$row['Player']."/50.png\"/>"."</td>"."<td id=\"".$row['Player']."\">".$row['Player']."</td>"."<td>".$row['Kills']."</td>"."<td>".$row['BowKills']."</td>"."<td>".$row['Deaths']."</td>"."<td>".$row['Walk']."</td>"."<td>".$row['Shoot']."</td>"."<td>".$row['Commands']."</td>"."<td>".$row['Breaks']."</td>"."<td>".$row['Placed']."</td>"."<td>".$row['Messages']."</td>"."</tr>";
}
	  

?>
	</table>
	</div>
	</div>
	</table>
        </div>


<?php
	include 'include/footer.php';
?>
</body>

</html>