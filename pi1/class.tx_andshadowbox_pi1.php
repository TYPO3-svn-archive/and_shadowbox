<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Dirk <dirk@essential-crew.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'shadowbox' for the 'and_shadowbox' extension.
 *
 * @author	Dirk Eidam <dirk@essential-crew.de>
 * @package	TYPO3
 * @subpackage	tx_andshadowbox
 */
class tx_andshadowbox_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_andshadowbox_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_andshadowbox_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'and_shadowbox';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string	 $content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf)	{
		$this->conf = $conf; // Storing configuration as a member var
		$this->pi_loadLL(); // Loading language-labels
		$this->pi_setPiVarDefaults(); // Set default piVars from TS
		$this->pi_initPIflexForm(); // Init FlexForm configuration for plugin
    
    $this->config['mode'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'mode', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'mode', 'basic') : $this->conf['mode'];
    $this->config['itemdirectory'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemdirectory', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemdirectory', 'basic') : $this->conf['itemdirectory'];
    $this->config['itemdam'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemdam', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemdam', 'basic') : $this->conf['itemdam'];
    $this->config['itemdamcat'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemdamcat', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemdamcat', 'basic') : $this->conf['itemdamcat'];
    $this->config['recursivedamcat'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'recursivedamcat', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'recursivedamcat', 'basic') : $this->conf['recursivedamcat'];
    $this->config['itemcontent'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemcontent', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'itemcontent', 'basic') : $this->conf['itemcontent'];
    $this->config['thumb'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'thumb', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'thumb', 'basic') : $this->conf['thumb'];
    $this->config['thumbwidth'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'thumbwidth', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'thumbwidth', 'basic') : $this->conf['thumbwidth'];
    $this->config['thumbheight'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'thumbheight', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'thumbheight', 'basic') : $this->conf['thumbheight'];    
    $this->config['url'] = preg_split('/\r|\n/s',$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'url', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'url', 'basic') : $this->conf['url']);
    $this->config['linkvalue'] = preg_split('/\r|\n/s',$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'linkvalue', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'linkvalue', 'basic') : $this->conf['linkvalue']);
    $this->config['width'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'width', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'width', 'basic') : $this->conf['width'];
    $this->config['height'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'height', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'height', 'basic') : $this->conf['height'];
    $this->config['gallery'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'gallery', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'gallery', 'basic') : $this->conf['gallery'];
    $this->config['description'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'description', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'description', 'basic') : $this->conf['description'];
    $this->config['onlyfirstshow'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'onlyfirstshow', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'onlyfirstshow', 'basic') : $this->conf['onlyfirstshow'];
    $this->config['showmax'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'showmax', 'basic') ? $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'showmax', 'basic') : $this->conf['showmax'];
    
    //Options for Shadowbox   
    $this->option['handleLgImages'] = '\''.$this->conf['options.']['handleLgImages'].'\'';
    $this->option['counterType'] = '\''.$this->conf['options.']['counterType'].'\'';
    $this->option['continuous'] = $this->conf['options.']['continuous'];
    $this->option['animSequence'] = '\''.$this->conf['options.']['animSequence'].'\'';
    $this->option['showMovieControls'] = $this->conf['options.']['showMovieControls'];
    $this->option['autoplayMovies'] = $this->conf['options.']['autoplayMovies'];
    $this->option['overlayColor'] = '\''.$this->conf['options.']['overlayColor'].'\'';
    $this->option['overlayOpacity'] = $this->conf['options.']['overlayOpacity'];
    $this->option['resizeDuration'] = $this->conf['options.']['resizeDuration'];
    $this->option['fadeDuration'] = $this->conf['options.']['fadeDuration'];
    $this->option['displayCounter'] = $this->conf['options.']['displayCounter'];
    
    //TS Variablen
    $this->lconf['csswrapthumb'] = $this->conf['css.']['thumb.'];
    $this->lconf['csswraptext'] = $this->conf['css.']['text.'];
    $this->lconf['csswrapcontent'] = $this->conf['css.']['content.'];
    $this->lconf['fieldfortitle'] = explode(',',$this->conf['dam.']['fieldfortitle']);
    $this->lconf['fieldfordescription'] = explode(',',$this->conf['dam.']['fieldfordescription']);
    $this->lconf['strftime'] = $this->conf['dam.']['strftime'];
    $this->lconf['navinext'] = $this->conf['navigation.']['next'];
    $this->lconf['naviprev'] = $this->conf['navigation.']['prev'];
    $this->lconf['naviclose'] = $this->conf['navigation.']['close'];
    $this->lconf['jsframework'] = $this->conf['javascript.']['framework'];
    $this->lconf['jsonlyadapter'] = $this->conf['javascript.']['onlyadapter'];
    
    
    //bei leeren Flexformfelder für Thumbgröße wird Standardgröße gesetzt
    if ($this->config['thumbwidth']=='') {
        $this->config['thumbwidth'] = $this->conf['thumb.']['width'];
    }
    if ($this->config['thumbheight']=='') {
        $this->config['thumbheight'] = $this->conf['thumb.']['height'];
    }
    
    // Description aktivieren einfügen
    if ($this->config['description']==1 && ($this->config['mode']=='DAM' || $this->config['mode']=='DAMCAT')) {
      $this->option['displaydesc'] = 'true';
    }
    
    $option_array = $this->option;
    foreach ($option_array as $option=>$value) {  
        if (trim($value, '\'')!= '') {
            $options .= $option.':'.$value.',';
        }
    }
    
    if ($options) {
      $options = 'options={'.rtrim($options, ',').'};';
    }


    // Shadowbox size
    $boxwidth = '';
    if ($this->config['width']) {
        $boxwidth = 'width='.$this->config['width'].';';
    }
    $boxheight = '';
    if ($this->config['height']) {
        $boxheight = 'height='.$this->config['height'].';';
    }
    
    // Einbinden der Header-Scripts
    $this->getheader();
    //$GLOBALS['TSFE']->additionalHeaderData['and_shadowbox'] = $this->getheader();
 
    // Modus Auswahl
    if ($this->config['mode']=='DIRECTORY') {	
	     $content.=$this->show_ImagesDirectory($options,$boxwidth,$boxheight);
	  } elseif ($this->config['mode']=='DAM') {	
	     $content.=$this->show_ImagesDam($options,$boxwidth,$boxheight);
	  } elseif ($this->config['mode']=='DAMCAT') {
       $content.=$this->show_ImagesDamCat($options,$boxwidth,$boxheight);
    } elseif ($this->config['mode']=='CONTENT') {
       $content.=$this->show_Content($options,$boxwidth,$boxheight);
    } elseif ($this->config['mode']=='URL') {
       $content.=$this->show_Url($options,$boxwidth,$boxheight);
    }
	  
		return $this->pi_wrapInBaseClass($content);
	}
	
	/**
	 * Function to get the Elements by directory
	 *
	 * @param	array		$options: Shadowbox configuration	 
	 * @param	int	$width: Shadowbox width
	 * @param	int	$height: Shadowbox height
	 *   	 
	 * @return Dam Elemments
	 */
  function show_ImagesDirectory($options,$width,$height) {
    //cObj wichtig für wrap
    $cObj = t3lib_div::makeInstance('tslib_cObj');
    
    if (is_dir($this->config['itemdirectory'])) {
      	$images = array(); 
      	$images = $this->getFiles($this->config['itemdirectory']);
    }
    
    $uid = $this->cObj->data['uid'];
    
  	$y=0;
  	
    foreach ($images as $key=>$path) {  
      $error = 0;
      $boxwidth = $width;
      $boxheight = $height;
      
      $linkpath = $this->config['itemdirectory'].$path;
      
      $explode = explode('.',$path);
      $title = $explode[0];
      $filetype = $explode[1];
      if ($this->config['linkvalue'][$key]!='') {
          $title = $this->config['linkvalue'][$key];
      }


      $cssclass = 'option';
      // Only the first elemnt show
      if ($this->config['onlyfirstshow']==1) {
        $y++;
        if ($y==1) {
           $cssclass = 'option';
        } else {
           $cssclass = 'hidden';
        }
      } elseif (intval($this->config['showmax'] > 0)) {
        $y++;
        if ($y <= intval($this->config['showmax'])) {
           $cssclass = 'option';
        } else {
           $cssclass = 'hidden';
        }
      }


      // IF flv or swf make no thumbs
      if (strtolower($filetype)=='flv' || strtolower($filetype)=='swf') {
            
            // Make Thumbnails
            if($this->config['thumb']==1 && $cssclass == 'option') {  
                $imgTSConfigThumb['file'] = $this->conf['flash.']['logo'];
                if (strpos($this->config['thumbwidth'],'c') || strpos($this->config['thumbheight'],'c')) {
                  $imgTSConfigThumb['file.']['width'] = $this->config['thumbwidth'];
                  $imgTSConfigThumb['file.']['height'] = $this->config['thumbheight'];
                } else {
                  $imgTSConfigThumb['file.']['maxW'] = $this->config['thumbwidth'];
                  $imgTSConfigThumb['file.']['maxH'] = $this->config['thumbheight'];
                }
                      
                $thumbpath = $this->cObj->IMG_RESOURCE($imgTSConfigThumb);
  
                $link = '<img src="'.$thumbpath.'" class="thumbnail" alt="" />';
                $csswrap = 'csswrapthumb';  
            } else {
                $link = $title;
                $csswrap = 'csswraptext';
            }
            
            // Shadowbox size for Flash 
            if ($boxwidth == 0) {
                $boxwidth = $this->conf['flash.']['width'];
            }
            if ($boxheight == 0) {
                $boxheight = $this->conf['flash.']['height'];
            }
            $boxwidth = 'width='.$boxwidth.';';
            $boxheight = 'height='.$boxheight.';';
            
      } elseif (strtolower($filetype)=='png' || strtolower($filetype)=='gif' || strtolower($filetype)=='jpg') {
            // Set Image width and height
            if ($this->config['width'] != '' || $this->config['height'] != '') {
                $imgTSConfig['file'] = $linkpath;
                $imgTSConfig['file.']['maxW'] = $this->config['width'];
                $imgTSConfig['file.']['maxH'] = $this->config['height'];
                $linkpath = $this->cObj->IMG_RESOURCE($imgTSConfig);
                $boxwidth=''; 
                $boxheight='';               
            }
            
            // Make Thumbnails
            if($this->config['thumb']==1 && $cssclass == 'option') {  
                $imgTSConfigThumb['file'] = $linkpath;
                if (strpos($this->config['thumbwidth'],'c') || strpos($this->config['thumbheight'],'c')) {
                  $imgTSConfigThumb['file.']['width'] = $this->config['thumbwidth'];
                  $imgTSConfigThumb['file.']['height'] = $this->config['thumbheight'];
                } else {
                  $imgTSConfigThumb['file.']['maxW'] = $this->config['thumbwidth'];
                  $imgTSConfigThumb['file.']['maxH'] = $this->config['thumbheight'];
                }
                      
                $thumbpath = $this->cObj->IMG_RESOURCE($imgTSConfigThumb);
  
                $link = '<img src="'.$thumbpath.'" class="thumbnail" alt="" />';
                $csswrap = 'csswrapthumb';     
            } else {
                $link = $title;
                $csswrap = 'csswraptext';
            }
            
      } else {
         $error = 1;
      }
      
      // make gallery
      if($this->config['gallery']==1) {
        $galleryid = $uid;
      } else {
        $cssclass = 'option';
        $galleryid = $uid.$key;
      }    
      
      if ($error == 1){
        $content.='';
      } else {
        $linkok ='<a rel="shadowbox['.$galleryid.'];'.$options.$boxwidth.$boxheight.'" href="'.$linkpath.'" class="'.$cssclass.'" title="'.$title.'">'.$link.'</a>';      
        $content.= $cObj->stdWrap($linkok,$this->lconf[$csswrap]); 
      }
    }
    return $content;
  }
	
	/**
	 * Function to get the DAM Elements
	 *
	 * @param	array		$options: Shadowbox configuration	 
	 * @param	int	$width: Shadowbox width
	 * @param	int	$height: Shadowbox height
	 *   	 
	 * @return Dam Elemments
	 */
  function show_ImagesDam($options,$width,$height) {
    //cObj wichtig für wrap
    $cObj = t3lib_div::makeInstance('tslib_cObj');
    
    $uid = $this->cObj->data['uid'];

    $images = tx_dam_db::getReferencedFiles('tt_content',$uid,'and_shadowbox','tx_dam_mm_ref');

  	$y=0;
  	
    foreach ($images['files'] as $key=>$path) {  
      $error = 0;
      
      $boxwidth = $width;
      $boxheight = $height;
          
      // get data from the single image
      $fields = '*';
      $tables = 'tx_dam';
      
      /*
      // now i check the tx_dam table to see if there's a localization for the current DAM record (image)
      $temp_where='l18n_parent = '.$key.' AND sys_language_uid = '.$sys_language_uid;
      $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', $tables, $temp_where);
      // if i find a localized record i overwrite the default language $key with the localized language $key
      if ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
        $key = $row['uid'];
	    }
      $GLOBALS['TYPO3_DB']->sql_free_result($res);
      */
      
      $temp_where='uid = '.$key;
      $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields, $tables, $temp_where);
      $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);


      $cssclass = 'option';
      // Only the first elemnt show
      if ($this->config['onlyfirstshow']==1) {
        $y++;
        if($y==1) {
           $cssclass = 'option';
        } else {
           $cssclass = 'hidden';
        }
      } elseif (intval($this->config['showmax'] > 0)) {
        $y++;
        if ($y <= intval($this->config['showmax'])) {
           $cssclass = 'option';
        } else {
           $cssclass = 'hidden';
        }
      }


      	$linkpath = $path;
		// IF flv or swf make no thumbs
		if (strtolower($row['file_type'])=='flv' || strtolower($row['file_type'])=='swf') {

			// Make Thumbnails
			if($this->config['thumb']==1) {
				$imgTSConfigThumb['file'] = $this->conf['flash.']['logo'];
				
				//Anpassung alternative Bilder für Flashdateien
              if (substr($row['file_orig_location'], 0, 9) == 'fileadmin') {
                  $imgTSConfigThumb['file'] = $row['file_orig_location'];
              }
				
				if (strpos($this->config['thumbwidth'],'c') || strpos($this->config['thumbheight'],'c')) {
					$imgTSConfigThumb['file.']['width'] = $this->config['thumbwidth'];
					$imgTSConfigThumb['file.']['height'] = $this->config['thumbheight'];
				} else {
					$imgTSConfigThumb['file.']['maxW'] = $this->config['thumbwidth'];
					$imgTSConfigThumb['file.']['maxH'] = $this->config['thumbheight'];
				}

				$thumbpath = $this->cObj->IMG_RESOURCE($imgTSConfigThumb);

				$link = '<img src="'.$thumbpath.'" class="thumbnail" />';
				$csswrap = 'csswrapthumb';
			} else {
				$link = '';
				foreach ($this->lconf['fieldfortitle'] as $value) {
					if ($value == 'tstamp' || $value == 'date_cr' || $value == 'date_mode') {
						$link .= '<span class="tx-andshadowbox-'.$value.'">'.strftime($this->lconf['strftime'],$row[$value]).'</span>';
					} else {
						$link .= '<span class="tx-andshadowbox-'.$value.'">'.$row[$value].'</span>';
					}
				}
				$csswrap = 'csswraptext';
			}
            
            // Shadowbox size for Flash 
            $boxwidth = $row['width'];
            $boxheight = $row['height'];
            if ($boxwidth == 0) {
                $boxwidth = $this->conf['flash.']['width'];
            }
            if ($boxheight == 0) {
                $boxheight = $this->conf['flash.']['height'];
            }
            $boxwidth = 'width='.$boxwidth.';';
            $boxheight = 'height='.$boxheight.';';
            
      } elseif (strtolower($row['file_type'])=='png' || strtolower($row['file_type'])=='gif' || strtolower($row['file_type'])=='jpg') {
            // Set Image width and height
            if ($this->config['width'] != '' || $this->config['height'] != '') {
                $imgTSConfig['file'] = $path;
                $imgTSConfig['file.']['maxW'] = $this->config['width'];
                $imgTSConfig['file.']['maxH'] = $this->config['height'];
                $linkpath = $this->cObj->IMG_RESOURCE($imgTSConfig);
                $boxwidth=''; 
                $boxheight='';               
            }
            
            // Make Thumbnails
            if($this->config['thumb']==1 && $cssclass == 'option') {  
                $imgTSConfigThumb['file'] = $path;
                if (strpos($this->config['thumbwidth'],'c') || strpos($this->config['thumbheight'],'c')) {
                  $imgTSConfigThumb['file.']['width'] = $this->config['thumbwidth'];
                  $imgTSConfigThumb['file.']['height'] = $this->config['thumbheight'];
                } else {
                  $imgTSConfigThumb['file.']['maxW'] = $this->config['thumbwidth'];
                  $imgTSConfigThumb['file.']['maxH'] = $this->config['thumbheight'];
                }
                      
                $thumbpath = $this->cObj->IMG_RESOURCE($imgTSConfigThumb);
  
                $link = '<img src="'.$thumbpath.'" class="thumbnail" alt="'.$row['title'].'" />'; 
                $csswrap = 'csswrapthumb';     
            } else {
                $link = '';
                foreach ($this->lconf['fieldfortitle'] as $value) {
                  if ($value == 'tstamp' || $value == 'date_cr' || $value == 'date_mode') {
                      $link .= '<span class="tx-andshadowbox-'.$value.'">'.strftime($this->lconf['strftime'],$row[$value]).'</span>';
                  } else {
                      $link .= '<span class="tx-andshadowbox-'.$value.'">'.$row[$value].'</span>';
                  }                      
                }
                $csswrap = 'csswraptext';
            }
            
      } else {
         $error = 1;
      }
      
      // make gallery
      if($this->config['gallery']==1) {
        $galleryid = $uid;
      } else {
        $cssclass = 'option';
        $galleryid = $uid.$key;
      }
      
      // make description
      if ($this->config['description']==1) {
        $description = '';
        foreach ($this->lconf['fieldfordescription'] as $value) {
          if ($value == 'tstamp' || $value == 'date_cr' || $value == 'date_mode') {
             $description .= strftime($this->lconf['strftime'],$row[$value]);
          } else {
             $description .= $row[$value];
          }                      
        }         
        $description = 'rev="'.$description.'" ';
      } else {
        $description = '';
      }
      
      
      if ($error == 1){
        $content.='';
      } else {
        $linkok ='<a '.$description.'rel="shadowbox['.$galleryid.'];'.$options.$boxwidth.$boxheight.'" href="'.$linkpath.'" class="'.$cssclass.'" title="'.$row['title'].'">'.$link.'</a>';    
        $content.= $cObj->stdWrap($linkok,$this->lconf[$csswrap]); 
      }
    }     
    return $content;    
  }	
  
  /**
	 * Function to get the DAM Categorie Elements
	 *
	 * @param	array		$options: Shadowbox configuration	 
	 * @param	int	$width: Shadowbox width
	 * @param	int	$height: Shadowbox height
	 *   	 
	 * @return Dam Categorie Elemments
	 */
  function show_ImagesDamCat($options,$width,$height) {
    //cObj wichtig für wrap
    $cObj = t3lib_div::makeInstance('tslib_cObj');
    
	  $uid = $this->cObj->data['uid'];
    $list= str_replace('tx_dam_cat_', '',$this->config['itemdamcat']);
    $listRecursive = $this->getRecursiveDamCat($list,$this->config['recursivedamcat']);
    $listArray = explode(',',$listRecursive);
    $images = Array();
    $o=0;
    
		foreach($listArray as $cat) {
			
			// add images from categories
			$fields = '*';
			$tables = 'tx_dam,tx_dam_mm_cat';
			$temp_where = 'tx_dam.deleted = 0 AND tx_dam.hidden=0 AND tx_dam_mm_cat.uid_foreign='.$cat.' AND tx_dam_mm_cat.uid_local=tx_dam.uid';
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields, $tables, $temp_where);
			
      while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
        $files[$row['uid']] = $row; # just add the image to an array
			}
		}
		
		foreach ($files as $key=>$row) {
		    $error = 0;
        
        $boxwidth = $width;
        $boxheight = $height;
        
        $path =  $row['file_path'].$row['file_name'];


        $cssclass = 'option';
        // Only the first elemnt show
        if ($this->config['onlyfirstshow']==1) {
          $y++;
          if($y==1) {
             $cssclass = 'option';
          } else {
             $cssclass = 'hidden';
          }
        } elseif (intval($this->config['showmax'] > 0)) {
          $y++;
          if ($y <= intval($this->config['showmax'])) {
             $cssclass = 'option';
          } else {
             $cssclass = 'hidden';
          }
        }


        $linkpath = $path;
        // IF flv or swf make no thumbs
        if (strtolower($row['file_type'])=='flv' || strtolower($row['file_type'])=='swf') {
              
              // Make Thumbnails
              if($this->config['thumb']==1 && $cssclass == 'option') {  
                  $imgTSConfigThumb['file'] = $this->conf['flash.']['logo'];
                  if (strpos($this->config['thumbwidth'],'c') || strpos($this->config['thumbheight'],'c')) {
                    $imgTSConfigThumb['file.']['width'] = $this->config['thumbwidth'];
                    $imgTSConfigThumb['file.']['height'] = $this->config['thumbheight'];
                  } else {
                    $imgTSConfigThumb['file.']['maxW'] = $this->config['thumbwidth'];
                    $imgTSConfigThumb['file.']['maxH'] = $this->config['thumbheight'];
                  }
                        
                  $thumbpath = $this->cObj->IMG_RESOURCE($imgTSConfigThumb);
    
                  $link = '<img src="'.$thumbpath.'" class="thumbnail" alt="'.$row['title'].'" />';
                  $csswrap = 'csswrapthumb';   
              } else {
                  $link = '';
                  foreach ($this->lconf['fieldfortitle'] as $value) {
                    if ($value == 'tstamp' || $value == 'date_cr' || $value == 'date_mode') {
                        $link .= '<span class="tx-andshadowbox-'.$value.'">'.strftime($this->lconf['strftime'],$row[$value]).'</span>';
                    } else {
                        $link .= '<span class="tx-andshadowbox-'.$value.'">'.$row[$value].'</span>';
                    }                      
                  }
                  $csswrap = 'csswraptext';
              }
            
              // Shadowbox size for Flash 
              $boxwidth = $row['width'];
              $boxheight = $row['height'];
              if ($boxwidth == 0) {
                  $boxwidth = $this->conf['flash.']['width'];
              }
              if ($boxheight == 0) {
                  $boxheight = $this->conf['flash.']['height'];
              }
              $boxwidth = 'width='.$boxwidth.';';
              $boxheight = 'height='.$boxheight.';';
              
        } elseif (strtolower($row['file_type'])=='png' || strtolower($row['file_type'])=='gif' || strtolower($row['file_type'])=='jpg') {
              // Set Image width and height
              if ($this->config['width'] != '' || $this->config['height'] != '') {
                  $imgTSConfig['file'] = $path;
                  $imgTSConfig['file.']['maxW'] = $this->config['width'];
                  $imgTSConfig['file.']['maxH'] = $this->config['height'];
                  $linkpath = $this->cObj->IMG_RESOURCE($imgTSConfig);
                  $boxwidth=''; 
                  $boxheight='';               
              }
              
              // Make Thumbnails
              if($this->config['thumb']==1 && $cssclass == 'option') {  
                  $imgTSConfigThumb['file'] = $path;
                  
                  if (strpos($this->config['thumbwidth'],'c') || strpos($this->config['thumbheight'],'c')) {
                    $imgTSConfigThumb['file.']['width'] = $this->config['thumbwidth'];
                    $imgTSConfigThumb['file.']['height'] = $this->config['thumbheight'];
                  } else {
                    $imgTSConfigThumb['file.']['maxW'] = $this->config['thumbwidth'];
                    $imgTSConfigThumb['file.']['maxH'] = $this->config['thumbheight'];
                  }
        
                  $thumbpath = $this->cObj->IMG_RESOURCE($imgTSConfigThumb);
    
                  $link = '<img src="'.$thumbpath.'" class="thumbnail" alt="'.$row['title'].'" />';
                  $csswrap = 'csswrapthumb';      
              } else {
                  $link = '';
                  foreach ($this->lconf['fieldfortitle'] as $value) {
                    if ($value == 'tstamp' || $value == 'date_cr' || $value == 'date_mode') {
                        $link .= '<span class="tx-andshadowbox-'.$value.'">'.strftime($this->lconf['strftime'],$row[$value]).'</span>';
                    } else {
                        $link .= '<span class="tx-andshadowbox-'.$value.'">'.$row[$value].'</span>';
                    }                      
                  }
                  $csswrap = 'csswraptext';
              }
              
        } else {
           $error = 1;
        }
        
        // make gallery
        if($this->config['gallery']==1) {
          $galleryid = $uid;
        } else {
          $cssclass = 'option';
          $galleryid = $uid.$key;
        }
        
        // make description
      if ($this->config['description']==1) {      
        $description = '';
        foreach ($this->lconf['fieldfordescription'] as $value) {
          if ($value == 'tstamp' || $value == 'date_cr' || $value == 'date_mode') {
             $description .= strftime($this->lconf['strftime'],$row[$value]);
          } else {
             $description .= $row[$value];
          }                      
        }         
        $description = 'rev="'.$description.'" ';
      } else {
        $description = '';
      }
        
        if ($error == 1){
          $content.='';
        } else {
          $linkok = '<a '.$description.'rel="shadowbox['.$galleryid.'];'.$options.$boxwidth.$boxheight.'" href="'.$linkpath.'" class="'.$cssclass.'" title="'.$row['title'].'">'.$link.'</a>';
          $content.= $cObj->stdWrap($linkok,$this->lconf[$csswrap]); 
        }
    }
           
    return $content;    
  }
  
  /**
	 * Function to get the Content Elements
	 *
	 * @param	array		$options: Shadowbox configuration	 
	 * @param	int	$boxwidth: Shadowbox width
	 * @param	int	$boxheight: Shadowbox height
	 *   	 
	 * @return Content Elemments
	 */
  function show_Content($options,$boxwidth,$boxheight) {            
      //cObj wichtig für wrap
      $cObj = t3lib_div::makeInstance('tslib_cObj');
      
      $items = explode(',',$this->config['itemcontent']);
          
      foreach ($items as $key=>$uid) {
        
        $gallerypointer = $uid;    
        
        $cssclass = 'option';
        $csswrap = $this->lconf['csswraptext'];
        // Only the first elemnt show
        if ($this->config['onlyfirstshow']==1) {
          $y++;
          if($y==1) {
             $cssclass = 'option';
             $csswrap = $this->lconf['csswraptext'];
          } else {
             $cssclass = 'hidden';
             $csswrap = '';
          }
        } elseif (intval($this->config['showmax'] > 0)) {
          $y++;
          if ($y <= intval($this->config['showmax'])) {
             $cssclass = 'option';
          } else {
             $cssclass = 'hidden';
          }
        }
        
        // make gallery
        if($this->config['gallery']==1) {
          $galleryid = $this->cObj->data['uid'];
        } else {
          $galleryid = $uid;
        }
        
        $fields = '*';
        $tables = 'tt_content';
            
        $temp_where='uid = '.$uid;
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields, $tables, $temp_where);
        $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
        
        $renderarray = array('tables' => 'tt_content','source' => $row['uid'],'dontCheckPid' => 1);
        $rendercontent = $this->cObj->RECORDS($renderarray); 
        
        if ($this->config['linkvalue'][$key] != '') {
          $link = $this->config['linkvalue'][$key];
        } else {
          $link = $row['header'];
        }
        
        $content.= '<div id="shadowbox'.$gallerypointer.'" class="hidden">'.$cObj->stdWrap($rendercontent,$this->lconf['csswrapcontent']).'</div>';           
        $linkok = '<a rel="shadowbox['.$galleryid.'];'.$options.$boxwidth.$boxheight.'" class="'.$cssclass.'" title="'.$link.'" href="#shadowbox'.$gallerypointer.'">'.$link.'</a><br />';        
        $content.= $cObj->stdWrap($linkok,$csswrap);            
      }
      
      return $content;    
  }	
  
  /**
	 * Function to get the URL
	 *
	 * @param	array		$options: Shadowbox configuration	 
	 * @param	int	$boxwidth: Shadowbox width
	 * @param	int	$boxheight: Shadowbox height
	 *   	 
	 * @return URL
	 */
  function show_Url ($options,$boxwidth,$boxheight) {      
      //cObj wichtig für wrap
      $cObj = t3lib_div::makeInstance('tslib_cObj');
      $uid = $this->cObj->data['uid'];
      // Zufalsswert
      foreach ($this->config['url'] as $key=>$url) {
              
          $cssclass = 'option';
          $csswrap = $this->lconf['csswraptext'];
          // Only the first elemnt show
          if ($this->config['onlyfirstshow']==1) {
            $y++;
            if($y==1) {
               $cssclass = 'option';
               $csswrap = $this->lconf['csswraptext'];
            } else {
               $cssclass = 'hidden';
               $csswrap = '';
            }
          } elseif (intval($this->config['showmax'] > 0)) {
            $y++;
            if ($y <= intval($this->config['showmax'])) {
               $cssclass = 'option';
            } else {
               $cssclass = 'hidden';
            }
          }
          
          // make gallery
          if($this->config['gallery']==1) {
            $galleryid = $this->cObj->data['uid'];
          } else {    
            $galleryid = $uid.'-'.$key;
          }
      
          $linkok = '<a rel="shadowbox['.$galleryid.'];'.$options.$boxwidth.$boxheight.'" class="'.$cssclass.'" title="'.$this->config['linkvalue'][$key].'" href="'.$url.'">'.$this->config['linkvalue'][$key].'</a>';
          $content.= $cObj->stdWrap($linkok,$csswrap);
      }
      return $content;
  }
  
  /**
	 * get a list of recursive categories
	 *
	 * @param	string		$id: comma seperated list of ids
	 * @param	int		    $level: the level for recursion 	 
	 * @return	image(s)
	 */	
  function getheader() {  
      /* Removed and included in TypoScript for the case, the User wants to change the CSS file
      $GLOBALS['TSFE']->pSetup['includeCSS.'][$this->extKey . 'shadowbox'] = 'typo3conf/ext/and_shadowbox/res/css/shadowbox.css';
      $GLOBALS['TSFE']->pSetup['includeCSS.'][$this->extKey . 'shadowbox.']['media'] = 'screen';
      $GLOBALS['TSFE']->pSetup['includeCSS.'][$this->extKey . 'andshadowbox'] = 'typo3conf/ext/and_shadowbox/res/css/andshadowbox.css';
      $GLOBALS['TSFE']->pSetup['includeCSS.'][$this->extKey . 'andshadowbox.']['media'] = 'screen';*/

      // Local_Lang Werte für Navigation
      $llclose = $this->pi_getLL('close');
  		$llnext = $this->pi_getLL('next');
  		$llprev = $this->pi_getLL('prev');
  		$llof = $this->pi_getLL('of');
      
      // Bilder als Navigationselemente
      if ($this->lconf['naviclose'] != '') {
        $close = '<img src="'.$this->lconf['naviclose'].'" />';
      } else {
        $close = '<span class="shortcut">'.$llclose[0].'</span>'.ltrim($llclose, $llclose[0]);
      }
      if ($this->lconf['navinext'] != '') {
        $next = '<img src="'.$this->lconf['navinext'].'" />';
      } else {
        $next = '<span class="shortcut">'.$llnext[0].'</span>'.ltrim($llnext, $llnext[0]);
      }
      if ($this->lconf['naviprev'] != '') {
        $prev = '<img src="'.$this->lconf['naviprev'].'" />';
      } else {
        $prev = '<span class="shortcut">'.$llprev[0].'</span>'.ltrim($llprev, $llprev[0]);
      }

      // Framework Auswahl
      switch ($this->lconf['jsframework']) {
          // Prototype
          case 'prototype':
              if ($this->lconf['jsonlyadapter']==0) {
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_prototype']  = 'typo3conf/ext/and_shadowbox/res/scripts/lib/prototype.js';
              }
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . 'scriptaculous'] = 'typo3conf/ext/and_shadowbox/res/scripts/lib/scriptaculous/scriptaculous.js?load=effects';
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '__prototypeAdapter'] = 'typo3conf/ext/and_shadowbox/res/scripts/adapter/shadowbox-prototype.js';
          break;
          
          /*
          // Mootools
          case 'mootools':
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_mootools']  = 'typo3conf/ext/and_shadowbox/res/scripts/lib/mootools.js';
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_mootoolsAdapter']  = 'typo3conf/ext/and_shadowbox/res/scripts/adapter/shadowbox-mootools.js';

          break;
          */
          
          // JQuery
          case 'jquery':
              if ($this->lconf['jsonlyadapter']==0) {
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_jquery']  = 'typo3conf/ext/and_shadowbox/res/scripts/lib/jquery.js';
              }
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_jqueryAdapter'] = 'typo3conf/ext/and_shadowbox/res/scripts/adapter/shadowbox-jquery.js';
          break;
          
          // Dojo
          case 'dojo':
              if ($this->lconf['jsonlyadapter']==0) {
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_dojo']  = 'typo3conf/ext/and_shadowbox/res/scripts/lib/dojo.js';
              }
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_dojoAdapter'] = 'typo3conf/ext/and_shadowbox/res/scripts/adapter/shadowbox-dojo.js';
          break;
      
          // YUI
          case 'yui':
          default:
              if ($this->lconf['jsonlyadapter']==0) {
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_yui']  = 'typo3conf/ext/and_shadowbox/res/scripts/lib/yui-utilities.js';
              }
              $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_yuiAdapter'] = 'typo3conf/ext/and_shadowbox/res/scripts/adapter/shadowbox-yui.js';
          break;
          }
      
      $GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey . '_shadowbox'] = 'typo3conf/ext/and_shadowbox/res/scripts/shadowbox.js';
      
  		$script = '   
              window.onload = function(){
                  
                  var options = {
                  text:           {
                      cancel:     \''.$this->pi_getLL('cancel').'\',
                      loading:    \''.$this->pi_getLL('loading').'\',   
                      close:      \''.$close.'\',
                      next:       \''.$next.'\',
                      prev:       \''.$prev.'\',
                      of:         \''.$llof.'\'
                  },
                  keysClose:          [\''.strtolower ($llclose[0]).'\', 27],
                  keysNext:           [\''.strtolower ($llnext[0]).'\', 39],
                  keysPrev:           [\''.strtolower ($llprev[0]).'\', 37]
                  };
                                         
                  Shadowbox.init(options);
              };
      ';
      $GLOBALS['TSFE']->inlineJS[] = $script; #$GLOBALS['TSFE']->setJS($this->extKey, $script);
  }
  	/**
	 * Gets all image files out of a directory 
	 *
	 * @param	string  $path: Path to the directory
	 * @return Array with the images
	 */ 
  function getFiles($path, $extra = "") {
    // check for needed slash at the end
		$length = strlen($path);
		if ($path{$length-1}!='/') { 
      $path.='/';
    }
    
    $imagetypes = array (
        'jpg',
        'jpeg',
        'gif',
        'png',
        'flv',
        'swf'
    );

    if($dir = dir($path)) {
        $files = Array();

        while(false !== ($file = $dir->read())) {
            if ($file != '.' && $file != '..') {
                $ext = strtolower(substr($file, strrpos($file, '.')+1));
                if (in_array($ext, $imagetypes)) {
                    array_push($files, $extra . $file);
                }
                else if ($this->conf["recursive"] == '1' && is_dir($path . "/" . $file)) {
                    $dirfiles = $this->getFiles($path . "/" . $file, $extra . $file . "/");
                    if (is_array($dirfiles)) {
                        $files = array_merge($files, $dirfiles);
                    }
                }
            }
        }

        $dir->close();
        // sort files, thx to all
        sort($files);

        return $files;
    }
  } 
  
  
  /**
	 * get a list of recursive categories
	 *
	 * @param	string		$id: comma seperated list of ids
	 * @param	int		    $level: the level for recursion 	 
	 * @return	image(s)
	 */	
  function getRecursiveDamCat($id,$level=0) {
      $result = $id.','; # add id of 1st level 
      $idList = explode(',',$id);
      
      if ($level > 0) {
        $level--;
        
        foreach ($idList as $key=>$value) {
          $where = 'hidden=0 AND deleted=0 AND parent_id='.$id;
          $res= $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', 'tx_dam_cat', $where);
          while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){	
            $all[$row['uid']]=$row['uid'];
            $rec = $this->getRecursiveDamCat($row['uid'],$level);
            if ($rec!='')  {
              $result.=$rec.',';
            }
          }
        } # end for each
      } # end if level
       	
      $result = str_replace(',,',',',$result);
      $result = substr($result,0,-1);
      return $result;
  }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/and_shadowbox/pi1/class.tx_andshadowbox_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/and_shadowbox/pi1/class.tx_andshadowbox_pi1.php']);
}

?>