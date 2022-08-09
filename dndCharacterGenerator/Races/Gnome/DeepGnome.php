<?php
/**
 *  DeepGnome.php
 *
 *  Implementation of the deep gnome subrace
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */

Class DeepGnome
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	1,
		'constitution'	=> 	0,
		'intelligence'	=>	2,
		'wisdom'				=>	0,
		'charisma'			=>	0
	);
	
	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function name() : string
	{
		return "Deep Gnome";
	}
}