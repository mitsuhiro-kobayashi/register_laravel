<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
    <!-- script -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="" onsubmit="return checkSubmit()">
        @csrf 
            <h1 class="h3 mb-3 fw-normal">会員編集</h1>
            <h2>会員NO：{{ $users->id }}</h2>
            <label for="inputPassword" class="visually-hidden"></label>
            <input type="text" id="inputPassword" name="name" class="form-control" placeholder="" value="{{ $users->name }}" required>
            <label for="inputPassword" class="visually-hidden">電話番号</label>
            <input type="tel" id="inputPassword" name="phone" class="form-control" placeholder="" value="{{ $users->phone }}" required>
            <label for="inputEmail" class="visually-hidden">Eメールアドレス</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="" value="{{ $users->email }}" required autofocus>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="id" value="{{ $users->id }}">編集</button>
        </form>
        <form method="POST" action="" onsubmit="return checkSubmit()">
            @csrf
            {{ method_field('DELETE') }}   
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="id" value="{{ $users->id }}">削除</button>
        </form>
    </main>
    <script>
        function checkSubmit(){
            if(window.confirm('本当によろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>