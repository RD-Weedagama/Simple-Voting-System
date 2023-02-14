<?php require "count.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading Counter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;900&display=swap" rel="stylesheet">
  <style>
      * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

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
.container {
  width: 80%;
  margin: auto;
}

.heading {
  text-align: center;
  font-size: 3.5rem;
  font-weight: bold;
  padding: 5rem 0;
}

.counter-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.counter {
  text-align: center;
}

.counter h3 {
  padding: 0.5rem 0;
  font-size: 2.5rem;
  font-weight: 800;
}

.counter h6 {
  font-size: 2rem;
  padding-bottom: 1rem;
}

.icon {
  height: 5rem;
  width: auto;
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
            
            <li>
              <div>
                <a class="btn btn-light" href="login-user.php" role="button">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
  <div class="container">
    <div class="heading">
      Current voters status
    </div>
    <div class="counter-container">
      <div class="counter">
        <img src="https://raw.githubusercontent.com/nemo0/animated-counter/29e12c0cb15e90c27faaef0d83fb2618126067db/icons/iconmonstr-time-19.svg" alt="timer" srcset="" class="icon">
        <h3 data-target="<?php echo $rowcount3?>" class="count">0</h3>
        <h6>Total Voters</h6>
      </div>
      <div class="counter">
        <img src="https://raw.githubusercontent.com/nemo0/animated-counter/29e12c0cb15e90c27faaef0d83fb2618126067db/icons/iconmonstr-coffee-11.svg" alt="Coffee" srcset="" class="icon">
        <h3 data-target="<?php echo $rowcount?>" class="count">0</h3>
        <h6>Voted</h6>
      </div>
      <div class="counter">
        <img src="https://raw.githubusercontent.com/nemo0/animated-counter/29e12c0cb15e90c27faaef0d83fb2618126067db/icons/iconmonstr-weather-112.svg" alt="night" srcset="" class="icon">
        <h3 data-target="<?php echo $rowcount2?>" class="count">0</h3>
        <h6>Not Voted</h6>
      </div>
    </div>
  </div>
  <script>
      const counters = document.querySelectorAll(".count");
const speed = 1;

counters.forEach((counter) => {
  const updateCount = () => {
    const target = parseInt(+counter.getAttribute("data-target"));
    const count = parseInt(+counter.innerText);
    const increment = Math.trunc(target / speed);
    console.log(increment);

    if (count < target) {
      counter.innerText = count + increment;
      setTimeout(updateCount, 1);
    } else {
      count.innerText = target;
    }
  };
  updateCount();
});

  </script>
</body>

</html>