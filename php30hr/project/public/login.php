<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-1 col-md-4 offset-md-4 my-5">
                <h4>電商後台</h4>
                <div class="card shadow-sm">
                    <div class="card-header">登入系統</div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="account" class="form-label">登入帳號</label>
                                <input name="account" type="text" class="form-control" id="account" placeholder="請輸入email格式的帳號" require>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">登入密碼</label>
                                <input name="password" type="text" class="form-control" id="password" placeholder="請輸入密碼" require>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">登入</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>