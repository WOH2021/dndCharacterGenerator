<?php
/**
 *  Gnome.php
 *
 *  Implementation of the gnome race
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */
Class Gnome extends Race
{
	// Store the subrace
	private $subrace;

	// Store our subraces
	const SUBRACES = array('DeepGnome', 'RockGnome');

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
		return "Gnome";
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