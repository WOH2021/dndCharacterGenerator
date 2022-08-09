<?php
/* 
 * Take four random numbers from 1 to 6,
 * drop the lowest
 * the sum of the 3 highest numbers is the ability score
 *
 * @return	int
 */
function abilityScore()
{
		// roll four random numbers
    $fourrandom = [rand(1, 6), rand(1, 6), rand(1, 6), rand(1, 6)];

		// sort the numbers by magnitude
    sort($fourrandom);

		// remove the first element (which is the lowest roll)
    array_shift($fourrandom);

		// return the sum
    return array_sum($fourrandom);
}

// Roll a score for the skills that we have
$str = abilityScore();
$dex = abilityScore();
$con = abilityScore();
$int = abilityScore();
$wis = abilityScore();
$cha = abilityScore();
echo "strength $str. \n";
echo "dexterity $dex. \n";
echo "constitution $con. \n";
echo "intelligence $int. \n";
echo "wisdom $wis. \n";
echo "charisma $cha. \n";

// ability modifier score is ability score minus 10, divided by 2 and rounded down
$strmod = floor(($str - 10) / 2);
$dexmod = floor(($dex - 10) / 2);
$conmod = floor(($con - 10) / 2);
$intmod = floor(($int - 10) / 2);
$wismod = floor(($wis - 10) / 2);
$chamod = floor(($cha - 10) / 2);

echo "constitution modifier = $conmod. \n";

// initial hitpoints are the sum of 10 and the constitution modifier
$inihp = 10 + $conmod;
echo "initial hp =  $inihp. \n";

// random class
$classes = ["Artificer", "Barbarian", "Bard", "Cleric", "Druid", "Fighter", "Paladin", "Ranger", "Rogue", "Sorcerer", "Warlock", "Wizard"];

// classes have prerequisites
$strclasses = ["Barbarian", "Paladin"];
$dexclasses = ["Ranger", "Rogue"];
$intclasses = ["Artificer", "Wizard"];
$wisclasses = ["Cleric", "Druid", "Ranger"];
$chaclasses = ["Bard", "Sorcerer", "Warlock"];

// remove fighter if strength and dexterity are both lower than 13
if($str < 13 && $dex < 13)
{
    array_splice($classes, 5, 1);
}

// remove Barbarian and Paladin if strength is lower than 13
if($str < 13)
{
    $classes = array_diff($classes, $strclasses);
}

// remove Rogue and Ranger if dexterity is lower than 13
if($dex < 13)
{
    $classes = array_diff($classes, $dexclasses);
}

// remove Artificer and Wizard if intelligence is lower than 13
if($int < 13)
{
    $classes = array_diff($classes, $intclasses);
}

// remove Cleric and Druid if wisdom is lower than 13
if($wis < 13)
{
    $classes = array_diff($classes, $wisclasses);
}

// remove Bard, Sorcerer and Warlock if charisma is lower than 13
if($cha < 13)
{
    $classes = array_diff($classes, $chaclasses);
}

// error message if no classes are suitable
if(count($classes) == 0)
{
    echo "Rolled Stats too low to make a character, please try again.";
}

$class = $classes[array_rand($classes)];
echo $class. "\n";
print_r($classes);