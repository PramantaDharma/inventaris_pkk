<?php

class Pegawai {
    private $table = "pegawai",
            $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // public function getAllDataPegawai()
    // {
        
    // }

    public function findUserByName($nama)
    {
        $query = "SELECT * FROM pegawai WHERE nama_pegawai=:nama_pegawai";

        $this->db->query($query);
        $this->db->bind('nama_pegawai', strtolower($nama));
        return $this->db->resultSingle();
    }

    public function loginPegawai($data)
    {
        $user = $this->findUserByName($data['username']);

        if ($data['password'] == $user['password']) {
            return $user;
        }
    }

}