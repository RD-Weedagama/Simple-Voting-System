
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Blood Donation Form 1</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <style>
        body{

    margin: 0;
    padding: 0;
    background: url(p.jpg);
    background-size: cover;
    font-family: sans-serif;
   
    
    
}
.login-box{
    width: 1020px;
    height: 560px;
    background: rgba(255, 255, 255, 0.575);
    color: rgba(255, 255, 255, 0.753);
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius: 30px;  
    font-weight: 600;
      
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
              <a class="nav-link active" aria-current="page" href="admin-home.php">Home</a>
            </li>
            
            
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Votes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
            <li><a class="dropdown-item" href="add_voter.php">Add Voter</a></li>
            <li><a class="dropdown-item" href="select-voter.php">Select Voter</a></li>
            <li><a class="dropdown-item" href="delete-voter.php">Delete Voter</a></li>

          </ul>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="advertisement.php">Advertisement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="co.php">Counting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="result.php">Result</a>
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
    
    <div class="login-box mt-5">
       
       <form action="controllerUserData.php" method="POST" autocomplete="off">
        <table class="table table-hover">
          
          
            <tr>
              <th >A)</th>
              <td class="col-form-label"  data-bs-toggle="tooltip" data-bs-placement="bottom" >Name</td>
              <td colspan="2" class="align-items-lg-start">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" required>
              </div></td>
            </tr>

            <tr>
              <th >B)</th>
              <td class="col-form-label" data-bs-toggle="tooltip" data-bs-placement="bottom" >National Identity Card No</td>
              <td colspan="2" class="align-items-lg-start">
                <div class="form-group">
                  <input type="text" class="form-control" name="nic" required>
              </div>
                  
            </tr>

            <tr>
              <th >B)</th>
              <td class="col-form-label" data-bs-toggle="tooltip" data-bs-placement="bottom" >Address</td>
              <td colspan="2" class="align-items-lg-start">
                <div class="form-group">
                  <textarea class="form-control" name="address" rows="3" required></textarea>
              </div>
                  
            </tr>

            <tr>
              <th >C)</th>
              <td class="col-form-label" data-bs-toggle="tooltip" data-bs-placement="bottom" >Email</td>
              <td colspan="2" class="align-items-lg-start">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" required>
              </div></td>
                  
            </tr>

            <tr>
              <th >D)</th>
              <td class="col-form-label" data-bs-toggle="tooltip" data-bs-placement="bottom">District</td>
              <td colspan="2" class="align-items-lg-start">
                <div class="form-group">
                  <input type="text" class="form-control" name="district" required>
              </div></td>
            </tr>


            
          
            
        </table> 
        <div  class="text-end">
        <input type="submit" class="btn btn-warning" value="Add" name="submit">


        </div>
       </form>
         
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  
  </body>
</html>