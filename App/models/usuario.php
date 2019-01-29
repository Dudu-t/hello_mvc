<?php
namespace models;
require_once 'App/models/database.php';
class usuario{
    public function authUser($usuario, $senha){

            $db = new database();
            $db = $db->connect();
            if ($db) {
                try {
                    $data = $db->prepare('select * from users where user = :user and pass = md5(:pass)');
                    $data->bindValue(':user', $usuario);
                    $data->bindValue(':pass', $senha);
                    $data->execute();
                    if ($data->rowCount() == 1){
                        return $data->fetch()[1];
                    }
                    else{
                        return 0;
                    }
                }catch(\Exception $e) {
                    echo $e->getMessage();
                }
            }
    }
}