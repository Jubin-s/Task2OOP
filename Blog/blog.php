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
        <title>Home page</title>
    <style>
          body 
       {
        margin: 0;
        font-family: Arial;
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
    <script>
	function update(id)
		{
			var frm = document.getElementById("frmm")
			frm.setAttribute("action","like.php?id="+id);
			frm.submit();
		}
	function update1(id)
		{
			var frm = document.getElementById("frmm")
			frm.setAttribute("action","dislike.php?id="+id);
			frm.submit();
		}

	</script>

    </head>
    <form action="approv.php" method="POST" id="frmm" >
    <body style="background-image: url(images/img5.jpg);background-size: 1600px;">
        <div class="topnav">
        <a href="dest.php" >Logout</a>
            <a href="blog.php" class="active">Blog</a>
            
        </div>
    </br>
    </br>
    </br>
        <center><table border=1 width="70%" style="color:red">
        <tr>
                <th><h1> New Posts<h1></th>
                </tr>
            <?php 
            $fetchdata = new FileController;
            $sql=$fetchdata->fetchdata();  
            while($row=mysqli_fetch_array($sql)) 
            {   
                $da=$row['Iid'];
                $fetchdata1 = new FileController;
                $sql1=$fetchdata1->fetchdata1($da);
                $fetchdata2 = new FileController;
                $sql2=$fetchdata2->fetchdata2($da); 
                echo'
                
                <tr>
                <td class="text-center"><img width="1000" width="500" height="600" src="product-images/'.$row["Image"].'"</td>
               
                </tr>
                <tr>
                 <th>
                '.$row['Brief'].
                '
                </th>
                </tr>
                <tr>
                <td class="text-center"><p>Like:' .$sql1.'</p><p>Dislike:' .$sql2.' </p></td></tr>
               
               <tr>
                <td class="text-center"><img src="images/like2.png" width="50" height="50" value="Like" id='.$row['Iid'].' onclick="update(this.id)" ><img src="images/dislike2.png" width="50" height="50" value="Dislike" id='.$row['Iid'].' onclick="update1(this.id)" ></td></tr>
                '
                
                ;
            }
            ?>
        </table></center>
        <form>
    </body>
</html>
<?php
	}
	else
	{
		header("location:login.html");
	}?>