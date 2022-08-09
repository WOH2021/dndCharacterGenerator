<?php
// Autoload the related classes
require_once('autoload.php');

// @todo add size
// @todo add speed
// @todo add support for languages
// @todo ensure logic between background ideal and alignment
// @todo look into character initializer
// @todo look into splitting the character randomizer
// @todo add support for light weapons
// @todo add other musical instruments (bard
// @todo add support for different cleric beliefs + associated proficiencies
// @todo add support for duplicate inventory items

// Classes:
// @todo add the initial equipment from the class
// @todo add support for expertise for rogues

// Races:
// @todo: add the proficiencies

// Create a specific character
$player = new Character();
printPlayerInfo($player);

function printPlayerInfo($player)
{
	// get the background personality traits info
	$characteristics = $player->getBackgroundPersonalityTraits();
	
	echo "Your random character is a {$player->getClass()} \n";
	echo "Race: {$player->getRaceName()} \n";
	echo "Subrace: {$player->getSubRaceName()} \n";
	echo "Alignment: {$player->getAlignment()} \n";
	echo "HP: {$player->getHP()} \n\n";

	echo "Proficiencies: \n";
	print_r($player->getProficiencies());
	echo "Weapons: \n";
	print_r($player->getEquipment());
	echo "Funds: \n";
	print_r($player->getFunds());
	echo "\n";

	echo "Your character's background is {$player->getBackgroundName()} \n";
	echo "About me: \n";
	echo "{$characteristics[0]} \n";
	echo "{$characteristics[1]} \n";
	echo "{$player->getBackgroundIdeal()} \n";
	echo "{$player->getBackgroundBond()} \n";
	echo "{$player->getBackgroundFlaw()} \n";
	echo "\n";
	
	echo "Strength (base): {$player->getBaseStrength()} \n";
	echo "Strength: {$player->getStrength()} \n";
	echo "Dexterity (base): {$player->getBaseDexterity()} \n";
	echo "Dexterity: {$player->getDexterity()} \n";
	echo "Constitution (base): {$player->getBaseConstitution()} \n";
	echo "Constitution: {$player->getConstitution()} \n";
	echo "Intelligence (base): {$player->getBaseIntelligence()} \n";
	echo "Intelligence: {$player->getIntelligence()} \n";
	echo "Wisdom (base): {$player->getBaseWisdom()} \n";
	echo "Wisdom: {$player->getWisdom()} \n";
	echo "Charisma (base): {$player->getBaseCharisma()} \n";
	echo "Charisma: {$player->getCharisma()} \n\n";
}