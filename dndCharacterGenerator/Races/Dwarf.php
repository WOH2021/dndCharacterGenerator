<?php
/**
 *  Dwarf.php
 *
 *  Implementation of the dwarf race
 *  
 *  @todo Add a hill dwarf and mountain dwarf
 *
 *  @author 				Lina Blijleven
 *  @documentation	private
 */

Class Dwarf extends Race
{
	// Store the subrace
	private $subrace;

	// Store our subraces
	const SUBRACES = array('HillDwarf', 'MountainDwarf');

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
		return "Dwarf";
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

	/**
	 *	Return the HP modifier. This depends on the subrace
   *  of the dwarf, so we overwrite the method.
   * 
   *  @return	int
	 */
	public function getHpModifier() : int
	{
		return ($this->subRaceName() == 'Hill Dwarf') ? 1 : 0;
	}
}
