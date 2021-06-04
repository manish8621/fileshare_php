<?php
    $target_path = "/home/mk/Documents/web/shareit_php/public/";
    $target_path = $target_path.basename($_FILES['filetoupload']['name']);
    if(move_uploaded_file($_FILES['filetoupload']['tmp_name'],$target_path))
    {
        header("Location: /ftransfer.php?status=ok");
        exit;
    }
    else
    {
        header("Location: /ftransfer.php?status=err");
        exit;
    }
?>