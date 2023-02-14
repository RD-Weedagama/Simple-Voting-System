<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Admin Home</title>
    <scriptsrc="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}
.back{
    background-image: url(p.jpg);
    width: 100%;
    height:100vh;
    background-size: cover;
    z-index: -1;
}
.back .overlay{
    background: #171819;
    width: 100%;
    height: 100%;
    opacity: 0.8;
}
.mid{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
}
.mid p{
    color: #7f8c8d;
    font-size: 1.3rem;
    margin-bottom: 1.4rem;
}
.mid h2{
    color: #fff;
    font-size: 3rem;
}
.mid .btn{
    margin-top: 2rem;
}
.mid .btn a{
    text-transform: uppercase;
    text-decoration: none;
}
.mid .btn a.simple{
    color: #fff;
    border: 1px solid #fff;
    font-weight: 500;
    padding: 0.9rem 1.6rem;
    border-radius: 3px;
}
.description{
	display: flex;
	flex-direction: column;
	
	
}
.description .one h1{
	text-align: center;
	padding-top: 80px;
}
.description .one h6{
	text-align: center;
	padding-top: 10px;
	padding-left: 100px;
	padding-right: 100px;
	color: black;
}

	

#navbarNav{

	display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.services {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	align-items: center;
}
#col{
	padding-left: 100px;
	margin-left: 100pt;
}
#services{
	background-color: #e4ecec;
	padding: 30px 0px;
}
#services h1{
	font-weight: 900;
	font-size: 34px;
	padding-bottom: 5px;
}
.title{
	text-align: center;
	padding: 25px 0px;
}
.card-body .p{
	font-size: 18px;
	text-align: center;
   
}
.card-body{
	box-shadow: 0 0 20px 7px rgba(0,0,0,0.1);
}
.card{
	margin: 20px 10px;
}
.container .row {
    font-weight: 500;
}
</style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">




    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning navbar fixed-top">
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            
            
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Votes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
            <li><a class="dropdown-item" href="add.php">Add Voter</a></li>
            <li><a class="dropdown-item" href="select-voter.php">Select Voter</a></li>
            

          </ul>
        </li>
           
            <li class="nav-item">
              <a class="nav-link" href="admin_co.php">Counting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="result.php">Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a.php">XML</a>
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
   

  <div class="back">
      <div class="overlay"></div>
  </div>
  <div class="mid">
      <p>“Voting is the expression of our commitment to ourselves, one another, this country, and this world.”</p>
      <h2>Somewhere inside of all of us is the power to change the world.</h2>
      
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>