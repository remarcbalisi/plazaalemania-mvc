<?php

class AdminLogin extends Controller{

    protected $auth_user;

    public function __construct(){
        $this->auth_user = $this->model('AuthUser');
    }

    public function index(){

        if( $this->auth_user->auth ){

            $link = isset($_SERVER['HTTPS']) ? "https": "http"."://".htmlspecialchars($_SERVER["HTTP_HOST"])."/plazaalemania/public/adminhome/index";
            header("Location: ".$link);
            exit();

        }

        $this->view('admin/index');

    }

    public function login(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = $this->model('User');
            $user = $user->getByEmail($_POST['email']);

            if( !empty($user) ){
                if( password_verify($_POST['password'], $user[0]['password']) ){
                    $_SESSION['usermail'] = $_POST['email'];
                    $link = isset($_SERVER['HTTPS']) ? "https": "http"."://".htmlspecialchars($_SERVER["HTTP_HOST"])."/plazaalemania/public/adminhome/index";
                    header("Location: ".$link);
                    exit();
                }
                else{
                    $this->view('admin/index', ['error_msg'=>"Invalid email/password"]);
                }
            }
            else{
                $this->view('admin/index', ['error_msg'=>"Invalid email/password"]);
            }


        }

    }

}

?>
