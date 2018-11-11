<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class mainController extends Controller
{
    public function main(){
    	return view('term.main');
    }

    
    public function loginform(){
    	return view('components.users.login_form');
    }

    public function joinform(){
    	return view('components.users.member_join_form');
    }

    public function login(){
    	return view('components.users.login');
    }

    public function updateform(){
        $user = User::where('id', \Auth::user()['id'])->first();

        return view('components.users.update_form')->with('member', $user);
    }

    public function update(Request $request){
        User::where('id', \Auth::user()['id'])
        ->update(['name' => $request->name,
                  'password' => ($request->password)]); //encrypt
        return redirect('/');
    }
    
    public function index(){
        
        require_once("BoardDao.php");
        require_once("tools.php");

        $page = requestValue("page");
        if($page <1)
           $page = 1; // 278p24줄 밑 설명

        $dao = new BoardDao();
        $startRecord = ($page-1)*10;
        //$msgs = $dao->getManyMsgs();
        $msgs = $dao->getPageMsgs($startRecord, 10);

    
      $numPageLinks = 10;//한 페이지에 출력할 페이지 링크 수
      $numMsgs = 10; // 한 페이지에 출력할 게시글 수-num_lines
      $startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
      $endPage = $startPage + ($numPageLinks-1);
      $count = $dao->getTotalCount();//전체 게시글 수-numMsgs
      $totalPages = ceil($count/$numMsgs);
      if($endPage > $totalPages){
         $endPage = $totalPages;
      }
    return view('bbs.board')->with('page',$page)
            ->with('startRecord',$startRecord)
            ->with('msgs',$msgs)
            ->with('numPageLinks',$numPageLinks)
            ->with('numMsgs',$numMsgs)
            ->with('startPage',$startPage)
            ->with('endPage',$endPage)
            ->with('totalPages',$totalPages);
}

public function show(){
        require_once("tools.php");
  require_once("BoardDao.php");
  require_once("../member/MemberDao.php");
  session_start();
  $num = requestValue("num");
  $page = requestValue("page");
  $dao = new BoardDao();

  $dao->increaseHits($num);
  $msg = $dao->getMsg($num);

  $uid=$_SESSION["uid"];
  $mdao=new MemberDao();
$member=$mdao->getMember($uid);
  return view('bbs.view')
        ->with('num', $num)
        ->with('page', $page)
        ->with('msg', $msg);
    }

}

?>
