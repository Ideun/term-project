
$num = requestValue("num");
$page = requestValue("page");
$dao = new BoardDao();


$txt=$dao->getCmt($num);



<table>

    @foreach($txt as $msg) :
    <tr>
        <td><?= $msg["cwriter"] ?> </td>
        <td><?= $msg["comment"] ?> </td>

    </tr>
    @endforeach
</table>