<?php
/**
 *  Race.php
 *
 *	Abstract class for the race
 *
 *  @author 				Lina Blijleven	
 *  @documentation	private
 */
Abstract Class Race
{
	// Store the ability modifiers
	protected $abilityModifiers;

	// Store the HP modifier
	protected $hpModifier = 0;

	// Retrieve the name of the race
	abstract function raceName();

	// We don't necessarily need a subrace
	public function subRaceName()
	{
		return '';
	}
	
	/**
   *  Get a specific ability modifier
   * 
   *  @param	string 		The ability to retrieve
   *	@return int				The modifier
   */
	public function getAbilityModifier($skill) : int
	{
		return $this->abilityModifiers[$skill];
	}

	/**
	 *	Return the HP modifier. This exists because hill dwarves 
   *  have a bonus +1 hp for every level.
   * 
   *  @return	int
	 */
	public function getHpModifier() : int
	{
		return $this->hpModifier;
	}
}