<?php
namespace Sellastica\Maintenance;

class Maintenance
{
	/** @var string */
	private static $localFile;
	/** @var string */
	private static $globalFile;
	/** @var string */
	private static $invisibleLocalFile;


	/**
	 * @param string $localFile
	 * @param string $globalFile
	 * @param string $invisibleLocalFile
	 */
	public static function init(
		string $localFile,
		string $globalFile,
		string $invisibleLocalFile
	): void
	{
		self::$localFile = $localFile;
		self::$globalFile = $globalFile;
		self::$invisibleLocalFile = $invisibleLocalFile;
	}

	/**
	 * @return bool
	 */
	public static function is(): bool
	{
		return self::isLocal() || self::isGlobal() || self::isInvisibleLocal();
	}

	public static function remove(): void
	{
		self::removeLocal();
		self::removeGlobal();
		self::removeInvisibleLocal();
	}


	/*****************************************************/
	/********************** local ************************/
	/*****************************************************/


	/**
	 * @return bool
	 */
	public static function isLocal(): bool 
	{
		return is_file(self::$localFile);
	}
	
	public static function setLocal()
	{
		touch(self::$localFile);
	}

	public static function removeLocal()
	{
		if (self::isLocal()) {
			unlink(self::$localFile);
		}
	}


	/*****************************************************/
	/********************** global ***********************/
	/*****************************************************/


	public static function isGlobal(): bool
	{
		return is_file(self::$globalFile);
	}
	
	public static function setGlobal()
	{
		touch(self::$globalFile);
	}

	public static function removeGlobal()
	{
		if (self::isGlobal()) {
			unlink(self::$globalFile);
		}
	}

	/*****************************************************/
	/***************** invisible local *******************/
	/*****************************************************/


	/**
	 * @return bool
	 */
	public static function isInvisibleLocal(): bool
	{
		return is_file(self::$invisibleLocalFile);
	}

	public static function setInvisibleLocal()
	{
		touch(self::$invisibleLocalFile);
	}

	public static function removeInvisibleLocal()
	{
		if (self::isInvisibleLocal()) {
			unlink(self::$invisibleLocalFile);
		}
	}
}
