<?php
/**
 *  LightfootHalfling.php
 *
 *  Implementation of the lightfoot halfling subrace
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */

Class LightfootHalfling
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	2,
		'constitution'	=> 	0,
		'intelligence'	=>	0,
		'wisdom'				=>	0,
		'charisma'			=>	1
	);
	
	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function name() : string
	{
		return "Lightfoot Halfling";
	}
}