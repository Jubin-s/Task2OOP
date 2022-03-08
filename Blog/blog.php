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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script>
    $(document).ready(function() {
        
        $('[name="like1"]').on('click', function() {
          
        var id = this.id;
       
        $.ajax({
        url: "like.php",
        type: "POST",
        data: {
        id: id
        },

        cache: false,
        success: function(response){
            //alert(response);
            $("#likel").html(response);
            //location.reload(true);
       

        
}
});

});    

/*$(window).load(function()
{
    $.ajax(
        {
            url: "loader.php",
            type: "POST",
            data:{
                id: id
            },
            cache: false,
            success: function(result){
            $("#likel").html(result);
            }
        }
    )
})*/
});
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
        <center><table class="iter" border=1 width="70%" style="color:red">
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
                <td class="iter"><img src="images/like2.png" name="like1" width="50" height="50" value="Like" id='.$da.'  ><img src="images/dislike2.png" width="50" height="50" value="Dislike" id='.$row['Iid'].' onclick="update1(this.id)" ></td></tr>
                <tr>
                <td class="text-center"><p id="likel">Like:' .$sql1.'</p><p>Dislike:' .$sql2.' </p></td></tr>
               
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