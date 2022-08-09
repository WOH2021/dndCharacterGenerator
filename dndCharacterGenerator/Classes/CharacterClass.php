<?php
/**
 *  CharacterClass.php
 *
 *  Base class for our character.
 * 
 * 	@author			Lina Blijleven
 * 	@copyright	CodeCafé 2022
 */
Abstract Class CharacterClass
{
	// Set the default HP for a class
	const DEFAULT_HP = 10;

	// Default amount of optional skills
	protected $nOptionalSkills = 2;
	
	/**
	 *  The initial HP associated with that class
	 *
	 * 	@return	int
	 */
	public function initialHP() : int
	{
		// return the default value
		return self::DEFAULT_HP;
	}

	/**
   *  Generate some skills proficiencies for the class
   *
   * 	@param	array		The background proficiencies
   *  @return array 	The class proficiencies
   */
	public function generateSkillProficiencies($bgProficiencies)
	{
		// Store the proficiencies
		$cProficiencies = array();
		
		// Pick proficiencies until we have enough
		while (count($cProficiencies) < $this->nOptionalSkills)
		{
			// Pick a random proficiency
			$prof = $this->optionalSkills[array_rand($this->optionalSkills)];

			// Add only if it's not in bg proficiencies or the proficiencies 
			// we've already generated
			if (!in_array($prof, $bgProficiencies) && !in_array($prof, $cProficiencies))
			{
				echo "";
				array_push($cProficiencies, $prof);
			}
		}

		// Return the proficiencies
	  return $cProficiencies;
	}

	/** 
   *  Get the initial equipment associated with the class
   *
   *  @return	array
   */
	abstract function getInitialEquipment() : array;
	
	/**
	 *  Check if the given ability scores can be used with this class.
	 *
	 *	@param	array		An associative array containing all of the ability 
	 *									scores
   *  @return	bool	
	 */
	abstract function validAbilityScores(array $abilityScores) : bool;
}