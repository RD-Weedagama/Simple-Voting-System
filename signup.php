<?php require_once "abc.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Signup</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    

    <style>
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body{
        background: rgba(21, 21, 22, 0.267);
      }
      .row{
        background: #ffffff;
        border-radius: 30px;
        box-shadow: 12px 12px 22px gray;
      }
      img{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px; 
      
      }
      .btn1{
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: black;
        color: white;
        border-radius: 4px;
        font-weight: bold;
      }
      .btn1:hover{
        background: white;
        border: 1px solid;
        color: black;
      }
     
    </style>
  </head>
  <body>
    
    <br>
   

 

    


    <section class="Form">
      <div class="container mt-2 mb-2 px-3 pt-5">
        <div class="row g-0">
          <div class="col-lg-5">
            <img src="img/d.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7  px-5 pt-5">
            <h1>Vote</h1>
            <h4>Signin here</h4>

            <?php
            if(count($errors) == 1){
                ?>
                <div class="alert alert-danger text-center">
                    <?php
                    foreach($errors as $showerror){
                        echo $showerror;
                    }
                    ?>
                </div>
                <?php
            }elseif(count($errors) > 1){
                ?>
                <div class="alert alert-danger">
                    <?php
                    foreach($errors as $showerror){
                        ?>
                        <li><?php echo $showerror; ?></li>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
          
            <form action="abc.php" method="POST" autocomplete="off">
              <div class="form-row">
                <div class="">
                  <input type="text" placeholder="Full Name" class="form-control p-3 my-3 " name="name"  required>
                </div>
              </div>
              <div class="form-row">
                <div class="">
                  <input type="email" placeholder="Email-Address" class="form-control p-3 my-3"  name="email" required >
                </div>
              </div>
              <div class="form-row">
                <div class="">
                  <input type="text" placeholder="National Identity Number" class="form-control p-3 my-3 " minlength="" name="nic" required>
                </div>
              </div>
              
              <div class="form-row">
              <div class="form-group">
                  <input class="form-control button btn1 my-3" type="submit" name="signup" value="Signup">
              </div>
                    <div class="link login-link text-center">Already a member? <a href="user-otp.php">Login here</a></div>
              </div>
             
             

            </form>
          </div>
        </div>
      </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>

