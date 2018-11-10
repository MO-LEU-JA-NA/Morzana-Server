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
    private $caller;

    private $contents;

    private $receiver;

    public function __construct()
    {
    }

    public function setMessage($caller, $contents, $receiver)
    {
        $this->caller = $caller;
        $this->contents = $contents;
        $this->receiver = $receiver;
    }

    public function joinedUser()
    {
        return DB::table('User')->get();
    }

    public function sendMessage()
    {
        return DB::table('Message')->insert([
            'caller' => $this->caller,
            'contents' => $this->contents,
            'receiver' => $this->receiver
        ]);
    }
}