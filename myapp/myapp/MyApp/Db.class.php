<?php

namespace MyApp;

class Db {

    private $PDO;

    public function __construct ($dsn,$usr,$pwd) {
        try {
            $this->PDO = new \PDO (
                $dsn
               ,$usr
               ,$pwd
               ,array (\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION)
            );
        }
        catch (\PDOException $e) {
            throw new \Exception ('Could not construct PDO object');
            return false;
        }
        return true;
    }

    public function __destruct ( ) {
        $this->PDO = null;
    }

    public function query ( ) {
        // Process inputs
        $args = func_get_args ();
        if (!count($args)) {
            throw new \Exception ('Query not given');
            return false;
        }
        $query = trim (array_shift($args));
        if(!strlen($query)) {
            throw new \Exception ('Query empty');
            return false;
        }
        try {
            // SQL statement
            $statement = $this->PDO->prepare ($query);
        }
        catch (\PDOException $e) {
            throw new \Exception ('Could not prepare query statement');
            return false;
        }
        foreach ($args as $i=>$arg) {
            // Bind value to placeholder
            try {
                (array)$arg = $this->pdoCast ($arg);
                $statement->bindValue (($i+1),$arg[0],$arg[1]);
            }
            catch (\PDOException $e) {
                throw new \Exception ('Could not bind argument '.($i+1).' to query');
                return false;
            }
        }
        try {
            // Execute SQL statement
            $statement->execute ();
        }
        catch (\PDOException $e) {
            // Execution failed
            throw new \Exception ($e->getMessage());
            return false;
        }
        try {
            // Execution OK, fetch data (if any was returned)
            $array_assoc = $statement->fetchAll (\PDO::FETCH_ASSOC);
        }
        catch (\PDOException $e) {
            // Execution OK but no data fetched
            return true;
        }
        $statement->closeCursor ();
        return $array_assoc;
    }

    private function pdoCast ($value) {
            // Force change of data type for PDO
            if (is_bool($value)) {
                if ($value) {
                    $value  = 1;
                }
                else {
                    $value  = 0;
                }
            }
            elseif (is_double($value)) {
                $value     .= '';
            }
            // Select correct parameter type
            if (is_null($value)) {
                $type       = \PDO::PARAM_NULL;
            }
            elseif (is_integer($value)) {
                $type       = \PDO::PARAM_INT;
            }
            elseif (is_string($value)) {
                $type       = \PDO::PARAM_STR;
            }
            else {
                throw new \Exception (HPAPI_STR_DB_SPR_ARG_TYPE);
                return false;
            }
            return array ($value,$type);
    }

}

?>
