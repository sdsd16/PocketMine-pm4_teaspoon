<?php

declare(strict_types=1);

namespace pm4_teaspoon\enchant;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;

final class Luck_of_the_sea extends Enchantment{
	public const ID = 23;

	public function __construct(){
		parent::__construct('LUCK_OF_THE_SEA', Rarity::UNCOMMON, ItemFlags::FISHING_ROD , ItemFlags::NONE, 3);
	}
}