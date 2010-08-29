<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_andshadowbox_content'] = array (
	'ctrl' => $TCA['tx_andshadowbox_content']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,title,description,content'
	),
	'feInterface' => $TCA['tx_andshadowbox_content']['feInterface'],
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'title' => array (		
			'exclude' => 1,		
			'label' => 'LLL:EXT:and_shadowbox/locallang_db.xml:tx_andshadowbox_content.title',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'description' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:and_shadowbox/locallang_db.xml:tx_andshadowbox_content.description',		
			'config' => array (
				'type' => 'text',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'content' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:and_shadowbox/locallang_db.xml:tx_andshadowbox_content.content',		
			'config' => array (
				'type' => 'flex',
				'ds' => array (
					'default' => 'FILE:EXT:and_shadowbox/flexform_tx_andshadowbox_content_content.xml',
				),
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, description;;;;3-3-3, content')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>