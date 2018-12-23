	
	public function onShoot(PlayerInteractEvent $e){
		$item = $e->getItem();
		$block = $e->getBlock();
		$p = $e->getPlayer();
		if($p instanceof Player){
				// CANCEL SNOWBALL
				if($item->getId() == 332){
					$e->setCancelled(true);
				}

				// GOLDEN SHOVEL - AK47
				if($item->getId() == 284 && $item->getCustomName() == TextFormat:: AQUA . "AK47"){
					$e->setCancelled();
					$item = Item::get(332, 0, 1);
					$itemName = $item->setCustomName(TextFormat::AQUA . "AK47 Bullet");
					if($p->getInventory()->contains($itemName)){
						$nbt = new CompoundTag("", [
							"Pos" => new ListTag("Pos", [
								new DoubleTag("", $p->x),
								new DoubleTag("", $p->y + $p->getEyeHeight()),
								new DoubleTag("", $p->z)
							]),
							"Motion" => new ListTag("Motion", [
								new DoubleTag("", -sin($p->yaw / 180 * M_PI) * cos($p->pitch / 180 * M_PI)),
								new DoubleTag("", -sin($p->pitch / 180 * M_PI)),
								new DoubleTag("", cos($p->yaw / 180 * M_PI) * cos($p->pitch / 180 * M_PI))
							]),
							"Rotation" => new ListTag("Rotation", [
								new FloatTag("", $p->yaw),
								new FloatTag("", $p->pitch)
							]),
						]);
						$f = 8;
						$snowball = Entity::createEntity("Snowball", $p->getLevel(), $nbt, $p);
						$snowball->setMotion($snowball->getMotion()->multiply($f));
						$snowball->getLevel()->addSound(new BlazeShootSound(new Vector3($p->x, $p->y, $p->z, $p->getLevel())));
						$item = Item::get(332, 0, 1);
						$itemName = $item->setCustomName(TextFormat::AQUA . "AK47 Bullet");
						$p->getInventory()->removeItem($itemName);
					}else{
						$item = Item::get(284, 0, 1);
						$itemName = $item->setCustomName(TextFormat::AQUA . "AK47");
						$p->getInventory()->removeItem($itemName);
					}
				}	
					
				// IRON SHOVEL - SHOTGUN
				if($item->getId() == 256 && $item->getCustomName() == TextFormat:: AQUA . "SHOTGUN"){
					$e->setCancelled();
					$item = Item::get(332, 0, 1);
					$itemName = $item->setCustomName(TextFormat::AQUA . "SHOTGUN Bullet");
					if($p->getInventory()->contains($itemName)){
						$nbt = new CompoundTag("", [
							"Pos" => new ListTag("Pos", [
								new DoubleTag("", $p->x),
								new DoubleTag("", $p->y + $p->getEyeHeight()),
								new DoubleTag("", $p->z)
							]),
							"Motion" => new ListTag("Motion", [
								new DoubleTag("", -sin($p->yaw / 180 * M_PI) * cos($p->pitch / 180 * M_PI)),
								new DoubleTag("", -sin($p->pitch / 180 * M_PI)),
								new DoubleTag("", cos($p->yaw / 180 * M_PI) * cos($p->pitch / 180 * M_PI))
							]),
							"Rotation" => new ListTag("Rotation", [
								new FloatTag("", $p->yaw),
								new FloatTag("", $p->pitch)
							]),
						]);
						$f = 8;
						$snowball = Entity::createEntity("Snowball", $p->getLevel(), $nbt, $p);
						$snowball->setMotion($snowball->getMotion()->multiply($f));
						$snowball->getLevel()->addSound(new BlazeShootSound(new Vector3($p->x, $p->y, $p->z, $p->getLevel())));
						$item = Item::get(332, 0, 1);
						$itemName = $item->setCustomName(TextFormat::AQUA . "SHOTGUN Bullet");
						$p->getInventory()->removeItem($itemName);
					}else{
						$item = Item::get(256, 0, 1);
						$itemName = $item->setCustomName(TextFormat::AQUA . "SHOTGUN");
						$p->getInventory()->removeItem($itemName);
					}
				}
	
				// DIAMOND HOE - AWM
				if($item->getId() == 293 && $item->getCustomName() == TextFormat:: AQUA . "AWM"){
					$e->setCancelled();
					$item = Item::get(332, 0, 1);
					$itemName = $item->setCustomName(TextFormat::AQUA . "AWM Bullet");
					if($p->getInventory()->contains($itemName)){
						$nbt = new CompoundTag("", [
							"Pos" => new ListTag("Pos", [
								new DoubleTag("", $p->x),
								new DoubleTag("", $p->y + $p->getEyeHeight()),
								new DoubleTag("", $p->z)
							]),
							"Motion" => new ListTag("Motion", [
								new DoubleTag("", -sin($p->yaw / 180 * M_PI) * cos($p->pitch / 180 * M_PI)),
								new DoubleTag("", -sin($p->pitch / 180 * M_PI)),
								new DoubleTag("", cos($p->yaw / 180 * M_PI) * cos($p->pitch / 180 * M_PI))
							]),
							"Rotation" => new ListTag("Rotation", [
								new FloatTag("", $p->yaw),
								new FloatTag("", $p->pitch)
							]),
						]);
						$f = 8;
						$snowball = Entity::createEntity("Snowball", $p->getLevel(), $nbt, $p);
						$snowball->setMotion($snowball->getMotion()->multiply($f));
						$snowball->getLevel()->addSound(new BlazeShootSound(new Vector3($p->x, $p->y, $p->z, $p->getLevel())));
						$item = Item::get(332, 0, 1);
						$itemName = $item->setCustomName(TextFormat::AQUA . "AWM Bullet");
						$p->getInventory()->removeItem($itemName);
					}else{
						$item = Item::get(293, 0, 1);
						$itemName = $item->setCustomName(TextFormat::AQUA . "AWM");
						$p->getInventory()->removeItem($itemName);
					}
				}
			
				// HEALTH KIT
				// HEALTH KIT
				// HEALTH KIT
			
				// BANDAGE - Apple
				if($item->getId() == 260 && $item->getCustomName() == TextFormat:: AQUA . "Bandage"){
					$e->setCancelled();
					$item = Item::get(332, 0, 1);
					$itemName = $item->setCustomName(TextFormat::AQUA . "Bandage");
					$p->getInventory()->removeItem($itemName);
					$health = $p->getHealth() + 2;
					$p->setHealth($health);
				}
				

			}
		}
