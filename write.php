<!-- write.php -->
<!DOCTYPE html>
<html>
<head>
    <title>게시판 글 작성</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>게시판 글 작성</h1>

        <?php
        // MySQL 연결 설정
        $host = "localhost";
        $username = "username";
        $password = "password";
        $database = "database";

        // MySQL 연결
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("MySQL 연결 실패: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $category = $_POST["category"];
            $userid = $_POST["userid"];

            // 파일 추가 기능
            // ...

            $datetime = date("Y-m-d H:i:s");

            // 게시글을 저장하는 MySQL 쿼리
            $sql = "INSERT INTO posts (title, content, category, userid, datetime)
                    VALUES ('$title', '$content', '$category', '$userid', '$datetime')";

            if ($conn->query($sql) === TRUE) {
                echo "게시글이 성공적으로 작성되었습니다.";
            } else {
                echo "게시글 작성 실패: " . $conn->error;
            }
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">내용</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">카테고리</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="form-group">
                <label for="userid">작성자 아이디</label>
                <input type="text" class="form-control" id="userid" name="userid" required>
            </div>
            <div class="form-group">
                <label for="file">파일 첨부</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">작성하기</button>
        </form>
    </div>
</body>
</html>
