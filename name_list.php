<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Friends</title>
    </head>
    <body>
        <h1>Topic</h1>
        <ol>
            <li>이철우</li>
            <li>안병현</li>
            <li>이헌준</li>
        </ol>
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
