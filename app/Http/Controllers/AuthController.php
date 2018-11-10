<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 2018-11-10
 * Time: 오후 7:14
 */

namespace App\Http\Controllers;

use App\Auth;
use \Illuminate\Http\Request;
use Illuminate\Http\Response;
class AuthController
{
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function login()
    {
        $id = $this->request->input('id');
        $password = $this->request->input('password');

        $auth = new Auth();
        $auth->setLogin($id, $password);
        return response()->json(['Status' => $auth->login()], Response::HTTP_OK);
    }

    public function register()
    {
        $id = $this->request->input('id');
        $password = $this->request->input('password');
        $name = $this->request->input('name');
        $phoneNum = $this->request->input('phoneNum');
        $email = $this->request->input('email');

        $auth = new Auth();
        $auth->setRegister($id, $password, $name, $phoneNum, $email);
        return response()->json(['Status' => $auth->register()], Response::HTTP_OK);
    }
}