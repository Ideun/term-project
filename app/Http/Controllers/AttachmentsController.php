<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Attachment;
class AttachmentsController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }
    public function store(Request $request) {
        if($request->hasFile('file')) {
            $file = $request->file('file');

            $filename = /*str_random().*/filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
            // url에 적합하지 않은 문자 있으면 filter로 없애줌
            $bytes = $file->getSize();
            $user = \Auth::user();
            $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id;

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
                // 요 폴더에 있는 애들은 읽고 쓰고 실행권한 다줌
            }

            $file->move($path, $filename);
            // 임시폴더에 저장된 $file 너 $path 이폴더에 filname이걸로 move
            // 여기까지가 1번

            /* 여기부터 2번 */
            $payload = [
                'filename'=>$filename,
                'bytes'=> $bytes,
                'mime'=>$file->getClientMimeType()
            ];
            // 배열로 이렇게 주는거는 attachment 모델에 fillable해줘야한다고
            $attachment =  Attachment::create($payload);
            // 여기까지 2번
        }
        /* 여기부터 3번 */
        \Log::debug('AttachmentsController store', ['stpe'=>7]);
        return response()->json($attachment, 200);
    }
    public function destroy(Request $request, $id) {
        $filename =  $request->filename;
        $attachment = Attachment::find($id);
        $attachment->deleteAttachedFile($filename);
        $attachment->delete();
        $user = \Auth::user();
        /*
        $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        */
        return $filename;
    }
}