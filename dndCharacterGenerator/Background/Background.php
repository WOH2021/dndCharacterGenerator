<?php
/**
 *  Background.php
 * 
 *  This the base class for the different character backgrounds.
 *
 * 	@author
 *  @copyright
 */

Abstract Class Background
{
	// Store the characteristics for the background
	protected $characteristics = array();

	/** 
   *  Generate the characteristics from each background's specific list
   */
	public function generateCharacteristics($background)
	{
		// Select two personality traits and put them in a list
		$traiti = array_rand($background::PERSONALITY_TRAITS, 2);
		$this->characteristics['personalityTraits'] = array(
			$background::PERSONALITY_TRAITS[$traiti[0]], 
			$background::PERSONALITY_TRAITS[$traiti[1]]
		);
		
		// Select an ideal, bond and flaw as well
		$ideali = array_rand($background::IDEALS);
		$bondi = array_rand($background::BONDS);
		$flawi = array_rand($background::FLAWS);
		$this->characteristics['ideal'] = $background::IDEALS[$ideali];
		$this->characteristics['bond'] = $background::BONDS[$bondi];
		$this->characteristics['flaw'] = $background::FLAWS[$flawi];
	}

	/**
   *	Every background needs a descriptor/name
   *
   *	@return	string
   */
	abstract public function name() : string;

	/**
   *  Every background has a feature
   * 
   *	@return string
	 */
	abstract public function featureName() : string;

	/**
   *  Description for the background feature
   * 
   *	@return string
	 */
	abstract public function featureDescription() : string;

	/**
   *  Every background has certain characteristics.
   *  These include:
   *  - Personality traits
   *  - Ideal
   *  - Bond
   *  - Flaw
   */
	public function getCharacteristics()
	{
		return $this->characteristics;
	}
	
	/**
	 *  Get the skill proficiencies specifically related to 
	 *  the background.
	 *
	 *  @return	array
	 */
	public function getSkillProficiencies() : array
	{
		return $this->skillProficiencies;
	}

	/**
	 *  Get the starting equipment specifically related to 
	 *  the background.
	 *
	 *  @return	array
	 */
	public function getInitialEquipment() : array
	{
		return $this->initialEquipment;
	}

	/**
	 *  Get the initial funds/money/cash/stacks for
	 *  the background.
	 *
	 *  @return	array
	 */
	public function getInitialFunds() : array
	{
		return $this->initialFunds;
	}
}