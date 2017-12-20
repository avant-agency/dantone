<?
	
	if(file_exists("products.xml")) {
		$xml = simplexml_load_file("products.xml");
	}
	
	

	
	foreach($xml->shop->offers->offer as $offer) {
		
		$url = $offer->url;
		$url = str_replace(" ", "%20", $url);
		$url = str_replace("(", "%28", $url);
		$url = str_replace(")", "%29", $url);
		$offer->url = $url;
		
		
		
		
	}
	
	
	file_put_contents("products_rep.xml",$xml->asXML());
	
	
	
	
	?>