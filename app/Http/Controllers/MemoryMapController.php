<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\gaishutsu_kiroku;
use Intervention\Image\Facades\Image;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MemoryMapController extends Controller
{

    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 利用規約画面を返却する
    public function kiyaku()
    {
        return view('kiyaku');
    }

    // プライバシーポリシー画面を返却する
    public function policy()
    {
        return view('policy');
    }

    // ログイン画面を返却する
    public function toLogin()
    {
        return view('login');
    }

    // Map画面を返却する
    public function displayMap()
    {

        //ログイン情報取得
        $user = Auth::user();
        $userid = Auth::id();

        //インスタンス化
        $data = gaishutsu_kiroku::where('user_id', $userid)->get();

        return view('displayMap', ['data' => $data, 'user' => $user]);
    }

    // 登録画面を返却する
    public function torokuGamen()
    {
        //ログイン情報取得
        $user = Auth::user();
        return view('torokuGamen', ['user' => $user]);
    }

    // 登録画面の入力値をＤＢに登録する
    public function insertInfo(Request $request)
    {

        $this->validate(
            $request,
            [
                'name'   => 'required',
                'ido'    => 'required|numeric',
                'keido'  => 'required|numeric',
                'date'   => 'required',
            ],
            [
                'name.required' => ':attributeは必須です',
                'ido.required'  => ':attributeは必須です',
                'ido.numeric'   => ':attributeは数字を入力して下さい',
                'keido.required'  => ':attributeは必須です',
                'keido.numeric'   => ':attributeは数字を入力して下さい',
                'date.required'  => ':attributeは必須です',
            ],
            [
                'name' => '場所',
                'ido' => '緯度',
                'keido' => '経度',
                'date' => '日付',
            ]
        );

        //ログイン情報取得
        $userid = Auth::id();

        $name = $request->input('name');
        $ido = $request->input('ido');
        $keido = $request->input('keido');
        $com = $request->input('com');
        $date = $request->input('date');

        $file = $request->file('file');
        $path = null;
        // 第一引数はディレクトリの指定
        // 第二引数はファイル
        // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
        if ($file != null) {
            $path = Storage::disk('s3')->putFile('/picture', $file, 'public');
            // hogeディレクトリにアップロード
            // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
            // ファイル名を指定する場合はputFileAsを利用する
            // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
        }

        //インスタンス化
        $gaishutsu_kiroku = new gaishutsu_kiroku();

        // データベースに値をinsert
        $gaishutsu_kiroku->create([
            'user_id' => $userid,
            'place_name' => $name,
            'place_comment' => $com,
            'ido' => $ido,
            'keido' => $keido,
            'place_date' => $date,
            'file_name' => $path,
        ]);

        return redirect('/torokuGamen')->with('message', $name);
    }

    // 一覧画面を返却する
    public function ichiranGamen()
    {

        //ログイン情報取得
        $user = Auth::user();
        $userid = Auth::id();

        //インスタンス化
        $data = gaishutsu_kiroku::where('user_id', $userid)
            ->orderBy('place_date', 'asc')->get();

        $array_count = count($data);

        $images = array();
        $images = [];

        for ($cnt = 0; $cnt < $array_count; $cnt++) {

            $path = "/image/noimage.png";
            if ($data[$cnt]['file_name'] != null) {
                $path = Storage::disk('s3')->url($data[$cnt]['file_name']);
            }
            $images[] = $path;
        }
        return view('ichiranGamen', ['data' => $data, 'user' => $user], compact('images'));
    }

    // 詳細画面を返却する
    public function shosaiGamen(Request $request, $id)
    {

        //ログイン情報取得
        $user = Auth::user();

        $data = gaishutsu_kiroku::where('id', $id)->get();
        $file_name = $data[0]['file_name'];

        $path = "/image/noimage.png";
        if ($file_name != null) {
            $path = Storage::disk('s3')->url($data[0]['file_name']);
        }

        //return view('shosaiGamen',compact('data','path'));
        return view('shosaiGamen', ['data' => $data, 'user' => $user, 'path' => $path]);
    }

    // 編集画面を返却する
    public function henshuGamen(Request $request)
    {

        //ログイン情報取得
        $user = Auth::user();

        $id = $request->input('id');
        $data = gaishutsu_kiroku::where('id', $id)->get();

        //
        return view('henshuGamen', ['data' => $data, 'user' => $user]);
    }

    // 編集画面の入力値をＤＢに登録する
    public function updateInfo(Request $request)
    {

        $file = $request->file('file');
        if ($file != null) {
            $path = Storage::disk('s3')->putFile('/picture', $file, 'public');
        }

        $id = $request->input('id');
        $com = $request->input('com');
        $date = $request->input('date');

        //インスタンス化
        $gaishutsu_kiroku = new gaishutsu_kiroku();

        // データベースの値をupdate
        $data = gaishutsu_kiroku::where('id', $id)->update(['place_date' => $date, 'place_comment' => $com, 'file_name' => $path]);

        // 一覧画面へリダイレクト
        return redirect('/ichiranGamen')->with('message', '修正しました');;
    }

    // ＤＢからレコードを削除する
    public function deleteInfo(Request $request)
    {

        //インスタンス化
        $id = $request->input('id');

        gaishutsu_kiroku::where('id', $id)->delete();

        // 一覧画面へリダイレクト
        return redirect('/ichiranGamen')->with('message', '削除しました');
    }
}
