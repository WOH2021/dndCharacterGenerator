<?php
/**
 *  Bard.php
 * 
 *  Represents a character of the class Bard.
 * 
 *  @author Niels Keegel
 */
Class Bard extends CharacterClass 
{
	// Default HP for a bard is 12
	const DEFAULT_HP = 8;

	// Minimum strength for a bard
	const MIN_CHARISMA = 13;

	// The rogue is a special case where we can four options from a list of 
  // skills to choose from
	protected $nOptionalSkills = 3;

	/**
   *  Constructor
   */
	public function __construct()
	{
		// Get the list of proficiencies, so we can choose from it
		$this->optionalSkills = CharacterRandomizer::proficiencies();		
	}

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{			
		// First set of choices
		$choiceOptions1 = array('Rapier', 'Longsword', 'Simple weapon');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];

		// If we picked 'simple weapon' we need to pick a specific weapon
		if ($choice1 == 'Simple weapon') $choice1 = WeaponRandomizer::randomSimpleWeapon('all');

		// Second set of choices
		$choiceOptions2 = array("Diplomat's pack", "Entertainer's pack");
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Third set of choices
		$choiceOptions3 = array("Lute", "Musical instrument of choice");
		$choice3 = $choiceOptions3[array_rand($choiceOptions3)];

		// Set the equipment incl. standards
		return array (
			"Leather armor"	=>	1,
			"Dagger"				=>	1,
			$choice1				=>  1,
			$choice2				=>  1,
			$choice3				=>  1			
		);
	}

	/**
   *  Check if the given ability scores are valid for this class
   * 
   * 	@param	array		Associative array containing the scores
   *	@return	bool		
   */
  function validAbilityScores(array $abilityScores) : bool
	{
		// Check if we fit the charisma requirement
		return ($abilityScores['charisma'] >= self::MIN_CHARISMA);
	}

	/**
	 *  Get the character class
	 * 
	 * 	@return	string
	 */
	public function getClass() : string
	{
		return "Bard";
	}

	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "An inspiring magician whose power echoes the music of creation.";
	}
}