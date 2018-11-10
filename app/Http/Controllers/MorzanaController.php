<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 2018-11-10
 * Time: 오후 7:49
 */

namespace App\Http\Controllers;

use App\Morzana;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MorzanaController
{
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function joinedUser()
    {
        $morzana = new Morzana();
        return response()->json($morzana->joinedUser(), Response::HTTP_OK);
    }
}