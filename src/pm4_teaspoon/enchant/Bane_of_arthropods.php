<?php

declare(strict_types=1);

namespace pm4_teaspoon\enchant;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;

final class Bane_of_arthropods extends Enchantment{
	public const ID = 11;

	public function __construct(){
		parent::__construct('BANE_OF_ARTHROPODS', Rarity::COMMON, ItemFlags::SWORD, ItemFlags::AXE, 5);
	}
}