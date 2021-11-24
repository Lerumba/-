<?php

        $user = [];
        $all_users = [
            'id'=> [1, 2, 3],
            'name'=> ['Name 1', 'Name 2', 'Name 3'],
            'e-mail'=> ['Mail 1', 'Mail 2', 'Mail 3']
        ];
        $check_user = True;
        $check_same_mail = False;
        foreach ($_POST as $key => $value) {
            $user[$key] = $value;
            if($user[$key] == ''){
                $check_user = False;
            }
        }
        if($check_user == False){

    if ($_POST['name'] == '') 
    {
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Введите имя</p></br>";
    }
    if ($_POST['surname'] == '') 
    {
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Введите фамилию</p></br>";
    } 
    if ($_POST['email'] == '') 
    {
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Введите E-mail</p></br>";
    } 
    if(!strpos($_POST['email'], '@') && $_POST['email'] !== ''){
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Некорректный E-mail</p></br>";
    }
    else{
        for ($i=0; $i < count($all_users['e-mail']); $i++) { 
            if($all_users['e-mail'][$i] == $_POST['email']){
                $check_same_mail = True;
            }
        }
    }
    if($check_same_mail){
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Пользователь с такой почтой уже зарегистрирован!</p></br>";
    };
    if ($_POST['password'] == '') 
    {
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Введите пароль</p></br>";
    }
    if ($_POST['repeat_password'] == '') 
    {
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Повторите пароль</p></br>";
    }  
    if(($_POST['password'] != $_POST['repeat_password']) && ($_POST['repeat_password'] != '') && ($_POST['password'] != '')){
        echo "<p style='text-align: center; font-family: Comfortaa; color: red; margin-bottom: -15px;'>Пароли не совпадают</p></br>";
    }
}
else{
    $id = count($all_users['id'])+1;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    array_push($all_users['id'], $id);
    array_push($all_users['name'], $name);
    array_push($all_users['e-mail'], $email);
    }
$filename = 'array.txt';
$data = serialize($all_users);
$data = json_encode($all_users);
file_put_contents($filename, $data);
?>