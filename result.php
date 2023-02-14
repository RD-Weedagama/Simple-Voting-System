<?php  
 $connect = mysqli_connect("localhost", "root", "", "vote");  
 $query = "SELECT name, count(*) as number FROM vote GROUP BY name";  
 $result = mysqli_query($connect, $query); 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Summary</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Blood', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["name"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of votors',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 
           
           </script>  
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        * {
	box-sizing: border-box;
}
.back{
    background-image: url(new.jpg);
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
    color: #fff;
}

.mid h2{
    color: #fff;
    font-size: 3rem;
}
.mid .btn{
    margin-top: 1rem;
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

            <br /><br />
           
 
               
                    <div class="card-body">
                  

                  <table class="table table-bordered" align="center">
                            <thead>
                                <tr>
                                    <th>Percentage</th>
                                    <th>Number of votes</th>
                                    <th>Name</th>
                                    
                                </tr>
                            </thead>
                  <tbody>
                    <td rowspan="11"><div style="width:500px;">  
                <br />  
                <div id="piechart" style="width: 500px; height: 500px;"></div> </td>
                  <?php
                  
                   
                        $link = mysqli_connect("localhost", "root", "", "vote");
 
                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                         
                        // Attempt select query execution
                       
                        $sql = "SELECT name, count(*) as number FROM vote GROUP BY name ORDER BY number DESC";
                        if($result = mysqli_query($link,$sql)){
                            if(mysqli_num_rows($result) > 0){
                                
                                while($row = mysqli_fetch_array($result)){
                                   
                                    
                                    echo "<tr>";
                                  
                                    
                                    

                                        ?>
                                                    <tr>
                                        
                                                        
                                                        
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['number']; ?></td>
                                                      
                                                       
                                                                                                             


                                                    </tr>


                                                    <?php

                                    echo "</tr>";
                                }
                                echo "</table>";
                                // Close result set
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                                
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                         
                        // Close connection
                        mysqli_close($link);



?>
                   </table>
                  </tbody>

                  
                    </div>
                </div>
 </html>  