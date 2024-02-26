<?php

class Auth extends Controller
{

    // Buku
    public function login()
    {
        session_start();
        if(isset($_SESSION["username"])) {
            switch ($_SESSION["level"]) {
                case "3":
                    header("Location: " . BASEURL . "/user");
                    break;
                case "2":
                    header("Location: " . BASEURL . "/petugas");
                    break;
                case "1":
                    header("Location: " . BASEURL . "/admin");
                    break;
            }
        }

        $this->render("auth/index", [
            "title" => "Login | DigitaLibrary",
            'activePage' => "buku",
            'action' => "login"
        ]);
    }

    public function register()
    {
        session_start();
        if(isset($_SESSION["username"])) {
            switch ($_SESSION["level"]) {
                case "3":
                    header("Location: " . BASEURL . "/user");
                    break;
                case "2":
                    header("Location: " . BASEURL . "/petugas");
                    break;
                case "1":
                    header("Location: " . BASEURL . "/admin");
                    break;
            }
        }

        $this->render("auth/index", [
            "title" => "Login | DigitaLibrary",
            'activePage' => "buku",
            'action' => "register"
        ]);
    }

    public function runregister()
    {
        session_start();
        if(isset($_SESSION["username"])) {
            switch ($_SESSION["level"]) {
                case "3":
                    header("Location: " . BASEURL . "/user");
                    break;
                case "2":
                    header("Location: " . BASEURL . "/petugas");
                    break;
                case "1":
                    header("Location: " . BASEURL . "/admin");
                    break;
            }
        }
        
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $email = $_POST["email"];
        $namalengkap = $_POST["namalengkap"];
        $alamat = $_POST["alamat"];

        $user = $this->getModel("User_model")->userRegister($username, $password, $email, $namalengkap, $alamat);

        header("Location: " . BASEURL . "/auth/login?message=info_daftar");
    }

    public function runlogin()
    {
        session_start();
        if(isset($_SESSION["username"])) {
            switch ($_SESSION["level"]) {
                case "3":
                    header("Location: " . BASEURL . "/user");
                    break;
                case "2":
                    header("Location: " . BASEURL . "/petugas");
                    break;
                case "1":
                    header("Location: " . BASEURL . "/admin");
                    break;
            }
        }

        try {

            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            $user = $this->getModel("User_model")->authentication($username, $password);

            if (count($user) != 0) {
                session_start();
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['level'] = $user[0]['level'];
                $_SESSION['user-id'] = $user[0]['id'];

                switch ($user[0]['level']) {
                    case "3":
                        header("Location: " . BASEURL . "/user");
                        break;
                    case "2":
                        header("Location: " . BASEURL . "/petugas");
                        break;
                    case "1":
                        header("Location: " . BASEURL . "/admin");
                        break;
                }
            } else {
                header("Location: " . BASEURL . "/auth/login");
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASEURL . "/main");
    }
}
