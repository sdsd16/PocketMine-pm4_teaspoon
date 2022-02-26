<?php

declare(strict_types=1);

namespace pm4_teaspoon\enchant;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;

final class Smite extends Enchantment{
	public const ID = 10;

	public function __construct(){
		parent::__construct('SMITE', Rarity::COMMON, ItemFlags::SWORD, ItemFlags::AXE, 5);
	}
}