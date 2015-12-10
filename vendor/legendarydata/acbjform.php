<?php

require_once( $_SERVER["DOCUMENT_ROOT"] . "/lib/meroveusform.php" );

class ACBJForm extends MeroveusForm {

	public function __construct($oMero) {
		parent::__construct($oMero);
	}

	public static function deserialize( $aData ) {
		MeroveusClient::$meroveus = $aData["mero"]["host"];
		$oMero = new MeroveusClient( $aData["mero"]["akey"], $aData["mero"]["ekey"] );
		$oForm = new ACBJForm( $oMero );
		$oForm->metaArray = $aData["metaArray"];
		$oForm->labelLookupArray = $aData["labelLookupArray"];
		$oForm->recArray = $aData["recArray"];
		$oForm->fieldArray = $aData["fieldArray"];
		$oForm->iNewCounter = $aData["iNewCounter"];
		return $oForm;
	}

	protected function renderSet( $oField, $oDat, $iMetaId, &$oParentRec, $iParentMetaId ) {
		$iFieldId = $this->registerField( $oField );
		$iParentId = $oParentRec->ID;
		$aRecs = isset( $oDat->SET ) && isset( $oDat->SET->RECS ) ? $oDat->SET->RECS : array();
		$sRemoveConfirm = isset( $this->removeConfirmFunc ) ? $this->removeConfirmFunc :'confirm( \'Remove record?\' )';
		$sEditConfirm = isset( $this->editConfirmFunc ) ? $this->editConfirmFunc : "";
		$sHtml = "";
		$aContacts = isset( $oParentRec->CONTACTS ) ? $oParentRec->CONTACTS : array();
		$isContactsZone = ( $iParentMetaId == 0 && $oDat != null && isset($oDat->SET->RECTYP) && $oDat->SET->RECTYP == "Person" );
		foreach ( $aRecs as $oRec ) {
			$this->registerRec( $oRec );
			$target = '/'.$iMetaId.'/'.$oRec->ID.'/'.$iParentId.'/'.$iParentMetaId."/".$iFieldId.$this->parseReturnPath($iParentId);

			$sHtml .= '<tr class="rec_'.$oRec->ID.'">';
			if ( $isContactsZone ) {
				$sHtml .= '<td style="width:20%;" class="surveymeTd">'.$this->buildContactChecker($oParentRec, $oRec, $aContacts, '<a href="#" data-role="button" data-icon="mail" data-theme="b" onClick="'.$sEditConfirm.'ACBJ.followLink(\''.$this->containerTargetUrl.$target.'\', \'#form-content\');">Add Email</a>').'</td>';
			}

			$sEditOnClick =$sEditConfirm."ACBJ.followLink('".$this->containerTargetUrl.$target."', '#form-content');";//document.getElementById(\'submitForm\').submit();';
			//name
			$sHtml .= '<td>'.$this->renderSetRecLink($oRec, $sEditOnClick).'</td>';

			//edit
			$sHtml .= '<td style="width:15%;"><a href="#" data-theme="b" data-inline="false" data-role="button" data-icon="edit" class="button" onClick="'.$sEditOnClick.'">Edit</a></td>';

			//delete
			//$sHtml .= '<td style="width:15%;"><a data-theme="b" class="removeFromSet button" data-inline="false" data-role="button" data-icon="delete" href="#" onClick="if ( !'.$sRemoveConfirm.' ) return false; document.getElementById(\'submitForm\').action=\''.$this->containerRemoveUrl.$target.'\';document.getElementById(\'submitForm\').submit();">Remove</a></td>';
			$sHtml .= '<td style="width:15%;"><a data-theme="b" class="removeFromSet button" data-inline="false" data-role="button" data-icon="delete" href="#" onClick="if ( !'.$sRemoveConfirm.' ) return false; ACBJ.followLink(\''.$this->containerRemoveUrl.$target.'\', \'#form-content\');">Remove</a></td>';
			
			$sHtml .= '</tr>' . "\n";
		}
		$sHtml = '<tbody>'.$sHtml.'</tbody>';
		//$sHtml = '<thead><tr>'.($isContactsZone?'<th>Survey Contact</th>':"").'<th></th></tr></thead>' . $sHtml;
		$sHtml = '<table class="setTable">'.$sHtml.'</table>' . "\n";
		if ( $isContactsZone ) {
			$sHtml = $this->contactsIntroHtml . $sHtml;
		}
		$target = $this->containerTargetUrl.'/'.$iMetaId.'/-1/'.$iParentId.'/'.$iParentMetaId."/".$iFieldId.$this->parseReturnPath($iParentId);
		//$sHtml .= '<a class="button create" data-role="button" data-icon="plus" data-theme="b" href="#" onClick="'.$sEditConfirm.'document.getElementById(\'submitForm\').action=\''.$target.'\';document.getElementById(\'submitForm\').submit();">'.$this->renderSetCreateLabel( $oField ).'</a>';
		if ( $oField->TYP != "Event" ) {
			/* force the user to use the calendar interface for Events */
			$sHtml .= '<a class="button create" data-role="button" data-icon="plus" data-theme="b" href="#" onClick="'.$sEditConfirm.'ACBJ.followLink(\''.$target.'\', \'#form-content\');">'.$this->renderSetCreateLabel( $oField ).'</a>';
		}
		return $sHtml;
	}

