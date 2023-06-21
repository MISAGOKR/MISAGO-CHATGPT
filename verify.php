<!-- verify.php -->
<!DOCTYPE html>
<html>
<head>
    <title>이메일 인증</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>이메일 인증</h1>
        <form method="POST" action="verify.php">
            <div class="form-group">
                <label for="email">이메일</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="verificationCode">인증 코드</label>
                <input type="text" class="form-control" id="verificationCode" name="verificationCode" required>
            </div>
            <button type="submit" class="btn btn-primary">인증하기</button>
        </form>
    </div>
</body>
</html>
