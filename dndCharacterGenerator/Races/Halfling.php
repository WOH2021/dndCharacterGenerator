<?php
/**
 *  Halfling.php
 *
 *  Implementation of the halfling race
 *  + 2 Dexterity
 * 
 *  @author 				Maartje, Niels 
 *  @documentation	private
 */
Class Halfling extends Race
{
  // Store the subrace
	private $subrace;

	// Store our subraces
	const SUBRACES = array('StoutHalfling', 'LightfootHalfling');

	/**
   *  Constructor
   */
	public function __construct($subrace = null)
	{
		// We already know our subrace
		if (!$subrace)
		{
			$index = array_rand(self::SUBRACES);
			$subrace = self::SUBRACES[$index];
		}

		// Create our subrace
		$this->subrace = new $subrace();
	}

	/**
   *  Get a specific ability modifier
   * 
   *  @param	string 		The ability to retrieve
   *	@return int				The modifier
   */
	public function getAbilityModifier($skill) : int
	{
		return $this->subrace->abilityModifiers[$skill];
	}

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function raceName() : string
	{
		return "Halfling";
	}

	/**
   *	Retrieve the name from our subrace
   *  
   *  @return	string
	 */
	public function subRaceName() : string
	{
			return $this->subrace->name();
	}
}