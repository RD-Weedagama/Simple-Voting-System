<?php require "count.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCODE SHOW</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h2 class="text-center">Projects statistics</h2>

    <div class="project-counter-wrp">
        <ul>
            <li>
                <i class="fa fa-briefcase"></i>
                <p id="number1" class="number">500</p>
                <span></span>
                <p>Projects Done</p>
            </li>
            <li>
                <i class="fa fa-smile-o"></i>
                <p id="number2" class="number">89</p>
                <span></span>
                <p>Happy Clients</p>
            </li>
            <li>
                <i class="fa fa-coffee"></i>
                <p id="number3" class="number">359</p>
                <span></span>
                <p>Cups of Coffee</p>
            </li>
        </ul>
    </div>


    <script>


        var project = setInterval(projectDone, 10)
        var clients = setInterval(happyClients, 10)
        var coffee = setInterval(cupsCoffee, 10)
        let count1 = 1;
        let count2 = 1;
        let count3 = 1;

        let c1=<?php  echo (intval($rowcount));?>;

        function projectDone() {
            count1++
            document.querySelector("#number1").innerHTML = count1
            if (count1 == c1) {
                clearInterval(project)
            }
        }

        function happyClients() {
            count2++
            document.querySelector("#number2").innerHTML = count2
            if (count2 == 89) {
                clearInterval(clients)
            }
        }

        function cupsCoffee() {
            count3++
            document.querySelector("#number3").innerHTML = count3
            if (count3 == 359) {
                clearInterval(coffee)
            }
        }
    </script>
</body>

</html>

