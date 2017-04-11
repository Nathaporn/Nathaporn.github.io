<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Lab4</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <?php
            $age = date("Y-m-d")-$_GET["bday"];
            $fname = $_GET["firstname"];
            $lname = $_GET["lastname"];
            $gender = $_GET['gender'];
            $province = $_GET["province"];
        ?>

        <style>
        <?php    
            if($age<13){
                $bg = "bg_kid.png";
               
                echo"
                body{
                    background-image: url($bg);
                    color: blue;
                }
                div{
                    background-color: rgba(255,230,20,0.8);
                    }";
            }else{
                if($gender==='male'){
                echo"
               body{
                   background-image: url(\"bg_men.jpg\");
                }
               div{
                    background-color: rgba(197,197,197,0.8);
                    };
                }";                   
                }else{
                echo"
                body{
                    background-image: url(\"bg_women.jpg\");
                    color: #d7005b;
                }
                div{
                    background-color: rgba(255,228,255,0.8);
                    }";
                }
            }
        echo"
        body {
            text-align: center;
        }
        div{
            text-align: center;
            width: 500px;
            margin: auto;
            padding: 50px;
            }";
        ?>
        </style>
    </head>

<body>
    <div>
    <h4>Thank you for submitting</h4>
    <h1><?php
    
    $title = "";
    if($age>=13){
        if($gender==="male"){
            $title="Mr.";
        }else{
            $title="Miss";
        }
    }

    echo "Welcome $title $fname $lname";

    ?></h1>

    <p> Your are <span><?php echo $age;?></span> years old.</p>

    <p><?php echo $province; ?></p>
    
    <p><?php 
        $filename = "motto/$province.txt"; 
        $tis620 = iconv("utf-8", "tis-620", $filename );
        $handle = fopen($tis620,"r");
        echo fgets($handle);
        fclose($handle);
        ?></p>

    </div>

</body>

</html>
