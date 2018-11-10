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

    public function sendMessage()
    {
        $sender = $this->request->input('sender');
        $contents = $this->request->input('contents');
        $receiver = $this->request->input('receiver');

        $morzana = new Morzana();
        $morzana->setMessage($sender,$contents,$receiver);
        return response()->json(['Status' => $morzana->sendMessage()], Response::HTTP_OK);
    }

    public function receiveMessageList(){
        $receiver = $this->request->get('receiver');

        $morzana = new Morzana();
        return response()->json($morzana->receiveMessageList($receiver), Response::HTTP_OK);
    }

    public function sendMessageList(){
        $sender = $this->request->get('sender');

        $morzana = new Morzana();
        return response()->json($morzana->sendMessageList($sender), Response::HTTP_OK);
    }
}