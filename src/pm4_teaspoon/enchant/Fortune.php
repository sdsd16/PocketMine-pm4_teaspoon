<?php

declare(strict_types=1);

namespace pm4_teaspoon\enchant;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;

final class Fortune extends Enchantment{
	public const ID = 18;

	public function __construct(){
		parent::__construct('FORTUNE', Rarity::COMMON, ItemFlags::ALL, ItemFlags::ALL, 3);
	}
}
