<?php

class Auth extends Controller {
    public function index(){
        $this->view('templates/header');
        $this->view('auth/index');
        $this->view('templates/footer');
    }


    public function login() {
        $petugas = $this->model("petugas")->loginPetugas($_POST);
        $pegawai = $this->model('pegawai')->loginPegawai($_POST);

        if ($petugas) {
            if ($petugas['level_name'] == "ADMIN") {
                $_SESSION['admin'];
                return redirect("/dashboard/index");
            }elseif ($petugas['level_name'] == "PETUGAS") {
                $_SESSION['PETUGAS'];
                return redirect("/dashboard/index");
            }
        }

        if ($pegawai) {
            $_SESSION['pegawai'] = $pegawai; 
            return redirect("/dashboard/index");
        }


        // if ($this->model("petugas")->loginPetugas($_POST) ) {
        //     return redirect("/dashboard/index", ['success', 'Selamat Datang Kembali!']);
        // }elseif ($this->model('pegawai')->loginPegawai($_POST) ) {
        //     return redirect("/dashboard/index");
        // }else {
        //     echo "Gagal";
        // }

    }













}

?>