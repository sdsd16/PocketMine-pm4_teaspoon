<?php

declare(strict_types=1);

namespace pm4_teaspoon\enchant;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;

final class Lure extends Enchantment{
	public const ID = 24;

	public function __construct(){
		parent::__construct('LURE', Rarity::UNCOMMON, ItemFlags::FISHING_ROD, ItemFlags::NONE, 3);
	}
}