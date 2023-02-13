<?php

class Petugas {
    private $db, $table = "petugas";

    public function __construct() {
        $this->db = new Database;
    }

    public function loginPetugas($data) {
        $user = $this->findPetugasByUsername($data['username']);

        if ( $data['password'] == $user['password']) {
            return $user;
        }
        // if ($data['password'] === $user['password']) {
        //     switch ($user['level_name']) {
        //         case "ADMIN":
        //             $_SESSION['admin'] = $user;
        //             return $user;
        //         case "PETUGAS":
        //             $_SESSION['petugas'] = $user;
        //         default:
        //             $_SESSION['pegawai'] = $user;
        //     }
        // }
    }
        
    public function findPetugasByUsername($username) {
        // var_dump($username);die;
        $query = "SELECT * FROM petugas_view WHERE username=:username";
        
        $this->db->query($query);
        $this->db->bind("username", strtolower($username));
        return $this->db->resultSingle();
    }
}