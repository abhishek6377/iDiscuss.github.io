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
  
    $id=$_GET['catid'];
    $sql="SELECT * FROM `idicuss` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $catname=$row['category_name'];
      $catdesc=$row['category_description'];
    }
    
    ?>
    <?php 
    $showalert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // insert into db
        $th_title=$_POST['title'];
        $th_desc= $_POST['desc'];
        // this str_replace to proctect our website to be hacker....
        // ex: <script> alert("hello")</script>
        $th_title=str_replace(">","&lt", $th_title);
        $th_title=str_replace("<","&gt", $th_title);

        $$th_desc=str_replace(">","&lt", $$th_desc);
        $$th_desc=str_replace("<","&gt", $$th_desc);
        $sql="INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_cat_desc`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '0', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> Your  thread has been added! Please wait for community  to response
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    

        // echo $method;
    }
    
    ?>


    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname?>.</h1>
            <p class="lead"><?php echo $catdesc ?>. .</p>
            <hr class="my-4">
            <h5>#programing language information here.</h5>
            <p> Posted by:<b>Abhishek gupta</b></p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
     echo'<div class="container">
        <h1 class="py-2"> Start a Discussions</h1>

        <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
            <!--  //this is direct method to use and give the path of action on self page means click came on same page that. Request_uri means it show after code in url code like we use ?cateid this type threads.php?catid=2 -->
            <div class="mb-3">
                <label for="title" class="form-label">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Keep your title short and crisp as possible.</div>
            </div>
            <div class="form-group">
                <label for="desc">Ellaborate your concern</label>
                <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
    }
    else{
        echo'
        <div class="container">
        <h3 class="py-2"> Start a Discussions</h3>
            <h6 class="text-danger">You are not logged in.Please login to be able to start a Discussion!</h6>
            <hr class="my-2">
        </div>';
       

    }
    ?>
    <div class="container">
        <h1 class="py-2"> Browse Question</h1>
        <?php
            $id=$_GET['catid'];
            $sql="SELECT * FROM `thread` WHERE thread_cat_id=$id";
            $result=mysqli_query($conn,$sql);
            $noResult=true;
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
      $id=$row['thread_id'];
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
      $thread_time=$row['timestamp'];
      $thread_cat_desc=$row['thread_cat_desc'];
      $sql2="SELECT user_email FROM `users` where sno='$thread_cat_desc'";
      $result2=mysqli_query($conn,$sql2);
      $row2=mysqli_fetch_assoc($result2);
    
        echo'<div class="media my-3">
            <img src="/php codes/php project/photos/user.jpg" width="45px" class="mr-3" alt="...">
            <div class="media-body">
           

                <h5 class="mt-0"><a  class="text-dark" href="threadclick.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
                <h6 class=" my-0 text-primary">'.$row2['user_email'].' at '.$thread_time.'</h6>
            </div>
        </div>';
      }
    //    echo var_dump($noResult);
        if($noResult){
          echo' <div class="container">
           <h6 class="display"> No Comments Found..</h6>
           <p class="lead"> You are first person to ask the question</p>
           </div>';
       }
      ?>
    </div>



    <!-- <div class="media my-3">
            <img src="/php codes/php project/photos/user.jpg" width="45px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Unable to install Pyaudio error in Window</h5>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut vel fuga impedit laudantium?.
            </div>
        </div> -->


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
<!-- INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_cat_desc`, `timestamp`) VALUES ('1', 'Unable to install to pyaudio', ' I am not able to install pyaudio on windows', '1', '0', current_timestamp()); -->