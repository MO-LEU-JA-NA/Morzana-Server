<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 2018-11-10
 * Time: 오후 7:51
 */

namespace App;

use Illuminate\Support\Facades\DB;
use DateTime;
class Morzana
{
    private $sender;

    private $contents;

    private $receiver;

    public function __construct()
    {
    }

    public function setMessage($sender, $contents, $receiver)
    {
        $this->sender = $sender;
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
            'u_idx_sender' => $this->sender,
            'm_contents' => $this->contents,
            'u_idx_receiver' => $this->receiver,
            'm_sendTime' => new DateTime()
        ]);
    }

    public function receiveMessageList($receiver){
        return DB::table('Message')
            ->select('Message.m_contents','Message.m_sendTime')
            ->join('User','Message.u_idx_sender','=','User.u_idx')
            ->where('Message.u_idx_receiver', '=', $receiver)
            ->get();
    }

    public function sendMessageList($sender){
        return DB::table('Message')
            ->select('User.u_name','Message.m_contents','Message.m_sendTime')
            ->join('User','Message.u_idx_receiver','=','User.u_idx')
            ->where('Message.u_idx_sender', '=', $sender)
            ->get();
    }
}