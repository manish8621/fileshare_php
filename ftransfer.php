<!DOCTYPE html>
<html>
    <head>
        <title>Download</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <center><h1>ShareIt</h1></center>
        
        <div class="out_p">
            <p>Upload</P>
            <form action="upload.php" method="post" enctype="multipart/form-data" style="margin:20px;">
                <span>select file to upload</span><br><br>
                <input type="file" name="filetoupload"/>
                <input type="submit" value="submit"></input>
            </form>
            <?php
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    if($_GET['status']=="ok")
                    echo "<div class=\"greenok\">Successfully uploaded the file</div>";
                    else if($_GET['status']=="err")
                    echo "<div class=\"redfail\">Failed to upload the file</div>";

                }
            ?>
        </div><br>

        <div class="out_p">
            <p>Download</P>
            <div class="files_div">
                <?php
                    $files_list = scandir("public");
                    for($i=2;$i<sizeof($files_list);$i++)
                    {
                        $fsize = filesize("public/".$files_list[$i]);
                        if($fsize>=1024){
                         $fsize = $fsize/1024;
                         if($fsize>=1024){
                          $fsize = $fsize/1024;
                          $fsize=$fsize." mb";
                         }
                         else
                         $fsize=$fsize." kb";
                        }
                        else
                         $fsize=$fsize." b";
                        
                        echo "<a>".$files_list[$i]."</a><p>size : ".$fsize."</p><a class=\"buttanc\" href=\"public/".$files_list[$i]."\" download>download</a><br>";
                    }
                ?>
            </div>
        </div>

    </body>
</html>