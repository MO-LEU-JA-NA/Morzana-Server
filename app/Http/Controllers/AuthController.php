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

    public function login(){
        $id = $this->request->input('id');
        $password = $this->request->input('password');

        $auth = new Auth($id,$password);
        return response()->json(['Status' => $auth->login()], Response::HTTP_OK);
    }
}