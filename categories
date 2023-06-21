<!DOCTYPE html>
<html>
<head>
    <title>게시판 카테고리</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .category-list {
            list-style: none;
            padding: 0;
        }
        .category-list li {
            margin-bottom: 10px;
        }
        .category-list li a {
            display: block;
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>카테고리 게시판</h1>

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

        // 카테고리 목록 조회
        $query = "SELECT * FROM categories";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<ul class='category-list'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $categoryId = $row['id'];
                $categoryName = $row['name'];
                echo "<li><a href='board.php?category=$categoryId'>$categoryName</a></li>";
            }
            echo "</ul>";
        } else {
            echo "등록된 카테고리가 없습니다.";
        }

        mysqli_close($conn);
        ?>

    </div>
</body>
</html>
