<?php
include_once '../../lib/db.php';

class Users extends DB{

    function __construct(){
        parent::__construct();
    }

    public function getUsersAll(){
        $query = $this->connect()->prepare('SELECT * FROM users');
        $query->execute();
        $items=[];
        while($row=$query->fetch(PDO::FETCH_ASSOC)){
            $item = [
                'id'                => $row['id'],
                'name'              => $row['name'],
                'email'             => $row['email'],
            ];
            array_push($items,$item);
        }

        return $items;
    }

    public function delete($id){
        $query = $this->connect()->prepare('DELETE FROM users WHERE id = :id');
        try{
            $query->execute([
                'id'            => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }


    public function insert($datos){
        $query = $this->connect()->prepare('INSERT INTO `users`(`name`, `email`, `password`) VALUES(:name, :email, :password)');
        try{
            $query->execute([
                'name'           => $datos['name'],
            'email'            => $datos['email'],
                'password'            => $datos['password'],
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getById($id){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE id= :id');
        $query->execute(['id'   =>$id]);

        $row=$query->fetch();
        return [
            'id'                    => $row['id'],
            'name'                  => $row['name'],
            'email'                 => $row['email'],
            'password'              => $row['password']
        ];
    }


    public function getByNameAndPass($item){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE email= :email AND password= :password');
        $query->execute([
            'email'   => $item['email'],
            'password'   => $item['password'],
        ]);

        $row=$query->fetch();
        return [
            'id'                    => $row['id'],
            'name'                  => $row['name'],
            'email'                 => $row['email'],
            'password'              => $row['password']
        ];
    }

    public function update($item){
        $query = $this->connect()->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
        try{
            $query->execute([
                'id'                    => $item['id'],
                'name'                  => $item['name'],
                'email'                 => $item['email'],
                'password'              => $item['password']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    
}
