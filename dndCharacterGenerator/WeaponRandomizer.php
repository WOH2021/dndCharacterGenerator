<?php
/**
 *  WeaponRandomizer.php
 *
 *  Randomizer to help choose random weapons.
 * 
 *  @author			Lina Blijleven
 *	@copyright	CodeCafé 2022
 */

Class WeaponRandomizer
{
	// Store the martial weapons divided into melee and ranged
	const MARTIAL_MELEE_WEAPONS = array('Battleaxe', 'Flail', 'Glaive', 'Greataxe', 'Greatsword', 'Halberd', 'Lance', 'Longsword', 'Maul', 'Morningstar', 'Pike', 'Rapier', 'Scimitar', 'Shortsword', 'Trident', 'WarPick', 'Warhammer', 'Whip');
	const MARTIAL_RANGED_WEAPONS = array('Blowgun', 'HandCrossbow', 'HeavyCrossbow', 'Longbow', 'Net');
	
	// Store the simple weapons
	const SIMPLE_MELEE_WEAPONS = array('Club', 'Dagger', 'Greatclub', 'Handaxe', 'Javelin', 'LightHammer', 'Mace', 'Quarterstaff', 'Sickle', 'Spear');
	const SIMPLE_RANGED_WEAPONS = array('LightCrossbow', 'Dart', 'Shortbow', 'Sling');
	
	/**
	 *  Choose a random martial weapon (optionally with a weapon type)
	 *
	 * 	@param	string		Type: all, melee, ranged
	 *	@return	string		Chosen weapon
	 */
	public static function randomMartialWeapon(string $type = 'all') : string 
	{
		// Determine the choice pool
		switch($type)
		{
			case 'melee':
				$pool = self::MARTIAL_MELEE_WEAPONS;
				break;
			case 'ranged':
				$pool = self::MARTIAL_RANGED_WEAPONS;
				break;
			default:
				$pool = array_merge(self::MARTIAL_MELEE_WEAPONS, self::MARTIAL_RANGED_WEAPONS);
				break;
		}
	
		// Choose from our pool
		return $pool[array_rand($pool)];
	}

	/**
	 *  Choose a simple weapon
   * 
   * 	@param	string		Type: all, melee, ranged
	 * 	@return	string	Chosen weapon
	 */
	public static function randomSimpleWeapon(string $type = 'all') : string
	{
		// Determine the choice pool
		switch($type)
		{
			case 'melee':
				$pool = self::SIMPLE_MELEE_WEAPONS;
				break;
			case 'ranged':
				$pool = self::SIMPLE_RANGED_WEAPONS;
				break;
			default:
				$pool = array_merge(self::SIMPLE_MELEE_WEAPONS, self::SIMPLE_RANGED_WEAPONS);
				break;
		}
		
		return $pool[array_rand($pool)];
	}
}

