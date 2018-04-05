<?php

function fetchTable()
{
    $conn = mysqli_connect('localhost', 'root', '', 'friends');
    if (mysqli_connect_errno($conn)) {
        echo "접속오류 발생: " . mysqli_connect_error($conn);
        exit;
    }
// 한글깨짐 방지를 위한 글자코드변경-mysql서버로 코드도 한글깨짐 방지를 위해 utf8
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $sql = "SELECT * FROM name_list";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>\n";
        echo "<td>{$row['id']}</td>\n";
        echo "<td>{$row['name']}</td>\n";
        echo "<td>{$row['sex']}</td>\n";
        echo "<td>{$row['age']}</td>\n";
        echo "</tr>\n";
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
        <h1>Topic</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>이름</th>
                <th>성별</th>
                <th>나이</th>
            </tr>
            <?php fetchTable(); ?>
        </table>
        <h2>친구등록</h2>
        <form action="create_process_name_list.php" method="post">
            <p><label>이름 </label><input type="text" name="name" style="width:50px"/></p>
            <p><label>성별 </label><select name="sex">
                    <option value="남자">남자</option>
                    <option value="여자">여자</option>
                </select></p>
            <p><label>나이 </label><input type="text" name="age" style="width:50px"/></p>
            <p><input type="submit" value="등록"/></p>


        </form>


    </body>
</html>
