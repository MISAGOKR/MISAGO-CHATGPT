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
<!-- verify.php -->
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

// 이메일 인증 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $verificationCode = $_POST['verificationCode'];

    // 이메일과 인증 코드를 확인하여 회원 인증 처리
    $sql = "SELECT * FROM users WHERE email = '$email' AND verification_code = '$verificationCode'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) === 1) {
        // 회원 인증 처리
        $sql = "UPDATE users SET verified = 1 WHERE email = '$email'";
        if (mysqli_query($conn, $sql)) {
            echo "이메일 인증이 완료되었습니다.";
        } else {
            echo "이메일 인증 실패: " . mysqli_error($conn);
        }
    } else {
        echo "잘못된 이메일 또는 인증 코드입니다.";
    }
}

mysqli_close($conn);
?>

