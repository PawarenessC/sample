<?php

public function scheduler(){

$this->gametime--;//20Tick(1秒)ごとに1減らしていく


$game = $this->gametime;//引継ぎます、一々$this書くのめんどいので

$players = Server::getInstance()->getOnlinePlayers();


switch($min){ // switchで分岐します

case 99: // セミコロンではなく:です $minに99が入ってたらの分岐です
foreach ($players as $player){ // プレイヤーを取得

$player->sendMessage("あああ");
    }
  }
}
