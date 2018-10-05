<?php
namespace Model;

abstract class Model
{
    protected $dbConnec;
    
    function __construct() {
        try {
            $this->dbConnec = new \PDO('mysql:host=localhost;dbname='.$GLOBALS['config']['DBdatabase'], $GLOBALS['config']['DBUser'], $GLOBALS['config']['DBPass'], [
                \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
            ]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }

    protected $table = 'sections';

    public function getAllSections($limiters) {
        if(gettype($limiters) === 'array') {
            $selectLimiter = "";
            for ($i=0; $i < count($limiters); $i++) {
                if($i == (count($limiters) - 1)) {
                  $selectLimiter .= $limiters[$i];
                } else {
                  $selectLimiter .= $limiters[$i] . ', ';
                }
            }
            $sql = 'SELECT ' . $selectLimiter . ' FROM ' . $this->table;
        } else {
            $sql = 'SELECT * FROM ' . $this->table;
        }
        $request = $this->dbConnec->prepare($sql);
        $request->execute();
        return $request->fetchAll();
    }

    public function getOneSectionById($value) {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :value');
        $request->execute(['value' => $value]);
        $result = $request->fetch();
        if($result !== null) {
            return $result;
        } else {
            return false;
        }
    }

    public function getOneSection($column, $value) {
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

