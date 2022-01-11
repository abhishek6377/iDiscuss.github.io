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

        min-height: 100vh;
    }

    body {
        background-color: rgb(240, 219, 188);
    }
    </style>
   </head>

    <body>
    <?php include 'partials/dbconnect.php';?>
    <?php  include "partials/header.php"; ?>

    <?php
     $showalert=false;
     $method=$_SERVER['REQUEST_METHOD'];
    //  echo $method;
     if($method=='POST'){
         // insert into db
         $name=$_POST['name'];
         $email= $_POST['email'];
         $hobby =$_POST['hobby'];
         $address= $_POST['address'];
         $phone= $_POST['phone'];
          $sql1="INSERT INTO `contact` ( `name`, `email`, `hobby`, `address`, `phone`) VALUES (   '$name ', '$email', '$hobby', '$address', '$phone')";
          $result=mysqli_query($conn,$sql1);
          $showalert=true;
        if($showalert){
          echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Successfully!</strong> Your contact add!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
          }
        }
       ?> 
  
    <div class="container my-4">
     <h2 class="text-center text-primary">Please share your details with iDiscuss</h2>
      <div class="container">   
     <form action="contact.php" method="post">
  <div class="mb-4">
   
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name"id="name">
  </div>
  <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control"name="email" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="hobby" class="form-label">Hobby</label>
    <input type="text" class="form-control" name="hobby" id="hobby">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="address">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" class="form-control" name="phone"id="phone">
  </div>

  <button type="submit" class="btn btn-success text-center">Submit</button>
</form>
    
    
</div>
</div>





    <?php  include "partials/footer.php"; ?>

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