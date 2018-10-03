<?php
namespace Model;
//Permettre la connexion avec la base de données à l'instanciation d'un objet de class Model
abstract class Model
{
    protected $dbConnec;
    
    function __construct() {
        try {
            $this->dbConnec = new \PDO('mysql:host=localhost;dbname='.$GLOBALS['config']['SGBDDatabase'], $GLOBALS['config']['SGBDUser'], $GLOBALS['config']['SGBDPass'], [
                \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
            ]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }

    protected $table = 'pages';

    public function getAll($column) {
        $request = $this->dbConnec->prepare('SELECT ' . $column . ' FROM ' . $this->table);
        $request->execute();
        $result = $request->fetchAll();
        return $result;
    }

    public function getOneById($value) {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :value');
        $request->execute(['value' => $value]);
        $result = $request->fetch();
        if($result !== null) {
            return $result;
        } else {
            return false;
        }
    }

    public function getOne($column, $value) {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $column .  ' = :value');
        $request->execute(['value' => $value]);
        $result = $request->fetch();
        if($result !== null) {
            return $result;
        } else {
            return false;
        }
    }
}

