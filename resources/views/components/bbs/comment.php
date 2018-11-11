<?php
 require_once ("BoardDao.php");
$num = requestValue("num");
$page = requestValue("page");
$dao = new BoardDao();


$txt=$dao->getCmt($num);



?>


<table>

    <?php foreach($txt as $msg) :
        ?>
    <tr>
        <td><?= $msg["cwriter"] ?> </td>
        <td><?= $msg["comment"] ?> </td>
   
    </tr>
<?php endforeach; ?>
</table>