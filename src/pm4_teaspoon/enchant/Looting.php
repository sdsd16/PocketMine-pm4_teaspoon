<?php

declare(strict_types=1);

namespace pm4_teaspoon\enchant;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;

final class Looting extends Enchantment{
	public const ID = 14;

	public function __construct(){
		parent::__construct('LOOTING', Rarity::RARE, ItemFlags::SWORD, ItemFlags::AXE, 3);
	}
}