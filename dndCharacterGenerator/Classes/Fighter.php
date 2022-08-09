<?php
/**
 *  Fighter.php
 * 
 *  Represents a character of the class Fighter.
 * 
 *  @author Niels Keegel and Luuk Verhage
 */
Class Fighter extends CharacterClass
{	
	// Minimum ability scores for a fighter (can be either)
	const MIN_STRENGTH = 13;
	const MIN_DEXTERITY = 13;

	// Optional skills for the fighter
	public $optionalSkills = array("Acrobatics", "Animal Handling", "Athletics", "History", "Insight", "Intimidation", "Perception", "Survival");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{			
		// Store the equipment
		$equipment = array();
		
		// First set of choices
		$choiceOptions1 = array('Chain mail armor', 'Leather armor, longbow and 20 arrows');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];

		// Handle the first choice
		if ($choice1 == 'Leather armor, longbow and 20 arrows')
		{
			$equipment['Leather armor'] = 1;
			$equipment['Longbow']	= 1;
			$equipment['Arrows'] = 20;
		}
		else
		{
			$equipment['Chain mail armor'] = 1;
		}

		// Second set of choices
		$choiceOptions2 = array("Martial weapon + shield", "Two martial weapons");
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Add one weapon
		$equipment[WeaponRandomizer::randomMartialWeapon()] = 1;

		// Add one more or the shield (may result in duplicates)
		if ($choice2 == "Martial weapon + shield") $equipment['Shield'] = 1;
		else $equipment[WeaponRandomizer::randomMartialWeapon()] = 1;

		// Third set of choices
		$choiceOptions3 = array("Light crossbow + 20 bolts", "Two handaxes");
		$choice3 = $choiceOptions3[array_rand($choiceOptions3)];
		
		// Handle the first choice
		if ($choice3 == 'Light crossbow + 20 bolts')
		{
			$equipment['Light crossbow'] = 1;
			$equipment['Bolts'] = 20;
		}
		else
		{
			$equipment['Handaxe(s)'] = 2;
		}

		// Fourth set of choices
		$choiceOptions4 = array("Dungeoneer's pack", "Explorer's pack");
		$choice4 = $choiceOptions4[array_rand($choiceOptions4)];
		$equipment[$choice4] = 1;
		
		return $equipment;
	}

	/**
   *  Check if the given ability scores are valid for this class
   * 
   * 	@param	array		Associative array containing the scores
   *	@return	bool		
   */
  function validAbilityScores(array $abilityScores) : bool
	{
		// Check if we fit the strength/dexterity requirement
		return ($abilityScores['strength'] >= self::MIN_STRENGTH || $abilityScores['dexterity'] >= self::MIN_DEXTERITY);
	}

	/**
	  *  Get the character class
		* 
		* 	@return	string
		*/
	public function getClass() : string
	{
		return "Fighter";
	}
	
	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A master of martial combat, skilled with a variety of weapons and armor.";
	}
}