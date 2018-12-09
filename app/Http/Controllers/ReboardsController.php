<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reboard;

class ReboardsController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); // auth 반드시 거쳐라! 로그인 돼있는지 안돼있는지
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $msgs = Reboard::orderBy('created_at','desc')->paginate(5);
        $page = $request->page;
        return view('components.etc.recommend')->with('page',$page)
            ->with('msgs',$msgs);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.etc.write_form');
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

        Reboard::create([
            'writer' => \Auth::user()['name'],
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('reboards');//->with('message','새로운 글이 정상적으로 입력되었씁니다.');


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
        $msg = Reboard::where('id', $id)->first();
//        return response()->json($msg, 200, [], JSON_PRETTY_PRINT);


        return view('components.etc.view')
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
        $msg = Reboard::where('id', $id)
            ->first();

        return view('components.etc.modify_form')->with('msg', $msg);
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

        Reboard::where('id', $id)
            ->update([
                'title' => $request->title,
                'writer' => $request->writer,
                'content' => $request->content,
            ]);

        return redirect('reboards');

        //$page = $request->page;


        //if($content && $title && $writer){
        /*
        $dao = new BoardDao();
        $dao->updateMsg($num, $title, $writer, $content);
*/

        $b = Reboard::find($id);
        $b->update([
            'id'=>$id,
            'title'=>$title,
            'content'=>$content]);

        return redirect('reboards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = Reboard::find($id);
        $b->delete();

        return redirect('reboards');



    }
}
