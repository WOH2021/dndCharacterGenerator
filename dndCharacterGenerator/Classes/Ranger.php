<?php
/*
 *  Ranger.php
 * 
 *  Represents a character of the class Ranger.
 *  "Rangers are for tactically-minded players who might enjoy role-playing loners
 *  fighting from a distance and using the game’s landscape to their advantage."
 * 
 *  @author	Whalton Hippertt
 */

Class Ranger extends CharacterClass
{
	// Minimum ability scores (needs both)
	const MIN_WISDOM = 13;
	const MIN_DEXTERITY = 13;

	// Optional skills for the ranger
	public $optionalSkills = array("Animal Handling", "Athletics", "Insight", "Investigation", "Nature", "Perception", "Stealth", "Survival");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{
		$equipment = array(
			'Longbow'	=>	1,
			'Arrows'	=> 	20
		);
	
		// First set of choices
		$choiceOptions1 = array('Scale mail', 'Leather armor');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];
	 	$equipment[$choice1] = 1;

		// Second set of choices
		$choiceOptions2 = array('Two shortswords', 'Two simple melee weapons');
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Handle the second choice
		if ($choice2 == 'Two shortswords') $equipment['Shortsword'] = 2;
		else
		{
			$equipment[WeaponRandomizer::randomSimpleWeapon('melee')] = 1;
			$equipment[WeaponRandomizer::randomSimpleWeapon('melee')] = 1;
		}

		// Third set of choices
		$choiceOptions3 = array("Dungeoneer's pack", "Explorer's pack");
		$choice3 = $choiceOptions3[array_rand($choiceOptions2)];
		$equipment[$choice3] = 1;
		
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
		// Check if the wisdom requirement is met, if not we already
		// know it's false
		if (!$abilityScores['wisdom'] >= self::MIN_WISDOM) return false;
		
		// Check if the dexterity requirement is met
		return ($abilityScores['dexterity'] >= self::MIN_DEXTERITY);
	}

	/**
	  *  Get the character class
		* 
		* 	@return	string
		*/
	public function getClass() : string
	{
		return "Ranger";
	}
	
	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A warrior who uses martial prowess and nature magic to combat threats on the edges of civilization.";
	}
}