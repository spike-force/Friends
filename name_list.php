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
        echo "<td><a href='name_list.php?id={$row['id']}'>편집</a></td>";
        echo "<td>
                  <form action='delete_name_list.php' method='POST' onsubmit=\"
                  if(!confirm('등록리스트에서 삭제하시겠습니까?')){return false;}\">
                    <input type='hidden' name='id' value='{$row['id']}'/>
                    <input type='submit' value='삭제'/>
                  </form>

              </td>";
        echo "</tr>\n";
    }
}

$form_data = array(
            'id' => "",
            'action'=>'create_process_name_list.php',
            'submit'=>'등록',
            'name' =>"",
            'sex' =>"",
            'age'=>""
             );


if(isset($_GET['id']))
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

    $sql = "SELECT * FROM name_list WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $form_data = array(
            'id' => "<input type='hidden' name='id' value='{$row['id']}'>",
            'action'=>'update_process_name_list.php',
            'submit'=>'편집등록',
            'name' =>"{$row['name']}",
            'sex' =>"{$row['sex']}",
            'age'=>$row['age']
             );

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
                <th colspan="2">변경</th>
            </tr>
            <?php fetchTable(); ?>
        </table>
        <h2>친구등록</h2>
        <form action="<?= $form_data['action'] ?>" method="post">
            <?= $form_data['id'] ?>
            <p><label>이름 </label><input type="text" name="name"
                    style="width:50px" value="<?= $form_data['name'] ?>"/></p>
            <p><label>성별 </label><select name="sex">
                    <option label="<?= $form_data['sex'] ?>"></option>
                    <option value="남자">남자</option>
                    <option value="여자">여자</option>
                </select></p>
            <p><label>나이 </label><input type="text" name="age"
                    style="width:50px" value="<?= $form_data['age'] ?>"/></p>
            <p><input type="submit" value="<?= $form_data['submit'] ?>"/></p>


        </form>


    </body>
</html>
