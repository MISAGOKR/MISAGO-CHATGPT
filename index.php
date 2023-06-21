<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>커뮤니티 게시판 - 로그인</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>커뮤니티 게시판</h1>

        <?php
        session_start();

        // 로그인 기능
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // 사용자 인증을 위한 DB 조회 및 비밀번호 검증
            $authenticated = authenticateUser($username, $password);

            if ($authenticated) {
                $_SESSION['username'] = $username;

                // 자동 로그인 기능
                if (isset($_POST['remember'])) {
                    setcookie('username', $username, time() + (86400 * 30), '/'); // 쿠키 유효 기간: 30일
                }

                header('Location: welcome.php');
                exit();
            } else {
                echo '<div class="alert alert-danger">로그인에 실패했습니다.</div>';
            }
        }

        // 로그인 인증 기능
        if (isset($_SESSION['username'])) {
            // 로그인 상태인 경우
            header('Location: welcome.php');
            exit();
        }
        ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">사용자명:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">비밀번호:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">자동 로그인</label>
            </div>
            <button type="submit" class="btn btn-primary">로그인</button>
        </form>
    </div>
</body>
</html>
