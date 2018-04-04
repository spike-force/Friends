<?php

function makelistfromDatabase()
{
    $conn = mysqli_connect('localhost', 'root', '', 'friends');
    if(!$conn){
        echo "접속오류 발생: ".mysqli_error($conn);
    }
    // 한글깨짐 방지를 위한 글자코드변경-mysql서버로 코드도 한글깨짐 방지를 위해 utf8
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");

    $sql = "SELECT * FROM name_list";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<li>{$row['name']}</li>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Friends</title>
    </head>
    <body>
        <h1>Friends</h1>
        <ol>
            <?php makelistfromDatabase(); ?>
        </ol>
        <h2>환영합니다.</h2>
        <article>
            친구에 관한 홈페이지에 오실 걸 환엽합니다.
        </article>
        <footer>
            일본 도쿄
        </footer>

    </body>
</html>
