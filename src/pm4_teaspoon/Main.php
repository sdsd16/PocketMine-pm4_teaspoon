<?php

namespace pm4_teaspoon;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemFactory;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\block\VanillaBlocks;
use pocketmine\data\bedrock\EnchantmentIds;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\{Enchantment, EnchantmentInstance};
use pocketmine\event\block\BlockBreakEvent;

use pm4_teaspoon\enchant\Fortune;
use pm4_teaspoon\enchant\Smite;
use pm4_teaspoon\enchant\Bane_of_arthropods;
use pm4_teaspoon\enchant\Looting;
use pm4_teaspoon\enchant\Luck_of_the_sea;
use pm4_teaspoon\enchant\Lure;
use pm4_teaspoon\data\registerEnchant; //Register All Enchant

class Main extends PluginBase implements Listener
{

	/*
	 * TODO:
	 *  - [X] Smite
	 *  - [X] Bane of athropods
	 *  - [X] Looting
	 *  - [X] Fortune
	 *  - [X] Luck of the sea
	 *  - [X] Lure
	 *  - [ ] Frost walker (Very laggy as of now)
	 */

    public function setUp(){
    EnchantmentIdMap::getInstance()->register(Fortune::ID,registerEnchant::FORTUNE());
    EnchantmentIdMap::getInstance()->register(Smite::ID,registerEnchant::SMITE());
    EnchantmentIdMap::getInstance()->register(Bane_of_arthropods::ID,registerEnchant::BANE_OF_ARTHROPODS());
    EnchantmentIdMap::getInstance()->register(Looting::ID,registerEnchant::LOOTING());
    EnchantmentIdMap::getInstance()->register(Luck_of_the_sea::ID,registerEnchant::LUCK_OF_THE_SEA());
    EnchantmentIdMap::getInstance()->register(Lure::ID,registerEnchant::LURE());
    ItemFactory::getInstance()->register(new Item(new ItemIdentifier(ItemIds::ENCHANTED_BOOK, 0), "Enchanted Book"), true);
    $this->getLogger()->info("pm4_teaspoon registered done");
}

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->setUp();
    }

	private function increaseDrops(array $drops, int $amount = 1) {
		$newDrops = [];
		foreach($drops as $drop){
			$newDrops[] = $drop->setCount(1 + $amount);
		}
		return $newDrops;
	}

    public function onBreak(BlockBreakEvent $ev){
    $block = $ev->getBlock();
	$item = $ev->getItem();
    $fortune = $item->getEnchantment(EnchantmentIdMap::getInstance()->fromId(Fortune::ID));
    $slik = $item->getEnchantment(EnchantmentIdMap::getInstance()->fromId(EnchantmentIds::SILK_TOUCH));

    if ($fortune instanceof EnchantmentInstance && !$slik instanceof EnchantmentInstance){
    switch($block->getId()){
    case 18://Leave
    case 161:
    if(rand(1, 100) <= 10 + $fortune->getLevel() * 2){
    $ev->setDrops([ItemFactory::getInstance()->get (260, 0, 1)]);
    }
    break;
   
    case 103://Melon Block
    $ev->setDrops($this->increaseDrops($ev->getDrops(), rand(2, 5) + rand(1,$fortune->getLevel())));
    break;

    case 141://Carrot
    case 142://Potato
    case 244://BeetRoot
    case 59://Wheat
	if($block->getMeta() >= 7){
    $ev->setDrops($this->increaseDrops($ev->getDrops(), 1 + rand(1,$fortune->getLevel())));
}
    break;

    case 56:
    $ev->getPlayer()->sendMessage("{$fortune->getLevel()}");
    break;
}
    }
}

    public function onDisable(): void
    {
    $this->getLogger()->info("pm4_teaspoon Disabled");
    }

}
