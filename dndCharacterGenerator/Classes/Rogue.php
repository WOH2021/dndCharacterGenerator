<?php
/**
 *  Rogue.php
 * 
 *  Represents a character of the class Rogue.
 * 
 *  @author Niels Keegel
 */

Class Rogue extends CharacterClass
{
	// Default HP for a rogue is 8
	const DEFAULT_HP = 8;
	
	// Minimum strength for a barbarian
	const MIN_DEXTERITY = 13;

	// The rogue is a special case where we can four options from a list of 
  // skills to choose from
	protected $nOptionalSkills = 4;

	// The list of optional skills
	public $optionalSkills = array("Acrobatics", "Athletics", "Deception", "Insight", "Intimidation", "Investigation", "Perception", "Performance", "Persuasion", "Sleight of Hand", "Stealth");

/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{
		// Set the standard equipment
		$equipment = array(
			"Leather armor"		=>	1,
			"Dagger"					=>	2,
      "Thieves' Tools" 	=> 	1
		);
		
		// First set of choices
		$choiceOptions1 = array("Dungeoneer's Pack", "Explorer's Pack", "Burglar's Pack");
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];
		$equipment[$choice1] = 1;
		
		// Second set of choices
		$choiceOptions2 = array("Shortbow + 20 arrows", 'Shortsword');
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Handle the choice
		if ($choice2 == "Shortbow + 20 arrows") 
		{
			// Add to the equipment
		  $equipment['Shortbow'] = 1;
      $equipment["Arrows"] = 20;
		}
		else $equipment[$choice2] = 1;

    // Third set of choices
    $choiceOptions3 = array("Rapier", "Shortword");
		$choice3 = $choiceOptions3[array_rand($choiceOptions3)];
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
		// Check if we fit the dexterity requirement
		return ($abilityScores['dexterity'] >= self::MIN_DEXTERITY);
	}

	/**
	  *  Get the character class
		* 
		* 	@return	string
		*/
	public function getClass() : string
	{
		return "Rogue";
	}
	
	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A scoundrel who uses stealth and trickery to overcome obstacles and enemies.";
	}
}