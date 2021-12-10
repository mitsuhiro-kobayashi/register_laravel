<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録システム</title>
    <!-- script -->
    <script src="{{ asset('js/app.js') }}" defer></script> 
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body　class="signup text-center">
    <h2>会員登録システムトップ画面</h2>
    <button type="button" class="btn-primary" onclick="location.href='/admin'">登録</button>
    <hr>
    <table class="table">
        <tr>
            <th>名前</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th></th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td><button type="button" class="btn-primary" onclick="location.href='/edit/{{ $user->id }}'">編集</button></td>
        </tr>
        @endforeach
    </table>
</body>
</html>