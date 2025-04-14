<?php 
    function logarAdmin($username, $password) {
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/amigos-de-pata/login.json');
        $dados = json_decode($json, true);

        foreach ($dados as $dado) {
            if ($dado['username'] == $username && $dado['password'] == $password) {
                return true;
            }
        }

        return false;
    }
?>
