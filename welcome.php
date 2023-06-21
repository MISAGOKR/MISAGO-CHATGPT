<!-- welcome.php -->
<!DOCTYPE html>
<html>
<head>
    <title>커뮤니티 게시판 - 환영합니다</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>커뮤니티 게시판 - 환영합니다</h1>

        <?php
        session_start();

        // 로그인 인증 기능
        if (!isset($_SESSION['username'])) {
            // 로그인하지 않은 상태인 경우
            header('Location: index.php');
            exit();
        }

        $username = $_SESSION['username'];
        echo '<div class="alert alert-success">로그인 성공! 환영합니다, ' . $username . '님.</div>';
        ?>

        <!-- 환영 페이지 내용 -->
        <!-- ... -->
    </div>
</body>
</html>
