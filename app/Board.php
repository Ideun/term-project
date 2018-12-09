<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //public $timestamps = false;

    public $fillable=['title','writer','content', 'hits'];
//    protected $primaryKey = 'id';


    public function updateMsg($id, $title, $content){
        Board::find($id)->update([
            'id'=>$id,
            'title'=>$title,
            'content'=>$content,
        ]);
    }

}
