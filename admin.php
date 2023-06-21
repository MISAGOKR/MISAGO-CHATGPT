<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>관리자 페이지</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>관리자 페이지</h1>

        <!-- 회원 추가 폼 -->
        <h2>회원 추가</h2>
        <form action="add_member.php" method="POST">
            <label for="username">사용자명:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">비밀번호:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">추가</button>
        </form>

        <!-- 회원 삭제 폼 -->
        <h2>회원 삭제</h2>
        <form action="delete_member.php" method="POST">
            <label for="member_id">회원 ID:</label>
            <input type="text" id="member_id" name="member_id" required>
            <button type="submit">삭제</button>
        </form>

        <!-- 회원 관리 테이블 -->
        <h2>회원 관리</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>사용자명</th>
                    <th>비밀번호</th>
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

        <!-- 게시판 카테고리 추가 폼 -->
        <h2>게시판 카테고리 추가</h2>
        <form action="add_category.php" method="POST">
            <label for="category_name">카테고리 이름:</label>
            <input type="text" id="category_name" name="category_name" required>
            <button type="submit">추가</button>
        </form>
    </div>
</body>
</html>
