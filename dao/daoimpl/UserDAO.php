<?php
if ($asyncRequest) {
    require_once '../dao/daodef/IUserDAO.php';
    require_once '../models/UserModel.php';
    require_once '../core/Connection.php';
} else {
    require_once './dao/daodef/IUserDAO.php';
    require_once './models/UserModel.php';
    require_once './core/Connection.php';
}
class UserDAO extends UserModel implements IUserDAO
{
    private static $tableName;
    private static $conn;
    private $queryFindUserById;
    private $queryFindUserByNick;
    private $queryLogin;
    public function __construct()
    {
        self::$tableName = 'users';
        self::$conn = Connection::build();
        $this->queryFindUserById = sprintf(
            'SELECT id FROM %s WHERE id = :id',
            self::$tableName
        );
        $this->queryFindUserById = sprintf(
            'SELECT nick FROM %s WHERE nick = :nick',
            self::$tableName
        );
        $this->queryLogin = sprintf(
            'SELECT * FROM %s WHERE nick = :nick',
            self::$tableName
        );
    }
    public function create($oject)
    {
    }
    public function read()
    {
    }
    public function update($object)
    {
    }
    public function delete($object)
    {
    }
    public function findUserById($object)
    {
        try {
            $id = $object->getId();
            $pstmt = self::$conn->connect()->prepare($this->queryFindUserById);
            $pstmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pstmt->execute();
            return $pstmt->fetch(PDO::FETCH_OBJ);
            $pstmt->close();
        } catch (Exception $e) {
            echo 'Error ', $e->getMessage();
        }
    }
    public function findUserByNick($object)
    {
        try {
            $nick = $object->getNick();
            $pstmt = self::$conn->connect()->prepare($this->queryFindUserById);
            $pstmt->bindParam(':nick', $nick, PDO::PARAM_STR);
            $pstmt->execute();
            return $pstmt->fetch(PDO::FETCH_OBJ);
            $pstmt->close();
        } catch (Exception $e) {
            echo 'Error ', $e->getMessage();
        }
    }
    public function login($object)
    {
        try {
            $nick = $object->getNick();
            $pass = md5($object->getPass());
            $pstmt = self::$conn->connect()->prepare($this->queryLogin);
            $pstmt->bindParam(':nick', $nick, PDO::PARAM_STR);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            if ($result) {
                if ($nick == $result->nick && $pass == $result->password) {
                    return true;
                } else {
                    return false;
                }
            }
            return $result;
            $pstmt->close();
        } catch (Exception $e) {
            echo 'Error ', $e->getMessage();
        }
    }
}

