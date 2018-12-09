<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\User;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth'); // auth 반드시 거쳐라! 로그인 돼있는지 안돼있는지
        $this->middleware('own')->only(['update','destroy']);
    }

    public function index(Request $request)
    {

        $msgs = Board::orderBy('created_at','desc')->paginate(5);
        $page = $request->page;
        $search = $request->search;
        $state = $request->state;
        if($search) {
            switch ($state) {

                case "title":
                    $msgs = Board::where('title','like',"%$search%")->orderBy('created_at', 'desc')->paginate(5);
                    break;

                case "content":
                    $msgs = Board::where('content','like',"%$search%")->orderBy('created_at', 'desc')->paginate(5);
                    break;

                case "writer":
                    $msgs = User::select(['users.name','boards.id','boards.title','boards.hits','boards.created_at'])
                        ->join('boards', 'boards.user_id', '=', 'users.id')
                        ->where('users.name', 'LIKE', "%$search%")->orderBy('id', 'desc')->paginate(5)->onEachSide(5);
                    break;

                case "titlencontent":
                    $msgs = Board::where('title','like',"%$search%")->orWhere('content','like',"%$search%")->orderBy('created_at', 'desc')->paginate(5);
                    break;
            }
        }

        return view('components.bbs.board')->with('page',$page)
            ->with('msgs',$msgs)
            ->with('search',$search)
            ->with('state',$state);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.bbs.write_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Board::create([
            'writer' => \Auth::user()['name'],
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('boards');//->with('message','새로운 글이 정상적으로 입력되었씁니다.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $page = $request->page;
        $msg = Board::where('id', $id)->first();
//        return response()->json($msg, 200, [], JSON_PRETTY_PRINT);
        $msg->update(['hits'=>$msg->hits+1]);
        //update boards set Hits=Hits+1 where id=4;


        return view('components.bbs.view')
            ->with('id', $id)
            ->with('page', $page)
            ->with('msg', $msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        /*
        $page = $request->page;

        $msg = Board::where('id', $id)->first();

        return view('components.bbs.modify_form')
            ->with('id', $id)
            ->with('page', $page)
            ->with('msg', $msg);
        */
        $msg = Board::where('id', $id)
            ->first();

        return view('components.bbs.modify_form')->with('msg', $msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Board::where('id', $id)
            ->update([
                'title' => $request->title,
                'writer' => $request->writer,
                'content' => $request->content,
            ]);

        return redirect('boards');

        //$page = $request->page;


        //if($content && $title && $writer){
        /*
        $dao = new BoardDao();
        $dao->updateMsg($num, $title, $writer, $content);
*/

        $b = Board::find($id);
        $b->update([
            'id'=>$id,
            'title'=>$title,
            'content'=>$content]);

        return redirect('boards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = Board::find($id);
        $b->delete();

        return redirect('boards');



    }
}
