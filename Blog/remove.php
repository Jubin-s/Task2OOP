
<?php
include('dbconn.php');
include('FileController.php');
session_start();
$na=$_SESSION['name'];

if(isset($_SESSION['name']))
{
?>
 
<html>
    <head>
        <title>Remove Post</title>
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
            <a href="remove.php" class="active">Remove</a>
            <a href="upload.php" >Home</a>
        </div>
    <body style="background-image: url(images/img4.jpg);background-size: 1600px;">
        <center><p style="align-items: center;"></p></center></br></br></br>
        <form method="post" action="removedata.php">
        <center><table border="1" cellspacing="5px" cellpadding="5">
            <tr>
            <th colspan="2">Remove Post</th>
            </tr>
            <tr>
            <th>Post Name</th><td>
            <?php
            $query=new FileController();
            $sql=$query->removeInfo();

            ?>    
            <select name='rname' style="width: 100px;padding: 10px;" required>
            <option selected disabled>Select</option>
            <?php
            while($row=mysqli_fetch_array($sql))
            {
                $temp=$row['Title'];
                echo"<option value='".$row['Title']."'>".$row['Title']."</option>";            }
            ?>
            </select>
            </tr>
            <tr>
            <th colspan="2"><input type="submit" style="padding:10px;width: 100px; background-color: Red; color: white;" name="save" value="Proceed"></th>
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