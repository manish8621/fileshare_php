<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $data = $_POST['clip_data'];
        $fick_file = fopen("public/fick.txt","w") or die("unable to open file");
        fwrite($fick_file,$data);
        fclose($fick_file);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>

        <center><h1>ShareIt</h1></center>

        <a class="buttanc" href="/ftransfer.php">File Transfer</a>
        
        <div class="out_p">
            <p>Paste here</p>

            <form method="post" action="/index.php" name="formta">
                <div class=centerc>
                <textarea name="clip_data" placeholder="Paste here"></textarea>
                
                <button type="submit">send</button>
            </div>
            </form>

        </div>
        <br>
        <div class="out_p">
            <p>Pasted text ...</p>
            
            <p class="data_d">
                <?php
                    $data_from_file = fopen("public/fick.txt","r") or die("unable to open file");
                    $data_f = fread($data_from_file,filesize("public/fick.txt"));
                    echo str_replace("\n","<br>",$data_f);
                    fclose($data_from_file);
                ?>
            </p>
        </div>
    </body>
</html>