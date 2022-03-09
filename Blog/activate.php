<?php
include("dbconn.php");
include("FileController.php");
session_start();
$na=$_SESSION['name'];
if(isset($_SESSION['name']))
{
?>
<html>
    <head>
        <title>
            Activate Post
        </title>
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
            <a href="activate.php" class="Active">Activate</a>
            <a href="remove.php">Deactivate</a>
            <a href="upload.php" >Home</a>

        </div></br></br></br>
    <body style="background-image:url(images/img4.jpg);background-size: 1600px;">
    <form action="activatedata.php" method="POST">
        <center>
            <table border=1 cellspacing="5px" cellpadding="5" >
                <tr><th colspan="2">Activate Post</th></tr>
                <tr><th>Select Name</th>
                <td><select name="aname" style="width: 150px; padding: 10px">
                <option selected disabled>Select Option</option>
                <?php
                $adata=new FileController();
                $result=$adata->activateInfo();
                while($row=mysqli_fetch_array($result))
                {
                    echo "<option value='".$row['Title']."'>".$row['Title']."</option>";                    
                }
                
                ?>
                </select></td></tr>
                <tr>
                <th colspan="2"><input type="submit" style="padding:10px;width: 100px; background-color: green; color: white;" name="save" value="Activate"></th>
                </tr>
            </table>
        </center>
    </form>
    </body>
</html>
<?php
}
else
{
    header("location:login.html");
}
?>