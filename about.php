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
        background-color: rgb(110, 250, 92);
    }
   </style>
   </head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php  include "partials/header.php"; ?>
    <div class="container my-3">
        <h5 class="text-success text-center my-3">Co-founder of iDiscuss: Abhishek Gupta</h5>
     <!-- <div class="row">
        <div class="card col-lg-4" style="width: 15rem;">
            <img src="/php codes/php project/photos/LOGO/Abhishek.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-danger">In this website user can make comment and post are throught's and
                    excahnge your ideas to each other .</p>
            </div>
        </div>
        -->
     </div>
        <!-- <br> -->
      
        <!-- <button class="btn btn-primary">Help</button> -->
        
        <div class="accordion accordion-flush my-3"id="accordionFlushExample">
            <div class="accordion-item text-center">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed p-3 mb-2 bg-success text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      iDiscuss-Support here...
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse " aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">We are provide you best security ..
                      Are programmer always solve the problem to the user to you freely share your details here make account on idiscuss to make family of idiscuss.
                      <p class="text-success">Thank you to share your details here.<p>
                    </div>
                </div>
            </div>
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