<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 2018-11-10
 * Time: 오후 7:14
 */

namespace App;

use Illuminate\Support\Facades\DB;
class Auth
{
    private $id;

    private $password;

    private $name;

    private $phoneNum;

    private $email;

    public function __construct($id, $password)
    {
        $this->id = $id;
        $this->password = $password;
    }

    public function login(){
        $existsId = DB::table('User')->where([
            'u_id' => $this->id
        ])->pluck('u_idx');

        $existsPw = DB::table('User')->where([
            'u_id' => $this->id,
            'u_password' => $this->password
        ])->pluck('u_idx');

        if(count($existsId) == 0) {
            return -1;
        } else if(count($existsPw) == 0) {
            return -2;
        } else {
            return 0;
        }
    }
}