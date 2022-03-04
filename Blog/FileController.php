<?php
class FileController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function fetchdata() 
    { 
        $result=mysqli_query($this->conn,"select * from table_data where Status='0' order by Iid desc"); 
        return $result; 
    } 

    public function check($na,$id)
    {
        $result= mysqli_query($this->conn,"SELECT * FROM table_opinion where Iid='$id' and Email='$na'");
        
        if ($result->num_rows > 0)  
        {
            header("Location:blog.php");
        }
        else
        {
        
            $fileQuery = "insert into table_opinion (Iid,Email,Likes,Dislike) VALUES ('$id','$na','1','0')";
            
            $result = $this->conn->query($fileQuery);
            if($result)
            {
                
                header("Location:blog.php");
            }
            else
            {
                die($fileQuery);
            }
        }
    }

    public function check1($na,$id)
    {
        $result= mysqli_query($this->conn,"select * from table_opinion where Iid='$id' and Email='$na'");
        
        if ($result->num_rows > 0) 
        {
            header("Location:blog.php");
        }
        else
        {
        
            $fileQuery = "insert into table_opinion (Iid,Email,Likes,Dislike) VALUES ('$id','$na','0','1')";
            
            $result = $this->conn->query($fileQuery);
            if($result)
            {
                
                header("Location:blog.php");
            }
            else
            {
                die($fileQuery);
            }
        }
    }

    public function fetchdata1($da) 
    { 
        $result=mysqli_query($this->conn,"select count(Likes) as cnt from table_opinion where Likes='1' and Iid='$da'"); 
        $data=mysqli_fetch_array($result);
        return $data['cnt']; 
    } 

    public function fetchdata2($da) 
    { 
        $result=mysqli_query($this->conn,"select count(Dislike) as cnt from table_opinion where Dislike='1' and Iid='$da'"); 
        $data=mysqli_fetch_array($result);
        return $data['cnt']; 
    } 

    public function checklog($username,$pass)
    {
        $result=mysqli_query($this->conn,"select * from login where Email='$username' and Password='$pass'");
        if($result->num_rows>0)
        { 
            $sidd= mysqli_fetch_array($result);
            $na=$sidd['Email'];
            $_SESSION['name']=$na;        
                if($na=='admin@123.com')
                {
                    header("location:upload.php");
                }
                else
                {
                    header("location:blog.php");
                }
        }
        else
        {
            echo 
            (
                "<script LANGUAGE='JavaScript'>
                    window.alert('Invalid User');
                    window.location.href='login.html';
                    </script>"
            );
        }
    }

    public function uploadData($name,$brief,$t,$photo)
    {
        $result=mysqli_query($this->conn,"insert into table_data(Title,Brief,Image)values('$name','$brief','$photo')");
        if($result)
        {
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$t))
            {
                header("location:upload.php");
            }
            else
            {
                echo"error";
            }
        }
    }

    public function registration($name,$email,$phone,$password)
    {
        $sql=mysqli_query($this->conn,"select * from login where Email='$email'");
        if($sql->num_rows>0)
        {
            echo
            (
                "<script LANGUAGE='JavaScript'>
                window.alert('Username already exist');
                window.location.href='registration.php';
                </script>"
            );
        }
        else
        {
            $pass=MD5($password);
            $result=mysqli_query($this->conn,"insert into login (Name,Email,Phone,Password) values ('$name','$email','$phone','$pass')");
            if($result)
            {
                header("location:login.html");
            }
        }
    }
    public function removeInfo()
    {
        $result=mysqli_query($this->conn,"select Title from table_data where Status='0' order by Iid desc"); 
        return $result; 
    }
    public function remove($name)
    {
        $result=mysqli_query($this->conn,"update table_data set Status='1' where Title='$name'");
        if($result)
        {
            header("location:remove.php");
        }
        else
        {
            die("error");
        }
    }
}
?>