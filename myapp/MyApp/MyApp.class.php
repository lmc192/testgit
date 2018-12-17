<?php

namespace MyApp;

class MyApp {

    private $db;

    public function __construct ($dsn,$usr,$pwd) {
        try {
            $this->db = new \MyApp\Db ($dsn,$usr,$pwd);
        }
        catch (\Exception $e) {
            throw new \Exception ('Could not construct database object:');
        }
    }

    public function __destruct ( ) {
    }

    public function dbQuery ( ) {
        return $this->db->query (... func_get_args());
    }

}

?>
