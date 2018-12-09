<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reboard extends Model
{
    public $fillable=['title','writer','content'];
//    protected $primaryKey = 'id';


    public function updateMsg($id, $title, $content){
        Reboard::find($id)->update([
            'id'=>$id,
            'title'=>$title,
            'content'=>$content,
        ]);
    }
}
