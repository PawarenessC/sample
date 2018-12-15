<?php

use pocketmine\event\server\DataPacketReceiveEvent;

public function onData(DataPacketReceiveEvent $event){

$pk = $event->getPacket();

if($pk instanceof LevelSoundEventPacket && $pk->sound === 42){

  }
  }
