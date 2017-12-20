<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	function convertItem($arFields)
	{
		if(CModule::IncludeModule('iblock') && CModule::IncludeModule('catalog')) {
			$ELEMENT_ID = 0;
			$IBLOCK_ID = $arFields["IBLOCK_ID"];
			$CML2_PROP_CODE = "FEATURES";
			$ELEMENT_ID = $arFields["ID"];
			
				
					$PROPERTY_ID = $propFields["CODE"];
					$CML2_PROPS = $arFields["PROPERTIES"][$CML2_PROP_CODE];
					
					foreach($CML2_PROPS["VALUE"] as $valID => $arValue) {								
						$pID = CheckProperty($IBLOCK_ID,$arFields["PROPERTIES"][$CML2_PROP_CODE]["DESCRIPTION"][$valID]);
						if(IntVal($pID)>0) {
							CIBlockElement::SetPropertyValues($ELEMENT_ID,$IBLOCK_ID,$arValue,$pID);
							//\Bitrix\Iblock\PropertyIndex\Manager::updateElementIndex($IBLOCK_ID,$ELEMENT_ID);
						}
					}
					
				
			
		}
	}
	function CheckProperty($IBLOCK_ID,$PROPERTY_NAME) {
		$return = 0;
		
		// translit name
		$arTransParams = array("max_len"=>25,"change_case"=>"U");
		$PROPERTY_CODE = CUtil::translit($PROPERTY_NAME,"ru",$arTransParams);
		
		// check property
		$dbProperties = CIBlockProperty::GetList(array(),array("IBLOCK_ID"=>$IBLOCK_ID,"CODE"=>$PROPERTY_CODE));
		if(!$arFields = $dbProperties->GetNext()) {
			// add property
			$arFields = Array(
				"IBLOCK_ID" => $IBLOCK_ID,
				"NAME" => $PROPERTY_NAME,
				"ACTIVE" => "Y",
				"SORT" => "10",
				"CODE" => $PROPERTY_CODE,
				"PROPERTY_TYPE" => "S",
				"MULTIPLE" => "N",
			);
			
			$ibp = new CIBlockProperty;
			$PropID = $ibp->Add($arFields);
			if(IntVal($PropID))
				$return = $PropID;
		} else {
			$return = $arFields["ID"];
		}
		return $return;
	}
	
	
	if(CModule::IncludeModule('iblock') && CModule::IncludeModule('catalog')) {
		$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "IBLOCK_ID");
		$arFilter = Array("IBLOCK_ID"=>IntVal(4));
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>400), $arSelect);
		while($ob = $res->GetNextElement())
		{
		 $arFields = $ob->GetFields();
		 $arFields["PROPERTIES"] = $ob->GetProperties();
		 //convertItem($arFields);
		}
	}
	
	?>