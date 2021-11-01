<?php 
    session_start();
    if(!isset($_SESSION['phone'])){
        header("Location: ./index.php?controller=site");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>
    <?php
        $this->view('frontend.public.base');
        $this->view('frontend.public.headerHome');
    ?>
</body>

</html>