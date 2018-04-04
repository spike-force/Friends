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
$row['name'] = htmlspecialchars($_POST['name']);
$row['sex'] = htmlspecialchars($_POST['sex']);
$row['age'] = htmlspecialchars($_POST['age']);
//var_dump($row);
$sql = "INSERT INTO name_list (name, sex, age) VALUES('{$row['name']}', '{$row['sex']}', {$row['age']})";
//var_dump($sql);

//$filtered = mysqli_real_escape_string($conn, $sql);
//mysqli_query($conn, $filtered);

if(!mysqli_query($conn, $sql)){
    echo "생성오류 발생: ".mysqli_error($conn);
    exit;
}
header('Location: name_list.php');

?>

