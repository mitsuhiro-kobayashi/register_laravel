<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
    <!-- script -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="{{ url('admin') }}" enctype="multipart/form-data" onsubmit="return checkAdmin()">
        @csrf
            <h1 class="h3 mb-3 fw-normal">会員登録</h1>
            <label for="inputPassword" class="visually-hidden">名前</label>
            <input type="text" id="inputPassword" name="name" class="form-control" placeholder="名前" required>
            <label for="inputPassword" class="visually-hidden">電話番号</label>
            <input type="tel" id="inputPassword" name="phone" class="form-control" placeholder="電話番号" required>
            <label for="inputEmail" class="visually-hidden">Eメールアドレス</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">登録する</button>
        </form>
    </main>
    <script>
        function checkAdmin(){
            if(window.confirm('登録してもよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>