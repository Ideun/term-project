<?php
class BoardDAO {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "");

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
    }



    public function insertMsg($title, $writer, $content) {
        // sql문 만들고.. insert문
        // prepare 시키고
        // 넘어온 값 binding 시키고
        // 실행요청하고..
        try {
            $sql = "insert into board2(title, writer, content) values(:title, :writer, :content)";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
            $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":content", $content, PDO::PARAM_STR);

            $pstmt->execute();

        }catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function updateMsg($num, $title, $writer, $content){
        try{
            /*
                1. prepare
                   실행할 sql 문을 db서버에 전송
                   db서버는 그 sql문을 parsing을 통해 문법검사를 하고
                   그 sql문에서 접근하는 테이블과 칼럼이 존재하는지,
                   사용자가 그 작업을 할 수 있는지 권한을 check 하는 등의
                   정당성 검사(validation check)를 한 후 실행 계획을 세운다
                2. data binding
                   실행에 필요한 데이터를 공급해줌
                3. execute
                   실행준비된 sql문의 실행을 db서버에게 요청
                   이 때 실행에 필요한 데이터도 함께 db서버에게 전달됨
            */
            $sql = "update board2 set title=:title, writer=:writer,
                                     content=:content where num=:num";

            $pstmt = $this->db->prepare($sql);

            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
            $pstmt->bindValue(":writer" , $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":content", $content, PDO::PARAM_STR);

            $pstmt->execute();
                                  
        } catch(PDOException $e){
            exit($e->getMessage());
        }
    }

    public function getManyMsgs() { // 게시글 다가져온당
        try {
            /*
                1. sql: select * from board;
                2. prepare
                3. binding X, execute O
            */
            $sql = "select * from board2";   
            $pstmt = $this->db->prepare($sql);  
            $pstmt->execute();
            $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e) {
            exit($e->getMessage());
        }

        return $msgs;
    }

    public function getMsg($num) { // 게시글 가져온당
        try {
            $sql = "select * from board2 where num=:num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_STR);
            $pstmt->execute();

            $msg = $pstmt->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e) {
            exit($e->getMessage());
        }
        return $msg;
    }

    public function increaseHits($num) {
        try {
            // update board set hits=hits+1 where num=:num
            $sql = "update board2 set hits=hits+1 where num=:num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
    public function increaseRec($num){
        try{
            $sql = "update board set rec=rec+1 where num=:num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
    */
    public function deleteMsg($num) {
        try {
            // update board set hits=hits+1 where num=:num
            $sql = "delete from board2 where num=:num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
    }  

    function getPageMsgs($startRecord, $count){
        try {
            /*
                1. sql: select * from board;
                2. prepare
                3. binding X, execute O
            */
            $sql = "select * from board2 order by num desc limit :startRecord, :count";  

            $pstmt = $this->db->prepare($sql); 

            $pstmt->bindValue(":startRecord", $startRecord, PDO::PARAM_INT);
            $pstmt->bindValue(":count", $count, PDO::PARAM_INT);

            $pstmt->execute();
            $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e) {
            exit($e->getMessage());
        }

        return $msgs;
    }

    public function getTotalCount(){ // getNumMsgs
        try{
            $sql = "select count(*) from board2";
            $pstmt = $this->db->prepare($sql);
            $pstmt -> execute();

            $count = $pstmt -> fetchColumn();
        } catch(PDOException $e){
            exit($e->getMessage());
        }
        return $count;
    }

    

}   



?>