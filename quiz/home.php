<?php
include("class/users.php");
$email=$_SESSION['email'];
$profile=new users;
$profile->users_profile($email);
$profile->cat_shows();
//print_r($profile->cat);
//print_r($profile->data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  
</head>
<body>

<div class="container">
  <div class="header" style="text-align: center;color: #337ab7">
     <h2>Online Exam </h2>
  </div>
  <div class="col-md-12 online">
      <div class="col-md-11">
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
        <li><a data-toggle="tab" href="#menu1">Profile</a></li>
        <li><a data-toggle="tab" href="#askme"> Ask Questions </a></li>
        <li style="float:right"><a data-toggle="tab" href="#menu3">
        </a></li>
      </ul>
      </div>
      <div class="col-md-1">
        <button class="btn-primary">Logout</button>
      </div>
  </div>
  <div class="start">
    <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select" >Start </button></center> 
    <div id="select" class="tab-pane fade">

          <form  method="post" action="qus_show.php">
          <select class="form-control" id="" name="cat">
          <option>select category</option>
          <?php     
          foreach($profile->cat as $category)
          {  ?>             
          <option value="<?php echo $category['id'];?>"><?php echo $category['cat_name'];?></option>
          <?php   }?>
          </select><br>
          <center><input type="submit" value="submit" class="btn btn-primary" /></center>
        </form>
   
    
    </div>
  </div>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
      <?php
$con=mysqli_connect("localhost","root","","quiz_oops");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT id,title,answer FROM askedquestion";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
     echo "<div class='panel panel-default'>";
     echo "<div class='panel-heading'>";
     echo "<b>".$row[1]."</b>";
  
       echo "<div class='panel-body'>";
       $query_discussion_answers = "SELECT * FROM discussion_answers where question_id = ".$row[0];

       if ($query_discussion_result = mysqli_query($con, $query_discussion_answers)) {
        // fetch answrs for each discussed questions
        while ($discussion_answer_row = mysqli_fetch_row($query_discussion_result))
          echo "<p>".$discussion_answer_row[2]."</p>";
       }

     echo "</div>";
     echo "</div>";
  
     echo "</div>";
     echo "</div>";
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>
	        
	   <div class="col-sm-4"></div>
	   <div class="col-sm-4"><br>
	   
	  </div>
	  <div class="col-sm-4"></div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3 style="color: #337ab7;padding: 20px;text-align: center; font-weight: 200">Showing profile</h3>
	  
	  <table class="table" style="border: 1px solid black">
    <thead>
      <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black">id</th>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black">name</th>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black">email</th>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black">image</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 
	foreach($profile->data as $prof)
	{?>
      <tr>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black"><?php echo $prof['id'];?></td>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black"><?php echo $prof['name'];?></td>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black"><?php echo $prof['email'];?></td>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black"><img src="img/<?php echo $prof['img'];  ?>" alt="" width="35px" height="30px" /></td>
      </tr>
    </tbody>
	<?php 	}?>
  </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
    </div>
    <div id="askme" class="tab-pane fade">
      <div class="container">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="border: 1px ridge black;padding: 50px;box-shadow: inset 0 0 10px #000000;;">
        <form method="post" action="backend/insert.php">
        <div class="form-group">
          <label for="question" style="font-size: 18px;color: #337ab7">Ask you desired Question:</label>
          <input type="text" name="question" class="form-control" id="question">
        </div>

        <p style="text-align: center;"><button type="submit" class="btn btn-default" onClick="" style="background: #337ab7;color: white;padding: 10px 50px;border-radius: 8px">Submit</button></p>
        </form>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
