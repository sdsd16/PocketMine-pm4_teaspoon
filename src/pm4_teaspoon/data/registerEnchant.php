<?php

declare(strict_types=1);

namespace pm4_teaspoon\data;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\utils\CloningRegistryTrait;
use pocketmine\utils\RegistryTrait;
use pm4_teaspoon\enchant\Fortune;
use pm4_teaspoon\enchant\Smite;
use pm4_teaspoon\enchant\Bane_of_arthropods;
use pm4_teaspoon\enchant\Looting;
use pm4_teaspoon\enchant\Luck_of_the_sea;
use pm4_teaspoon\enchant\Lure;

/**
 * @method static InvisibleEnchantment INVISIBLE()
 */

final class registerEnchant{
	use RegistryTrait;

	public function __construct(){}

	protected static function register(string $name, Enchantment $enchantment): void{
		self::_registryRegister($name, $enchantment);
	}

	protected static function setup() : void{
		self::register('FORTUNE', new Fortune());
		self::register('SMITE', new Smite());
		self::register('BANE_OF_ARTHROPODS', new Bane_of_arthropods());
		self::register('LOOTING', new Looting());
		self::register('LUCK_OF_THE_SEA', new Luck_of_the_sea());
		self::register('LURE', new Lure());
	}
}