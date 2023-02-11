<?php

require_once 'models/User.php';

class UserDAOMysql implements UserDAO
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function generateUser($array)
    {
        $generated_user = new User();
        $generated_user->id = $array['id'] ?? 0;
        $generated_user->email = $array['email'] ?? '';
        $generated_user->name = $array['name'] ?? '';
        $generated_user->birthdate = $array['birthdate'] ?? '';
        $generated_user->city = $array['city'] ?? '';
        $generated_user->work = $array['work'] ?? '';
        $generated_user->avatar = $array['avatar'] ?? '';
        $generated_user->cover = $array['cover'] ?? '';
        $generated_user->token = $array['token'] ?? '';
        return $generated_user;
    }

    public function findByToken($token)
    {
        if (!empty($token)) {
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }


    public function findByEmail($email)
    {
        if (!empty($email)) {
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }


    public function update(User $user_generated)
    {
        $sql = $this->pdo->prepare("UPDATE users SET 
            email = :email,
            password = :password,
            name = :name,
            birthdate = :birthdate,
            city = :city,
            work = :work,
            avatar = :avatar,
            cover = :cover,
            token = :token
            WHERE id = :id"
            );
        
        $sql->bindValue(':email', $user_generated->email);
        $sql->bindValue(':password', $user_generated->password);
        $sql->bindValue(':name', $user_generated->name);
        $sql->bindValue(':birthdate', $user_generated->birthdate);
        $sql->bindValue(':city', $user_generated->city);
        $sql->bindValue(':work', $user_generated->work);
        $sql->bindValue(':avatar', $user_generated->avatar);
        $sql->bindValue(':cover', $user_generated->cover);
        $sql->bindValue(':token', $user_generated->token);
        $sql->bindValue(':id', $user_generated->id);
        $sql->execute();

        return true;
    }
}
