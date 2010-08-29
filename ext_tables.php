<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';


t3lib_extMgm::addPlugin(array('LLL:EXT:and_shadowbox/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');


t3lib_extMgm::addStaticFile($_EXTKEY, 'pi1/static/', 'Shadowbox (Defaultsetting)');
t3lib_extMgm::addStaticFile($_EXTKEY, 'static/ce_click_enlarge', 'Shadowbox (Click enlarge for CEs)');
t3lib_extMgm::addStaticFile($_EXTKEY, 'static/tt_news_singleimg', 'Shadowbox (Click enlarge for tt_news Singleview-image)');

if (TYPO3_MODE=="BE")    $TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_andshadowbox_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_andshadowbox_pi1_wizicon.php';

// Flexforms
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] ='pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY . '/flexform.xml');

// Flexforms
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] ='pi_flexform';
if (t3lib_extMgm::isLoaded('dam')) {
  t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY . '/flexform.xml');
} else { 
  t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY . '/flexform_no_dam.xml');
}

$TCA['tx_andshadowbox_content'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:and_shadowbox/locallang_db.xml:tx_andshadowbox_content',		
		'label'     => 'uid',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_andshadowbox_content.gif',
	),
);
?>