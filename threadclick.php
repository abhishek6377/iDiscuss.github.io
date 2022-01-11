<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss!</title>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `thread` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
    }
    
    ?>
    <?php 
    $showalert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // insert into comment
        $comment=$_POST['comment'];
        // $sno=$_POST['sno'];// it so error 
        $comment=str_replace(">","&lt", $comment);
        $comment=str_replace("<","&gt", $comment);
       
        $sql="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '0', current_timestamp())";
        $showalert=true;
        if($showalert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> Your comment has been added! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    

        // echo $method;
    }
    
    ?>


    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title?>.</h1>
            <p class="lead"><?php echo $desc ?>. .</p>
            <hr class="my-4">
            <h5>#programing language information here.</h5>
         
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
        echo'<div class="container">
        <h1 class="py-2"> Post a Comment</h1>
        
        <form action"'. $_SERVER['REQUEST_URI'].'" method="post">
        <!--  //this is direct method to use and give the path of action on self page means click came on same page that. Request_uri means it show after code in url code like we use ?cateid this type threads.php?catid=2 -->
        
        <div class="form-group">
        <label for="comment" class="my-2">Type your comment</label>
        <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>

        
        </div>
        
        <button type="submit" class="btn btn-success">Post Comment</button>
     </form>
     </div>';
    }
    else{
        echo'
        <div class="container">
        <h3 class="py-2">Post a Comment</h3>
            <h6 class="text-primary">You are not logged in.Please login to be able to start a Post a Comment!</h6>
            <hr class="my-2">
        </div>';
       

    }
    ?>

    <div class="container" id="foot">
        <h1 class="py-2">Discussions</h1>
        <!-- <?php
            $id=$_GET['threadid'];
            $sql="SELECT * FROM `thread` WHERE thread_id=$id";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
      
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
    
        echo' <div class="media my-3">
            <img src="/php codes/php project/photos/user.jpg" width="45px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a  class="text-dark" href="threadclick.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
            </div>
        </div>';
      }
      ?> -->
        <?php
            $id=$_GET['threadid'];
            $sql="SELECT * FROM `comments` WHERE thread_id=$id";
            $result=mysqli_query($conn,$sql);
            $noResult=true;
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
      $id=$row['comment_id'];
      $content=$row['comment_content'];
      $comment_time=$row['comment_time'];
      $thread_cat_desc=$row['comment_by'];
      $sql2="SELECT user_email FROM `users` where sno='$thread_cat_desc'";
      $result2=mysqli_query($conn,$sql2);
      $row2=mysqli_fetch_assoc($result2);
    
        echo' <div class="media my-3">
            <img src="/php codes/php project/photos/user.jpg" width="45px" class="mr-3" alt="...">
            <div class="media-body">
            <h6 class="  text-success my-0"> '.$row2['user_email'].' at '.$comment_time.'</h6>
              <p> '.$content.'</p>
            </div>
        </div>';
      }
    //    echo var_dump($noResult);
        if($noResult){
          echo' <div class="container">
           <h6 class="display"> No Thread Found..</h6>
           <p class="lead"> You are first person to ask the question</p>
           </div>';
       }
      ?>

    </div>



    <?php include 'partials/footer.php';?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>