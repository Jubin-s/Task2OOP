
<?php
include('dbconn.php');
session_start();
$na=$_SESSION['name'];

if(isset($_SESSION['name']))
{
?>
 
<html>
    <head>
        <title>upload Data</title>
        <style>
           body 
       {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }

        .topnav 
        {
        background-color: black;
        }

        .topnav a 
        {
        float: right;
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        font-size: 17px;
        }

        .topnav a:hover 
        {
        background-color: whitesmoke;
        color: black;
        }

        .topnav a.active 
        {
        background-color: red;
        color: white;
        }
    </style>
    <script type="text/javascript">
    history.pushState(null, null, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () { history.go(1); };
	</script>
    </head>
    <div class="topnav">
                     
            <a href="dest.php" >Logout</a>
            <a href="blog.php" >Blog</a>
            <a href="activate.php" >Activate</a>
            <a href="remove.php" >Deactivate</a>
            <a href="upload.php" class="active">Home</a>
        </div>
    <body style="background-image: url(images/img4.jpg);background-size: 1600px;">
        <center><p style="align-items: center;"></p></center></br></br></br>
        <form method="post" action="uploads.php"enctype="multipart/form-data">
        <center><table border="1" cellspacing="5px" cellpadding="5">
            <tr>
            <th colspan="2">Add New Post</th>
            </tr>
            <tr>
            <th>Name</th><td><input type="text" style="width: 250px;padding: 10px;" name="name"  id="txt1" required></td>
            </tr>
            <tr>
            <th >Brief Description</th><td ><textarea style="width: 250px;padding: 10px;" rows="3" cols="15" id="bf" name="brief" required></textarea></td>
            </tr>
            <tr>
            <th >Image</th><td ><input style="width: 250px;padding: 10px; background-color:aqua;" type="file" id="file" name="file" ></td>
            </tr>
            <tr>
            <th colspan="2"><input type="submit" style="padding: 10px; background-color: green; color:white" name="save" value="Publish"></th>
            </tr>
        </table></center>
    </form>
    </body>
</html>
<?php
	}
	else
	{
		header("location:login.html");
	}?>