	public function renderField( &$oField, &$oRec, $oMeta ) {
		if ( isset( $oField->FORMAT->HIDE ) && $oField->FORMAT->HIDE === true ) {
			return "";
		} else if ( isset( $oField->FORMAT->LOCK ) && $oField->FORMAT->LOCK === true ) {
			return $this->LockedText( $oField, $oRec, $oMeta );
		}
		/*if ( isset( $oField->KEY ) && ($sOverrideMethod = $this->detectOverride( $oField->KEY )) != false ) {
			return $this->$sOverrideMethod( $oField, $oRec, $oMeta );
		} else if ( isset( $oField->TYP ) && ($sOverrideMethod = $this->detectOverride( $oField->TYP )) != false ) {
			return $this->$sOverrideMethod( $oField, $oRec, $oMeta );
		}*/
		if ( $oField->TYP == "Instructions" ) {
			$sHtml = '<p class="instructions';
			if ( isset( $oField->FORMAT ) && isset( $oField->FORMAT->CSSCLASS ) ) {
				$sHtml .= ' ' . $oField->FORMAT->CSSCLASS;
			}
			$sHtml .= '">'.$oField->NAME.'</p>';
		} else {
			$isRequired = isset( $oField->FORMAT ) && isset( $oField->FORMAT->REQUIRED ) ? $oField->FORMAT->REQUIRED : false;
			$reqAr = self::GetRequiredFieldsByRecTyp( $oRec->RECTYP );
			if ( in_array( $oField->KEY, $reqAr ) ) {
				$isRequired = true;
			}
			$sDClass = MeroveusClient::parseDataClass( $oField->KEY );
			if ( $sDClass == "set" ) {
				$sHtml = '<div class="set'.($isRequired?" required":"").'" id="'.$oField->KEY.'-wrapper">';
				$sHtml .= '<label>';
				if ( isset( $oField->INFO ) ) {
					$sHtml .= '<span>'.MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY ).'</span>';
					$sHtml .= $this->renderTooltip( $oField->INFO );
				} else {
					$sHtml .= MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY );
				}
				$sHtml .= '</label>';
				$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
				if ( $oDat != null && is_object($oDat) && !isset( $oDat->SET ) ) {
					$oDat->SET = $this->oMero->buildMset( $oRec, $oField->KEY );
					if ( $oDat->SET != null && isset( $oDat->SET->RECTYP ) ) {
						MeroveusClient::setMDataObj( $oRec, $oDat );
					}
				}
				$this->registerMeta( $oField->META );
				//$iFieldId = $this->registerField( $oField );
				$sHtml .= $this->renderSet( $oField, $oDat, $oField->META->registerId, $oRec, $oMeta->registerId );
			} else {
				$sHtml = '<div class="field'.($isRequired?" required":"").'">';
				$sHtml .= '<label>';			
				if ( isset( $oField->INFO ) ) {
					$sHtml .= '<span>'.MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY ).'</span>';
					$sHtml .= $this->renderTooltip( $oField->INFO );
				} else {
					$sHtml .= MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY );
				}
				$sHtml .= '</label>';
				if ( $oField->TYP == "Formula" ) {
					$sHtml .= '<p class="formula">Automatically calculated</p>';
				} else if ( $oField->TYP == "Label" ) {
					$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$sHtml .= $this->renderLabels( $oField, $oDat );
				} else if ( $oField->TYP == "Date" ) {
					$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$sHtml .= $this->renderDate( $oField, $oDat );
				} else if ( $sDClass == "range" ) {
					$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$from = isset( $oDat->FROM ) && is_numeric( $oDat->FROM ) ? $oDat->FROM : "";
					if ( $from != "" ) $from = self::formNumberFormat( $from );
					$to = isset( $oDat->TO ) && is_numeric( $oDat->TO ) ? $oDat->TO : "";
					if ( $to != "" ) $to = self::formNumberFormat( $to );
					$sHtml .= '<div class="range"><input id="'.$oField->KEY.'" type="text" name="'.$oField->KEY.'-from" value="'.$from.'" /> to <input type="text" name="'.$oField->KEY.'-to" value="'.$to.'" /></div>';
				/*} else if ( $sDClass == "time" ) {
					$sVal = MeroveusClient::GetMData( $oRec, $oField->KEY );
					$sHtml .= '<select data-theme="b" id="'.$oField->KEY.'" name="'.$oField->KEY.'">';
					//foreach ( array("AM","PM") as $a ) {
					for ( $i=0; $i<24; $i++ ) {
						$hr = $i;
						$a = "AM";
						if ( $hr >= 12 ) {
							if ( $hr > 12 ) $hr -= 12;
							$a = "PM";
						} else if ( $hr == 0 ) {
							$hr = 12;
						}
						for ( $m=0; $m<4; $m++ ) {
							$mn = ( $m==0?"00":($m*15) );
							$tm = $hr .":".$mn." ".$a;
							$tv = str_pad($i, 2, '0', STR_PAD_LEFT) .":".$mn.":00";
							$sHtml .= '<option value="'.$tv.'"'.($sVal==$tv?" selected":"").'>'.$tm.'</option>';
						}
					}
					//}
					$sHtml .= '</select>';
				*/
				} else {
					$val = MeroveusClient::GetMData( $oRec, $oField->KEY );
					if ( $val == null ) $val = "";
					if ( $sDClass == "blob" || $sDClass == "market" ) {
						$sHtml .= '<textarea id="'.$oField->KEY.'" name="'.$oField->KEY.'">'.$val.'</textarea>';
					} else if ( $sDClass == "yesno" ) {
						$sHtml .= '<select data-theme="b" data-inline="true" id="'.$oField->KEY.'" name="'.$oField->KEY.'">';
						$sHtml .= '<option value=""></option>';
						$sHtml .= '<option value="Y"'.($val=="Y"?" selected":"").'>Yes</option>';
						$sHtml .= '<option value="N"'.($val=="N"?" selected":"").'>No</option>';
						$sHtml .= '</select>';
					} else if ( isset( $oField->VALUELIST ) && is_array( $oField->VALUELIST ) ) {
						$aVList = $oField->VALUELIST;
						
						$aVal = explode( "; ", $val );
						$sInpTyp = ( isset( $oField->MSELECT ) && $oField->MSELECT == 1 ? "checkbox" : "radio" );
						if ( $sInpTyp == "radio" ) {
							$sHtml .= '<select data-theme="b" data-inline="true" id="'.$oField->KEY.'" name="'.$oField->KEY.'">';
							$sHtml .= '<option value=""></option>';
							foreach ( $aVList as $oItem ) {
								$sLabel = isset( $oItem->LABEL ) && strlen( $oItem->LABEL ) > 0 ? $oItem->LABEL : $oItem->VAL;
								$sHtml .= '<option value="'.htmlentities($sLabel).'"';
								if ( $sLabel == $val ) {
									$sHtml .= ' selected';
								}
								$sHtml .= '>'.$sLabel.'</option>';
							}
							$sHtml .= '</select>';
						} else {
							$sHtml .= '<ul class="valuelist" field-key="'.$oField->KEY.'">';
							foreach ( $aVList as $oItem ) {
								$sLabel = isset( $oItem->LABEL ) && strlen( $oItem->LABEL ) > 0 ? $oItem->LABEL : $oItem->VAL;
								if ( $this->isMobile ) {
									$sHtml .= '<li class="vlItem">';
									$sHtml .= '<label><input data-theme="b" name="'.$oField->KEY.'_checker" type="'.$sInpTyp.'" value="'.$oItem->VAL.'"';
									if ( in_array( $oItem->VAL, $aVal ) ) {
										$sHtml .= ' checked';
									}
									$sHtml .= ' />';
									$sHtml .= '<span>'.$sLabel.'</span></label>';
									$sHtml .= '</li>';

								} else {
									$sHtml .= '<li class="vlItem">';
									$sHtml .= '<input name="'.$oField->KEY.'_checker" type="'.$sInpTyp.'" value="'.$oItem->VAL.'"';
									if ( in_array( $oItem->VAL, $aVal ) ) {
										$sHtml .= ' checked';
									}
									$sHtml .= ' />';
									$sHtml .= '<label>'.$sLabel.'</label>';
									$sHtml .= '</li>';
								}
							}
							$sHtml .= '</ul>';
							$sHtml .= '<input type="hidden" id="'.$oField->KEY.'" name="'.$oField->KEY.'" />';
						}
					} else {
						if ( $oField->TYP=="Numeric" && is_numeric( $val ) && $sDClass != "year" ) {
							$val = self::formNumberFormat( $val );
						}
						$sHtml .= '<input id="'.$oField->KEY.'" class="'.( $oField->TYP=="Numeric" ? $this->getNumericClass($oField->KEY) : "") . '" type="text" name="'.$oField->KEY.'" value="'.htmlentities($val).'" />';
					}
				}
				
			}
			$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
			if ( isset( $oField->FORMAT ) ) {
				if ( isset( $oField->FORMAT->VERIFY ) ) {
					//$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$isChecked = ( $oDat != null && isset( $oDat->VERIFIED ) && $oDat->VERIFIED === true ? " checked" : "" );
					$sHtml .= '<p class="verification"><input type="checkbox" name="'.$oField->KEY.'-verify" value="1"'.$isChecked.' /> Verify that the above is correct</p>';
				}
				if ( isset( $oField->FORMAT->PRIVACY ) ) {
					//$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$isChecked = ( $oDat != null && isset( $oDat->PRIVATE ) && $oDat->PRIVATE === true ? " checked" : "" );
					$sHtml .= '<div class="privacyOptionWrapper"><input type="checkbox" name="'.$oField->KEY.'-privacy" value="1"'.$isChecked.' /> Preferred private';
					if ( $this->privacyText != null ) {
						$sHtml .= $this->renderTooltip( $this->privacyText );
					}
					$sHtml .= '</div>';
				}
			} else if ( isset($oDat->PRIVATE) && $oDat->PRIVATE === true ) {
				$sHtml .= '<input type="hidden" name="'.$oField->KEY.'-privacy" value="1" />';
			}
			if ( isset( $oDat->FOOTNOTE ) && is_object( $oDat->FOOTNOTE ) && isset( $oDat->FOOTNOTE->TEXT ) && strlen( $oDat->FOOTNOTE->TEXT ) > 0 ) {
				$sHtml .= '<input type="hidden" name="'.$oDat->KEY.'-footnote" value="'.htmlentities($oDat->FOOTNOTE->TEXT).'" />';
			}
			$sHtml .= '</div>';
		}
		return $sHtml;
	}
}

?>
