<!DOCTYPE html>
<html>
<head>
    <title>게시물</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .post-content {
            margin-bottom: 20px;
        }
        .post-files {
            list-style: none;
            padding: 0;
        }
        .post-files li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>게시물</h1>

        <?php
        // MySQL 연결 설정
        $host = "localhost";
        $username = "your_username";
        $password = "your_password";
        $database = "your_database";

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("MySQL 연결 실패: " . mysqli_connect_error());
        }

        // 게시물 ID 파라미터 받기
        $postId = $_GET['id'];

        // 게시물 조회
        $query = "SELECT * FROM posts WHERE id = '$postId'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $postTitle = $row['title'];
            $postContent = $row['content'];

            echo "<h2>$postTitle</h2>";
            echo "<div class='post-content'>$postContent</div>";

            // 첨부 파일 조회
            $fileQuery = "SELECT * FROM files WHERE post_id = '$postId'";
            $fileResult = mysqli_query($conn, $fileQuery);

            if (mysqli_num_rows($fileResult) > 0) {
                echo "<h3>첨부 파일</h3>";
                echo "<ul class='post-files'>";
                while ($fileRow = mysqli_fetch_assoc($fileResult)) {
                    $fileName = $fileRow['name'];
                    $fileUrl = $fileRow['url'];
                    echo "<li><a href='$fileUrl' target='_blank'>$fileName</a></li>";
                }
                echo "</ul>";
            }
        } else {
            echo "게시물이 없습니다.";
        }

        mysqli_close($conn);
        ?>

        <h3>댓글 작성</h3>

        <form method="POST" action="comment.php">
            <div class="form-group">
                <label for="comment">댓글 내용:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">댓글 작성</button>
        </form>
    </div>
</body>
</html>
