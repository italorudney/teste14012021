<?php

namespace controllers {

    class Veiculo {

        private $PDO;

        function __construct() {
            $this->PDO = new \PDO('mysql:host=localhost;dbname=locadora', 'root', '');
            $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

      

    }

}