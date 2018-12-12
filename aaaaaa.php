<?php

public function getUserData($name){
		$json = file_get_contents("http://awfw.net/user_data/user.json");
		if ($json) {
			$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
			$users = json_decode($json, true);
			$user_data = $users[$name];
		}else{
			$user_data = $this->ps->get($name);
		}
		return $user_data;
	}
	public function setUserData($name, $user_data){
		$json = file_get_contents("http://awfw.net/user_data/user.json");
		if ($json) {
			Utils::postURL("http://awfw.net/setUserData.php", ["name"=>$u, "data"=>$user_data]);
			$this->ps->set($name, array($this->ps->get($name), $user_data);
			$this->ps->save();
		}else{
			$this->ps->set($name, array($this->ps->get($name), $user_data);
			$this->ps->save();
		}
	public function onLogin(PlayerLoginEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$ip = $player->getAddress();
		$cid = $player->getClientId();
		$user_data = $this->getUserData($name);
		if(!isset($user_data)){
			$event->setCancelled();
			$player->kick("[awfwsystem]接続にはweb登録が必要です。http://awfw.net/register.html", false);
		}elseif($user_data["ip"] !== $ip and $user_data["cid"] !== $cid){
			$event->setCancelled();
			$player->kick("[awfwsystem]情報が一致しないため接続できません", false);
		}elseif($user_data["ip"] !== $ip or $user_data["cid"] !== $cid){
			$this->login[$name] = 1;
		}else{
			$this->login[$name] = 0;
		}
	}
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		if($this->login[$name] == 0){
			$player->sendMessage("[awfwsystem]情報が一致したためログインしました");
			$this->setUserData($name, array("ip"=>$sender->getAddress(), "cid"=>$sender->getClientId()));
			unset($this->login[$name]);
		}elseif($this->login[$name] == 1){
			$player->sendMessage("[awfwsystem]情報が変わったためパスワードを入力してください");
			$player->sendMessage("[awfwsystem]コマンド: /login <パスワード>");
			$player->setDataFlag(Entity::DATA_FLAGS,Entity::DATA_FLAG_IMMOBILE,true);
		}
	}
