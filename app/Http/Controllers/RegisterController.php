<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterController extends Controller
{
    /**
     * トップ画面のデータをDBから引っ張ってくる
     * 引数：なし？
     * @return:view
     */
    public function showRegister()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view(
            'register.index',
            [
                'users' => $users,
            ]
            //usersというキーに$usersという変数（$users）をvalueとしてあげてデータを渡している
        );
    }


    /**
     * 登録画面
     * @return:view
     */
    public function showAdmin()
    {
        return view('register.admin');
    }

    /**
     * 登録する
     * 引数：Request $request
     * 戻り値：Response
     */
    public function store(Request $request)
    // $requestはララベルの基本搭載で、前のページの情報を勝手に取ってきてくれる変数。laravelだからできる
    {
        // バリデーションする
        $this->validate($request, [
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|max:254',
        ]);

        // 会員作成
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect('/');
    }


    /**
     * 編集画面を各id情報をDBから受け取って表示
     * 引数：int $id
     * @return:view
     */
    public function showEdit($id)
    {
        $users = User::find($id);

        if (is_null($users)) {
            // セッションを搭載したい
            //Session::flash('err_msg', 'データがありません。');
            return redirect('/');
        }

        return view(
            'register.edit',
            ['users' => $users]
        );
    }

    /***
     * 編集ボタンをおして編集を可能にするメソッド
     * 引数：Request $request
     * 引数：もうひとつ？！
     * 戻り値：Response
     */
    public function toEdit(Request $request)
    // この上の行の【】の中がいまいち分かってないから調べる
    {
        $users = User::find($request->id);
        $users->fill([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
        ]);
        $users->save();
        return redirect('/');
    }

    /***
     * 削除ボタンをおして削除を可能にするメソッド
     * 引数：Request $request
     * 引数：もうひとつ？！
     * 戻り値：Response
     */
    public function destroy(Request $request)
    {
        $users = User::find($request->id);
        $users->delete();
        return redirect('/');
    }
}
