<!DOCTYPE html>
<html>
<head>
    <title>Now Showing Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php 
        include 'header.php';
    
        include 'db.php';
        $date=date('Y-m-d');
        
        $sql="SELECT movie_name,poster,screen,date,show_timings FROM movie_details WHERE date='$date'";
        if($res=mysqli_query($con,$sql))
        {
            if(mysqli_num_rows($res)!=0)
            {
                ?><h2 class="text-center"><i>Now Showing Movies</i></h2><?php
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['poster']); ?>" /><br/>
                            Movie Name:<?php echo $row['movie_name']; ?><br/>
                            <?php echo $row['screen']; ?><br/>
                            Time:<?php echo $row['show_timings']; ?>
                    </div><br/>
                    <?php

                }
            }
            else
            {
                ?><div class="text-center"><i>No Movies Running Today</i></div><?php
            }

        }
        else
        {
            echo mysqli_error($con);
        }
    ?>
    <br/>
    <?php include 'footer.php'; ?>
</body>
</html>