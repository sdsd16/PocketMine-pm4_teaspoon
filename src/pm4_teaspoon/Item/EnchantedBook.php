<?php

namespace pm4_teaspoon\item;

use pocketmine\item\Item;
use pocketmine\item\ItemIds;

class EnchantedBook extends Item {
	public function __construct(int $meta = 0) {
		parent::__construct(ItemIds::ENCHANTED_BOOK, $meta, "Enchanted Book");
	}

	public function getMaxStackSize(): int {
		return 1;
	}
}