<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    /*public function show($id)
    {
        $user = new User($id);
        return $user->show();
    }*/


    public function login(Request $request){
        $util = $request->all();
        $db = app('db')->connection('mysql');

        $res = $db->select("SELECT username, password FROM user WHERE username = '".$util['username']."' LIMIT 1;");

        if(isset($res[0])){
            if (($res[0]["password"] == $util['password'])) {
                $date = time() + 3600;
                $token = bin2hex(random_bytes(16));
                $db->update("UPDATE user set token = '".$token."',token_valid ='".$date."' WHERE username = '".$util['username']."' LIMIT 1;");
                return response()->json(
                    array(
                        'token' =>  $token,
                        "lastname" => $res[0]["lastname"],
                        "firstname" => $res[0]["firstname"]
                    ), 200
                );
            }else{
                return response()->json(   
                    array(
                        "error" => true,
                        "description" => "Bad password",
                    ), 401
                );
            }
        }else{
            return response()->json(
                array(
                    "error" => true,
                    "description" => "User doesn't exists",
                ), 404
            );
        }
        
    }

    public function refresh(Request $request) {
        $req = $request->all(); 
        $db = app('db')->connection('mysql');
        $db2 = app('db')->connection('mysql2');
        $date = time();
        $res = $db->select("SELECT token_valid, lastname, firstname , tokenconfig FROM user WHERE token = '".$req['token']."' LIMIT 1;");
        $config = $res[0]["tokenconfig"];
        $res2 = $db2->select("SELECT config FROM tokens WHERE token = '".$config."' LIMIT 1;");
        $res2 = json_decode($res2[0]['config'], true);
        
        if($res[0]["token_valid"] > $date) {
            $date = $date+3600;
            $db->update("UPDATE user set token_valid ='".$date."' WHERE token = '".$req['token']."' LIMIT 1;");
            return response()->json(
                array(
                    "lastname" => $res[0]["lastname"],
                    "firstname" => $res[0]["firstname"],
                    "avatar" => $res2["GENERAL_CONFIG"]["AVATAR_URL"],
                ),200
            );
        }else{
            return response()->json(
                array(
                    "description" => "disconnected",
                ), 401

            );
        }
    }

    public function getConfig(Request $request){
        $req = $request->all();
        $db = app('db')->connection('mysql');
        $db2 = app('db')->connection('mysql2');
        $res = $db->select("SELECT tokenconfig FROM user WHERE token = '".$req['token']."' LIMIT 1;");
		$config = $res[0]["tokenconfig"];
		$res = $db2->select("SELECT config FROM tokens WHERE token = '".$config."' LIMIT 1;");
		
        return response()->json(json_decode($res[0]['config']), 200);

    }
    public function setConfig(Request $request){
        $req = $request->all();
        $db = app('db')->connection('mysql');
        $db2 = app('db')->connection('mysql2');
        $res = $db->select("SELECT tokenconfig FROM user WHERE token = '".$req['token']."' LIMIT 1;");
        $tokenconf = $res[0]["tokenconfig"];
		$generalConfig ='{  "GENERAL_CONFIG": {      "BOT_NAME": "'.$req["botname"].'",      "ICON_CLOSED": "'.$req["iconeClosed"].'",      "ICON_VISIBLE": "'.$req["iconeVisible"].'",      "TRIGGER_BUTTON_BG_COLOR": "'.$req["triggerButtonBgColor"].'",      "TRIGGER_BUTTON_TEXT_COLOR": "'.$req["triggerButtonTextColor"].'",      "HEADER_BG_COLOR": "'.$req["headerBgColor"].'",      "HEADER_TEXT_COLOR": "'.$req["headerTextColor"].'",      "BOT_MESSAGE_BG_COLOR" : "'.$req["botMsgBgColor"].'",      "BOT_MESSAGE_TEXT_COLOR" : "'.$req["botMsgTextColor"].'",      "USER_MESSAGE_BG_COLOR" : "'.$req["userMsgBgColor"].'",      "USER_MESSAGE_TEXT_COLOR" : "'.$req["userMsgTextColor"].'",      "CHAT_ELEMENTS_COLOR":"'.$req["chatElementColor"].'",      "FOOTER_BG_COLOR" : "'.$req["footerBgColor"].'",      "FOOTER_TEXT_COLOR": "'.$req["footerTextColor"].'",      "AVATAR_URL": "'.$req["avatar"].'",      "MESSAGE_ENDPOINT": "https://proto.mr-bot.fr/mr_factory_thibault/bot2_api",      "MESSAGE_TOKEN": "ftO72UjLPG88NtiJhX4bGtD3JIY9YYux",      "MESSENGER_URL": "'.$req["messengerUrl"].'",      "INTERNAL_URL": "mr-bot.fr",      "EXTERNAL_LINK_ICON": "'.$req["iconExternLink"].'"  },  "MENU_CONTENT": {        "persistent_menu":[          {            "locale":"default",            "composer_input_disabled":false,            "call_to_actions":[              {                    "title":"Recommencer ????",                    "type":"postback",                    "payload":"get_started"                },              {                "title":"Réalisé par Mr Bot",                "type":"web_url",                "url":"https://www.mr-bot.fr"              }            ]          }        ]      }}';
		$res = $db2->update("UPDATE tokens SET config ='$generalConfig' WHERE token = '".$tokenconf."' LIMIT 1;");
		return response()->json("ok",200) ;
    }

    public function test(Request $request){
        $req = $request->all();
        //var_dump($req);
        return response()->json($req, 200);
    }

    public function getstats(Request $request){
        $req = $request->all();
        $db = app('db')->connection('mysql');
        $database= $db->select("SELECT c.database FROM customer as c, user as u WHERE c.id = u.customer AND u.token ='".$req['token']."'");
        $database = $database[0]['database'];
        $url = $req['url'];
               
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://bordeaux-metropole.mr-bot.fr/mr_factory_prod/api/stats.php?view=".$url."",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $response = json_decode($response,true);
        return response()->json($response['data'],200);
           
        }
    }
}