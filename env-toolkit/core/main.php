<?php
/**
 * This file was automatically generated by the compiler on 2020-03-18 16:36:50 -- DO NOT EDIT
 */

/**
 * Portal(s) definition(s) extracted from the XML definition at compile time
 */
class PortalDispatcherData
{
	protected static $aData = array (
  'legacy_portal' => 
  array (
    'rank' => 1.0,
    'handler' => 'PortalDispatcher',
    'url' => 'portal/index.php',
    'allow' => 
    array (
    ),
    'deny' => 
    array (
    ),
  ),
  'backoffice' => 
  array (
    'rank' => 2.0,
    'handler' => 'PortalDispatcher',
    'url' => 'pages/UI.php',
    'allow' => 
    array (
    ),
    'deny' => 
    array (
      0 => 'Portal user',
    ),
  ),
);

	public static function GetData($sPortalId = null)
	{
		if ($sPortalId === null) return self::$aData;
		if (!array_key_exists($sPortalId, self::$aData)) return array();
		return self::$aData[$sPortalId];
	}
}

/**
 * Relations
 */
MetaModel::RegisterRelation('impacts');
