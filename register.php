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
    $sql = "INSERT INTO users (email, password, verification_code) VALUES ('$email', '$password', '$verificationCode')";
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
