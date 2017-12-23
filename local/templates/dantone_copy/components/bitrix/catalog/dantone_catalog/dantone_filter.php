<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "CATALOG_AVAILABLE");
$arFilter = Array("IBLOCK_ID" => 4, "IBLOCK_SECTION_ID" => $arParams["SECTION_ID"], "LID" => "s1", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

$ids = array();

while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $width = "Y";
    $price = "Y";
    $folding_mechanism = "Y";
	$appointment = "Y";
	$diameter = "Y";
	$height = "Y";
	if($diameter == "Y")
	{
		if($arProps["DIAMETER"]["VALUE"] != "")
		{
			$diameter = $arProps["DIAMETER"]["VALUE"];
			preg_match_all('!\d+!', $diameter, $diameter);
			$diameter = $diameter[0][0];
		}
		else
		{
			$diameter = "N";
		}
	}
	if($height == "Y")
	{
		if($arProps["VYSOTA"]["VALUE"] != "")
		{
			$height = $arProps["VYSOTA"]["VALUE"];
			preg_match_all('!\d+!', $height, $height);
			$height = $height[0][0];
		}
		else
		{
			$height = "N";
		}
	}
    if($width == "Y")
    {
        if($arProps["FEATURES"]["DESCRIPTION"][3] == "Ширина")
        {
            $width = $arProps["FEATURES"]["VALUE"][3];
        }
        else
        {
            foreach($arProps["FEATURES"]["DESCRIPTION"] as $k => $v)
            {
                if($v == "Ширина")
                {
                    $width = $arProps["FEATURES"]["VALUE"][$k];
                    break;
                }
            }
        }
        preg_match_all('!\d+!', $width, $width);
		$width = $width[0][0];
    }
    if($price == "Y")
    {
        $min_price = $arProps["MINIMUM_PRICE"]["VALUE"];
        $max_price = $arProps["MAXIMUM_PRICE"]["VALUE"];
    }
    if($folding_mechanism = "Y")
    {
        if($arProps["FOLDING_MECHANISM"]["VALUE"] == "Y")
        {
            $folding_mechanism = "YES";
        }
        else
        {
            $folding_mechanism = "NO";
        }
    }
	if($appointment == "Y")
	{
		$appointment = array();
		foreach($arProps["APPOINTMENT"]["VALUE"] as $kk => $vv)
		{
			$appointment[] = $vv;
		}
	}
	// check with request data
	$filter = array();
	$price = false;

	foreach($_REQUEST["filter"] as $k => $v)
	{
		if($v == "Y")
		{
			switch($k)
			{
				case "available": $filter[$k] = ($arProps["INSTOCK"]["VALUE"] == "Y") ? true : false; break;
				case "available_30_days": $filter[$k] = ($arProps["available_30_days"]["VALUE"] == "Y") ? true : false; break;
				case "height_20_80": $filter[$k] = ($height > 20 && $height < 80) ? true : false; break;
				case "height_60_70": $filter[$k] = ($height > 60 && $height < 70) ? true : false; break;
				case "height_70_80": $filter[$k] = ($height > 70 && $height < 80) ? true : false; break;
				case "height_70_100": $filter[$k] = ($height > 70 && $height < 100) ? true : false; break;
				case "height_80_90": $filter[$k] = ($height > 80 && $height < 90) ? true : false; break;
				case "height_80_120": $filter[$k] = ($height > 80 && $height < 120) ? true : false; break;
				case "height_100_150": $filter[$k] = ($height > 100 && $height < 150) ? true : false; break;
				case "height_120_150": $filter[$k] = ($height > 120 && $height < 150) ? true : false; break;
				case "height_150_170": $filter[$k] = ($height > 150 && $height < 170) ? true : false; break;
				case "diameter_10_40": $filter[$k] = ($diameter > 10 && $diameter < 40) ? true : false; break;
				case "diameter_40_80": $filter[$k] = ($diameter > 40 && $diameter < 80) ? true : false; break;
				case "diameter_80_90": $filter[$k] = ($diameter > 80 && $diameter < 990) ? true : false; break;
				case "size_40_60": $filter[$k] = ($width > 40 && $width < 60) ? true : false; break;
				case "size_60_80": $filter[$k] = ($width > 60 && $width < 80) ? true : false; break;
				case "size_80_110": $filter[$k] = ($width > 80 && $width < 110) ? true : false; break;
				case "size_90_120": $filter[$k] = ($width > 90 && $width < 120) ? true : false; break;
				case "size_140_160": $filter[$k] = ($width > 140 && $width < 160) ? true : false; break;
				case "size_160_200": $filter[$k] = ($width > 160 && $width < 200) ? true : false; break;
				case "size_160_220": $filter[$k] = ($width > 160 && $width < 220) ? true : false; break;
				case "size_180_200": $filter[$k] = ($width > 180 && $width < 200) ? true : false; break;
				case "size_220_280": $filter[$k] = ($width > 220 && $width < 280) ? true : false; break;
				case "size_280_320": $filter[$k] = ($width > 280 && $width < 320) ? true : false; break;
				case "price_under_20":
				case "price_under_30":
				case "price_under_75":
				case "price_under_80":
				case "price_under_100":
				case "price_20_40": 
				case "price_30_50": 
				case "price_75_125": 
				case "price_80_100": 
				case "price_100_150": 
				case "price_over_40": 
				case "price_over_50": 
				case "price_over_100": 
				case "price_over_125": 
				case "price_over_150": 
				case "price_under_80":
				case "price_80_100":
				case "price_over_100": $price = true; break;
				case "sofa_folding_mechanism_yes": $filter[$k] = ($folding_mechanism == "YES") ? true : false; break;
				case "sofa_folding_mechanism_no": $filter[$k] = ($folding_mechanism == "NO") ? true : false; break;
				case "width_40_100": $filter[$k] = ($width > 40 && $width < 100) ? true : false; break;
				case "width_100_200": $filter[$k] = ($width > 100 && $width < 200) ? true : false; break;
				case "width_200_300": $filter[$k] = ($width > 200 && $width < 300) ? true : false; break;
				case "table_folding_mechanism": $filter[$k] = ($folding_mechanism == "YES") ? true : false; break;
				case "app_console": 
					$filter[$k] = false;
					foreach($appointment as $kk => $vv)
						if($vv == "Консоль")
						{
							$filter[$k] = true;
							continue;
						}
				break;
				case "app_dinner": 
					$filter[$k] = false;
					foreach($appointment as $kk => $vv)
						if($vv == "Обеденный")
						{
							$filter[$k] = true;
							continue;
						}
				break;
				case "app_writing": 
					$filter[$k] = false;
					foreach($appointment as $kk => $vv)
						if($vv == "Письменный")
						{
							$filter[$k] = true;
							continue;
						}
				break;
				case "app_magazine": 
					$filter[$k] = false;
					foreach($appointment as $kk => $vv)
						if($vv == "Журнальный/Приставной")
						{
							$filter[$k] = true;
							continue;
						}
				break;
			}
		}
	}
	$result_flag = false;
	// check price
	if($price)
	{
		if(
		   ($_REQUEST["filter"]["price_under_20"] == "Y" && $max_price < 20000) ||
		   ($_REQUEST["filter"]["price_under_30"] == "Y" && $max_price < 30000) ||
		   ($_REQUEST["filter"]["price_under_75"] == "Y" && $max_price < 75000) ||
		   ($_REQUEST["filter"]["price_under_80"] == "Y" && $max_price < 80000) ||
		   ($_REQUEST["filter"]["price_under_100"] == "Y" && $max_price < 100000) ||
		   ($_REQUEST["filter"]["price_20_40"] == "Y" && ($min_price > 20000 && $max_price < 40000)) ||
		   ($_REQUEST["filter"]["price_30_50"] == "Y" && ($min_price > 30000 && $max_price < 50000)) ||
		   ($_REQUEST["filter"]["price_80_100"] == "Y" && ($min_price > 80000 && $max_price < 100000)) ||
		   ($_REQUEST["filter"]["price_75_125"] == "Y" && ($min_price > 75000 && $max_price < 125000)) ||
		   ($_REQUEST["filter"]["price_100_150"] == "Y" && ($min_price > 100000 && $max_price < 150000)) ||
		   ($_REQUEST["filter"]["price_over_40"] == "Y" && $min_price > 40000) ||
		   ($_REQUEST["filter"]["price_over_50"] == "Y" && $min_price > 50000) ||
		   ($_REQUEST["filter"]["price_over_100"] == "Y" && $min_price > 100000) ||
		   ($_REQUEST["filter"]["price_over_125"] == "Y" && $min_price > 125000) ||
		   ($_REQUEST["filter"]["price_over_150"] == "Y" && $min_price > 15000) ||
		   ($_REQUEST["filter"]["price_under_80"] == "Y" && $max_price < 80000) ||
		   ($_REQUEST["filter"]["price_80_100"] == "Y" && ($min_price > 80000 && $max_price < 100000)) ||
		   ($_REQUEST["filter"]["price_over_100"] == "Y" && $min_price > 100000)
		)
		{
			$result_flag = true;
		}
	}
	else
		$result_flag = true;

	// проверка на раскладной механизм столов
	if($result_flag && $_REQUEST["filter"]["table_folding_mechanism"] == "Y")
	{
		if($folding_mechanism == "YES")
			$result_flag = true;
		else
			$result_flag = false;
		unset($filter["table_folding_mechanism"]);
	}

	// проверка на раскладной механизм
	if($result_flag && $_REQUEST["filter"]["sofa_folding_mechanism_yes"] == "Y")
	{
		if($folding_mechanism == "YES")
			$result_flag = true;
		else
			$result_flag = false;
		unset($filter["sofa_folding_mechanism_yes"]);
	}

	// проверка на наличие
	if($result_flag && $_REQUEST["filter"]["available"] == "Y")
	{
		if($filter["available"] == true)
			$result_flag = true;
		else
			$result_flag = false;
	}

	// проверка на наличие в 30 дней
	if($result_flag && $_REQUEST["filter"]["available_30_days"] == "Y")
	{
		if($filter["available_30_days"] == true)
			$result_flag = true;
		else
			$result_flag = false;
	}

	if($result_flag && $_REQUEST["filter"]["app_console"] == "Y")
	{
		if($filter["app_console"])
			$result_flag = true;
		else
			$result_flag = false;
		unset($filter["app_console"]);
	}

	if($result_flag && $_REQUEST["filter"]["app_dinner"] == "Y")
	{
		if($filter["app_dinner"])
			$result_flag = true;
		else
			$result_flag = false;
		unset($filter["app_dinner"]);
	}

	if($result_flag && $_REQUEST["filter"]["app_writing"] == "Y")
	{
		if($filter["app_writing"])
			$result_flag = true;
		else
			$result_flag = false;
		unset($filter["app_writing"]);
	}

	if($result_flag && $_REQUEST["filter"]["app_magazine"] == "Y")
	{
		if($filter["app_magazine"])
			$result_flag = true;
		else
			$result_flag = false;
		unset($filter["app_magazine"]);
	}

	if($result_flag)
	{
		foreach($filter as $k => $v)
		{
			if($v == true && !in_array($k, array("price_under_20", "price_under_30", "price_under_75", "price_under_100", "price_20_40", "price_30_50", "price_75_125", "price_100_150", "price_over_40", "price_over_50", "price_over_125", "price_over_150")))
			{
				$result_flag = true;
				break;
			}
			else{
				$result_flag = false;
			}
		}
	}

	if($result_flag) $ids[] = $arFields["ID"];
}

if(count($ids) == 0 && count($filter) > 0) 
	$_SESSION["filter"]["ids"] = -1;
else
	$_SESSION["filter"]["ids"] = $ids;
?>