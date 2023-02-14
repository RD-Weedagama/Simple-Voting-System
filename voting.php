<?php require_once('connection.php'); ?>
<?php  session_start()?>
<?php  $email=$_SESSION['email'] ?>
<?php 
	$but="";
	$query = "SELECT name,email,vote_status FROM users WHERE email = '$email'";

	$result_set = mysqli_query($con, $query);
    if($result_set){
      

       while ($record= mysqli_fetch_assoc($result_set)){
           $name=$record['name'];
           $email=$record['email'];
           $vote_status=$record['vote_status'];
       
       }
       if($vote_status =="voted"){
         $but="disabled";
       }
       else{
         $but="";
       }
        
    }

?>
<?php mysqli_close($con);?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Sweet Alert Codes-->
    <!--JQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--Sweet Alert CDN-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
      body {
  font-family: "Nunito", sans-serif;
  background: #fbf7f4;
}
      #navbarNav{

display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}
    </style>
  </head>
  <body>
 

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger navbar fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="img/logo1.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">  
          Evote</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="home.php">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="voting.php">Voting Center</a>
            </li>
            <li>
            <li class="nav-item">
              <a class="nav-link" href="co.php">On Situation</a>
            </li>
            <li>
              <div>
                <a class="btn btn-light" href="login-user.php" role="button">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
  <div class="row row-cols-1 row-cols-md-5 g-3 text-center mt-5">

 <form action="controllerUserData.php" method="post">
   
 <div class="col">
    <div class="card">
      <img src="img/a.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Barack Obama</h5>
        <input type="hidden" name="A" value="A">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        <button type="submit" name="A" class="btn btn-danger <?php echo $but;?>">Vote</button>

      </div>
    </div>
  </div>
 </form>

 <form action="controllerUserData.php" method="post">
 <div class="col">
    <div class="card">
      <img src="img/b.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Joe Biden</h5>
        <input type="hidden" name="search" value="B">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        <button type="submit" name="B" class="btn btn-danger <?php echo $but;?> ">Vote</button>
      </div>
    </div>
  </div>
 </form>

 <form action="controllerUserData.php" method="post">
 <div class="col">
    <div class="card">
      <img src="img/c.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Narendra Modi</h5>
        <input type="hidden" name="search" value="C">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        <button type="submit" name="C" class="btn btn-danger <?php echo $but;?> ">Vote</button>
      </div>
    </div>
  </div>
 </form>

 <form action="controllerUserData.php" method="post">
 <div class="col">
    <div class="card">
      <img src="img/d.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Donald Trump</h5>
        <input type="hidden" name="search" value="D">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content</p>
        <button type="submit" name="D" class="btn btn-danger <?php echo $but;?> ">Vote</button>
      </div>
    </div>
  </div>
 </form>

 <form id="formABC" action="controllerUserData.php" method="post">
 <div class="col">
    <div class="card">
      <img src="img/e.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Vladimir Putin</h5>
        <input type="hidden" name="search" value="E">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        <button type="submit"  name="E" class="btn btn-danger <?php echo $but;?> ">Vote</button>

       
      </div>
    </div>
  </div>
 </form>
 
  
  
  
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

  </body>
</html>

<script>
    $('.delete').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('title'));
        Swal.fire({
            title: 'Thanks for voting',
            text: "Your vote has been recorded.",
            icon: 'success',
            confirmButtonColor: '#FFC107',
        })
    })
</script>

</body>
</html>

