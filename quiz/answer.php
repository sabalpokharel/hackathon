<?php
include("class/users.php");
$ans=new  users;
$answer=$ans->answer($_POST);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>answer</title>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  
</head>
<style type="text/css">
	.table thead tr {
		padding: 20px;
	}
	body{
		background: #f3f3df;
	}
	.table-bordered{
		border: 2px solid black;
	}

</style>
<body>
	<center>
	<?php
	$total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
	$attempt_qus=$answer['right']+$answer['wrong'];
	?>
	<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8 table">
  <h2 style="color: #ff4d0b;font-weight: bold;padding: 20px">Your results</h2>
  <table class="table table-bordered">
    <thead>
      <tr >
        <th style="padding: 20px; font-size: 15px;border-bottom: 2px solid
        black;border-right: 2px solid black">Total number of Questions</th>
        <th style="border-bottom: 2px solid black"><?php echo $total_qus; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="padding: 20px;font-size: 15px;border-right: 2px solid black">Attempted questions</td>
        <td><?php echo $attempt_qus;?></td>
      </tr>
      <tr>
        <td style="padding: 20px;font-size: 15px;border-right: 2px solid black">Right answer </td>
        <td><?php echo $answer['right'];?></td>
      </tr>
      <tr>
        <td style="padding: 20px;font-size: 15px;border-right: 2px solid black">Wrong answer</td>
        <td><?php echo $answer['wrong'];?></td>
      </tr>
	  <tr>
        <td style="padding: 20px;font-size: 15px;border-right: 2px solid black">No answer</td>
        <td><?php echo $answer['no_answer'];?></td>
      </tr>
	  <tr style="color: red;font-weight: bold;">
        <td style="padding: 20px;font-size: 15px;border: 2px ridge
        black">Your result</td>
        <td style="border: 2px ridge black"><?php 
		$per=($answer['right']*100)/($total_qus);
		
		echo $per."%";
		?></td>
      </tr>
    </tbody>
  </table></div>
  <div class="col-sm-2"></div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>