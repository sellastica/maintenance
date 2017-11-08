<?php
namespace Sellastica\Maintenance;

class Maintenance
{
	/** @var string|null */
	private static $localFile;
	/** @var string|null */
	private static $globalFile;


	/**
	 * @param string $localFile
	 * @param string $globalFile
	 */
	public static function init(string $localFile, string $globalFile): void
	{
		self::$localFile = $localFile;
		self::$globalFile = $globalFile;
	}
	
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

	/**
	 * @return bool
	 */
	public static function is(): bool 
	{
		return self::isLocal() || self::isGlobal();
	}

	public static function remove()
	{
		self::removeLocal();
		self::removeGlobal();
	}
}
