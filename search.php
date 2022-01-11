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
    <style>
    .container {

        min-height: 90vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>

    <!-- // doing result  -->
    <div class="container my-4">
        <h1>Search Results for <em>!<?php  echo $_GET['search']?>!</em></h1>
        <?php
        $noresult=true;
          $query=$_GET['search'];
          $sql="SELECT * FROM `thread` WHERE MATCH (thread_title,thread_desc)against('$query')";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_id=$row['thread_id'];
            $url="threadclick.php?threadid=".$thread_id;
            echo'
            <div class="result">
            <h4><a href="'.$url.'"class=text-dark>'.$title.'</a></h4>
  
            <p>'.$desc.' !</p>
  
            </div>';
          } 
          if($noresult){
            echo'
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <p class="display-4"> No Result found!</p>
            <p class="lead">Suggestions:  <ul>
            <li>Make sure  that all words are spelled  correctly</li>
            <li>Try different keyword</li>
            <li>Try more  general  Keyword</li>
            </ul></p>
            
            </div>
            </div>';
           
            

            
          }
          
          
          ?>
          </div>

      

    <!-- full text query:-->
    <!-- alter table thread add FULLTEXT(`thread_title`,`thread_desc`) -->
    <!-- SELECT * FROM `thread` WHERE MATCH (thread_title,thread_desc)against('not able') -->



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