<!DOCTYPE html>
<html>
<head>
    <title>게시판</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .post-list {
            list-style: none;
            padding: 0;
        }
        .post-list li {
            margin-bottom: 10px;
        }
        .post-list li a {
            display: block;
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>게시판</h1>

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

        // 카테고리 ID 파라미터 받기
        $categoryId = $_GET['category'];

        // 선택한 카테고리의 게시물 조회
        $query = "SELECT * FROM posts WHERE category_id = '$categoryId'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<ul class='post-list'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $postId = $row['id'];
                $postTitle = $row['title'];
                echo "<li><a href='post.php?id=$postId'>$postTitle</a></li>";
            }
            echo "</ul>";
        } else {
            echo "등록된 게시물이 없습니다.";
        }

        mysqli_close($conn);
        ?>

    </div>
</body>
</html>
