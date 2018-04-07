<?php
$conn = mysqli_connect('localhost', 'root', '', 'friends');
if(mysqli_connect_errno($conn)){
    echo "접속오류 발생: ".mysqli_connect_error($conn);
    exit;
}
// 한글깨짐 방지를 위한 글자코드변경-mysql서버로 코드도 한글깨짐 방지를 위해 utf8
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

//var_dump($_POST);
$row = array();
$row['id'] = htmlspecialchars($_POST['id']);
//var_dump($row);
$sql = "DELETE FROM name_list WHERE id = {$row['id']}";
//var_dump($sql);

//$filtered = mysqli_real_escape_string($conn, $sql);
//mysqli_query($conn, $filtered);

if(!mysqli_query($conn, $sql)){
    echo "삭제 오류 발생: ".mysqli_error($conn);
    exit;
}
header('Location: name_list.php');

?>

