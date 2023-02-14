<?php 
$password=123456789;
$encpass = password_hash($password, PASSWORD_BCRYPT);
echo $encpass;
//$2y$10$V7jHopR5wvSOf8GfV8F/0O.r6r/tcnQXXQiq7Q99moX8yC18LaY6u
//$2y$10$YMgvU.wkPbw8VTHwWRjnuuJ//pKGiGpRme5DmL6n9vcQGu3cWnXoK
?>