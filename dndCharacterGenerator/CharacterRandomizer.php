<?php
/**
 *	CharacterRandomizer.php
 * 
 *  A class to help us randomize character traits.
 *
 *  Helps generate:
 *  - Class
 *  - Race
 *  - Alignment
 * 
 * 	@author	Lina Blijleven
 */
class CharacterRandomizer
{
	// Store all possible classes
	const CLASSES = array('Barbarian', 'Bard', 'Cleric', 'Druid', 'Fighter', 'Monk', 'Paladin', 'Ranger', 'Rogue', 'Sorcerer', 'Warlock', 'Wizard');

	// Store all possible races
	const RACES = array('Dragonborn', 'Elf', 'Gnome', 'HalfElf', 'Halfling', 'HalfOrc', 'Human', 'Tiefling');

	// Store all the possible alignments
	const ALIGNMENTS = array('lawful good', 'neutral good', 'chaotic good', 'lawful neutral', 'neutral', 'chaotic neutral', 'lawful evil', 'neutral evil', 'chaotic evil');

	// Store all the possible backgrounds (using the same names as their classes)
	const BACKGROUNDS = array("Acolyte", "Criminal", "FolkHero", "Noble", "Sage", "Soldier");

	// Store all the possible proficiencies
	const PROFICIENCIES = array("Athletics", "Acrobatics", "Sleight of Hand", "Stealth", "Arcana", "History", "Investigation", "Nature", "Religion", "Animal Handling", "Insight", "Medicine", "Perception", "Survival", "Deception", "Intimidation", "Performance", "Persuasion");
	
	// Methods to return a random string for classes, races, alignments and 
	// backgrounds.
	public static function randomClass() : string { return self::CLASSES[array_rand(self::CLASSES)]; }
	public static function randomRace() : string { return self::RACES[array_rand(self::RACES)]; }
	public static function randomAlignment() : string { return self::ALIGNMENTS[array_rand(self::ALIGNMENTS)]; }
	public static function randomBackground() : string { return self::BACKGROUNDS[array_rand(self::BACKGROUNDS)]; }

	// Methods to access the arrays containing the possibilities
	public static function classes() : array { return self::CLASSES; }
	public static function races() : array { return self::RACES; }
	public static function alignments() : array { return self::ALIGNMENTS; }
	public static function backgrounds() : array { return self::BACKGROUNDS; }
	public static function proficiencies() : array { return self::PROFICIENCIES; }
}