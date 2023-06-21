<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>MiSaGoKR-Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>커뮤니티 게시판</h1>

        <?php
        // MySQL 연결 설정
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("MySQL 연결 실패: " . $conn->connect_error);
        }

        // 회원 관리 기능
        if (isset($_POST['delete_member'])) {
            $member_id = $_POST['member_id'];

            // 회원 삭제 쿼리 실행
            $sql = "DELETE FROM members WHERE id = $member_id";
            if ($conn->query($sql) === true) {
                echo "회원이 삭제되었습니다.";
            } else {
                echo "회원 삭제 실패: " . $conn->error;
            }
        }

        // 카테고리 추가 기능
        if (isset($_POST['add_category'])) {
            $category_name = $_POST['category_name'];

            // 카테고리 추가 쿼리 실행
            $sql = "INSERT INTO categories (name) VALUES ('$category_name')";
            if ($conn->query($sql) === true) {
                echo "카테고리가 추가되었습니다.";
            } else {
                echo "카테고리 추가 실패: " . $conn->error;
            }
        }

        // 공지사항 작성 기능
        if (isset($_POST['write_notice'])) {
            $notice_title = $_POST['notice_title'];
            $notice_content = $_POST['notice_content'];

            // 공지사항 작성 쿼리 실행
            $sql = "INSERT INTO notices (title, content) VALUES ('$notice_title', '$notice_content')";
            if ($conn->query($sql) === true) {
                echo "공지사항이 작성되었습니다.";
            } else {
                echo "공지사항 작성 실패: " . $conn->error;
            }
        }

        // MySQL 연결 종료
        $conn->close();
        ?>

        <!-- 회원 관리 -->
        <h2>회원 관리</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>아이디</th>
                    <th>이름</th>
                    <th>이메일</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // MySQL 연결 설정
                $host = 'localhost';
                $user = 'username';
                $password = 'password';
                $database = 'database';

                $conn = mysqli_connect($host, $user, $password, $database);

                // 회원 목록 조회
                $query = "SELECT * FROM members";
                $result = mysqli_query($conn, $query);

                // 회원 목록 출력
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '</tr>';
                }

                // MySQL 연결 종료
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="member_id" placeholder="회원 ID">
            <input type="submit" name="delete_member" value="회원 삭제">
        </form>

        <!-- 카테고리 추가 -->
        <h2>카테고리 추가</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="category_name" placeholder="카테고리 이름">
            <input type="submit" name="add_category" value="카테고리 추가">
        </form>

        <!-- 공지사항 작성 -->
        <h2>공지사항 작성</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="notice_title" placeholder="공지사항 제목">
            <textarea name="notice_content" placeholder="공지사항 내용"></textarea>
            <input type="submit" name="write_notice" value="공지사항 작성">
        </form>

        <!-- HTML 구성 요소 및 디자인 -->
        <!-- ... -->
        
        <script>
            // JavaScript 및 jQuery 코드
            // ...
        </script>
    </div>
</body>
</html>
