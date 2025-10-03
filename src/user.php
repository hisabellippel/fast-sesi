<?php

class User {
    private $conn;

    public function __construct($db){
        $this-> conn = $db;
    }

    public function register($nome_funcionario, $credencial_funcionario, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO funcionario (nome_funcionario, croedencial_funcionario, senha_funcionario) VALUES (:nome_funcionario , :credencial_funcionario, :password)";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':nome_funcionario', $nome_funcionario);
        $stmt ->bindParam(':credencial_funcionario', $credencial_funcionario);
        $stmt ->bindParam(':password', $hash);
        return $stmt -> execute();
    }

    public function login($credencial_funcionario,$password){
        $sql = "SELECT * FROM funcionario WHERE credencial_funcionario = :credencial_funcionario";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':credencial_funcionario', $credencial_funcionario);
        $stmt ->execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['senha'])){
            return $user;
        }
        return false;
    }

    public function getUserById($userId){
        $sql = "SELECT * FROM funcionario WHERE id_funcionario = :id_funcionario";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':id_funcionario', $userId);
        $stmt ->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfilePic($userId,$profilePic){
        $sql = "UPDATE funcionario SET foto_funcionario = :profile_pic WHERE id_funcionario = :id_funcionario";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':profile_pic', $profilePic);
        $stmt ->bindParam(':id_funcionario', $userId);
        return $stmt -> execute();
    }


}

?>