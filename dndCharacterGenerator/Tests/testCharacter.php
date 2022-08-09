<?php
/**
 *  Test script for the Barbarian/Character classes. 
 */

require_once('Character.php');
require_once('Barbarian.php');

// Generate a character
$player = new Barbarian();

// Class
echo $player->getClass() . "\n";

// Skills
echo "Skills \n";
echo $player->getStrength() . "\n";
echo $player->getDexterity() . "\n";
echo $player->getConstitution() . "\n";
echo $player->getIntelligence() . "\n";
echo $player->getWisdom() . "\n";
echo $player->getCharisma() . "\n";

function checkSkill($skill)
{
	if ($skill < 3) throw new Exception("Skill can't be that low");
	else if ($skill > 18) throw new Exception("Skill can't be that low");
}

checkSkill($player->getStrength());
checkSkill($player->getDexterity());
checkSkill($player->getConstitution());
checkSkill($player->getIntelligence());
checkSkill($player->getWisdom());
checkSkill($player->getCharisma());

// Ability modifiers
echo "Ability modifiers \n";
echo $player->getStrengthModifier() . "\n";
echo $player->getDexterityModifier() . "\n";
echo $player->getConstitutionModifier() . "\n";
echo $player->getIntelligenceModifier() . "\n";
echo $player->getWisdomModifier() . "\n";
echo $player->getCharismaModifier() . "\n";

// Chaining (these functions don't exist)
//$player->modifyStrength(2)->modifyDexterity(2)->modifyIntelligence(-4);

echo $player->classDescription() . "\n";