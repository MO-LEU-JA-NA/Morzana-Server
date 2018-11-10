<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 2018-11-10
 * Time: 오후 7:51
 */

namespace App;

use Illuminate\Support\Facades\DB;

class Morzana
{
    public function __construct()
    {
    }

    public function joinedUser()
    {
        return DB::table('User')->get();
    }
}