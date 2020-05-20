<?php
/**
 *
 * @category Console_Command
 * @package  App\Console\Commands
 * 
 */

namespace App\Console\Commands;


use App\Post;

use Exception;
use Illuminate\Console\Command;
use karpy47\PhpMqttClient\MQTTClient;


/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class BrokeurData extends Command
{
    public function getBrokeurData(){
        $client = new MQTTClient('test.mosquitto.org', 1883);
 //       $client->setAuthentication('mqtt-server.username','mqtt-server.password');
        $client->setEncryption('cacerts.pem');
        $success = $client->sendConnect(12345);  // set your client ID
        if ($success) {
            $client->sendSubscribe('topic1');
            $client->sendPublish('topic2', 'Message to all subscribers of this topic');
            $messages = $client->getPublishMessages();  // now read and acknowledge all messages waiting
            foreach ($messages as $message) {
                $db = app('db')->connection('mysql');
                $res = $db->insert("INSERT tokenconfig FROM user WHERE token = '".$message['value']."' ;");
                echo $message['topic'] .': '. $message['message'] . PHP_EOL;
                // Other keys in $message array: retain (boolean), duplicate (boolean), qos (0-2), packetId (2-byte integer)
            }
            $client->sendDisconnect();    
        }
        $client->close();
    }
};