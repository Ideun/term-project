<?php
    require("WebhardDAO.php");
    $dao = new WebhardDao();
            
    $file_name = $dao->deleteFileInfo($_REQUEST["num"]);
    unlink("files/$file_name");
    
    header("Location: write_form2.php?sort=$_REQUEST[sort]" 
                               . "&dir=$_REQUEST[dir]");
?>
