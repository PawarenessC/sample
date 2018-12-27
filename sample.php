<?php
public function onPrecessing(DataPacketReceiveEvent $event){



  $player = $event->getPlayer();

  $pk = $event->getPacket();

  $name = $player->getName();

    if($pk->getName() == "ModalFormResponsePacket"){

      $data = $pk->formData;

      $result = json_decode($data);

      if($data == "null\n"){

      }else{

          switch($pk->formId){

          case 2001:

         if($data == 0){//aaa
$player->sendMessage("aaa");
        }elseif($data == 1){//bbb
$player->sendMessage("bbb");

        }elseif($data == 2){//ccc
$player->sendMessage("ccc");
        break;

    }elseif($data == 3){//dddd
    $player->sendMessage("dddd");
    }
	break;
        }
