<!-- register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>회원가입</h1>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="email">이메일</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">가입하기</button>
        </form>
    </div>
</body>
</html>

<!-- register.php -->
<?php
// 데이터베이스 연결 설정
$host = 'localhost';
$username = 'username';
$password = 'password';
$dbname = 'database';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
}

// 회원가입 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 이메일 인증 코드 생성
    $verificationCode = mt_rand(100000, 999999);
    
    // 회원 정보 데이터베이스에 저장
    $sql = "INSERT INTO users (id, email, name, password, phone, email_verification) VALUES ('$id', '$name', '$email', '$password', '$phone', '$email_verification')";
    if (mysqli_query($conn, $sql)) {
        // 이메일로 인증 코드 전송 (SMTP 설정 필요)
        // ...
        
        echo "회원가입이 완료되었습니다. 이메일로 인증 코드를 확인하세요.";
    } else {
        echo "회원가입 실패: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
