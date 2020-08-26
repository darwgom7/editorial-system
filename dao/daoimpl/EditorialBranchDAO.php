<?php
if ($asyncRequest) {
    require_once '../dao/daodef/IEditorialBranchDAO.php';
    require_once '../models/EditorialBranchModel.php';
    require_once '../core/Connection.php';
} else {
    require_once './dao/daodef/IEditorialBranchDAO.php';
    require_once './models/EditorialBranchModel.php';
    require_once './core/Connection.php';
}
class EditorialBranchDAO extends EditorialBranchModel implements
    IEditorialBranchDAO
{
    private static $tableName;
    private static $conn;
    private $queryRead;
    public function __construct()
    {
        self::$tableName = 'editorial_branch';

        self::$conn = Connection::build();
        $this->queryRead = sprintf('SELECT * FROM %s', self::$tableName);
    }
    public function create($oject)
    {
    }
    public function read()
    {
        try {
            $pstmt = self::$conn->connect()->prepare($this->queryRead);
            $pstmt->execute();
            return $pstmt->fetchAll(PDO::FETCH_ASSOC);
            $pstmt->close();
        } catch (Exception $e) {
            echo 'Error ', $e->getMessage();
        }
    }
    public function update($object)
    {
    }
    public function delete($object)
    {
    }
    public function findEditorialBranchById($object)
    {
    }
}
/**
 
try {
    
} catch (Exception $e) {
    echo 'Error ', $e->getMessage();
}

 */
