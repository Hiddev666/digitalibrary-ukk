<?php

class Petugas {

    public function __construct() {
        session_start();
        if(!isset($_SESSION["username"])) {
            header("Location: " . BASEURL . "/auth/login");
        } elseif($_SESSION["level"] != "2") {
            header("Location: " . BASEURL . "/petugas/login");
        }
    }

    public function index() {
        echo "Petugas";
    }
}