<?php

class GoogleMapsDecorator extends SiteTreeExtension {

	static $db = array(
		"Latitudes" => "Varchar",
		"Longitudes" => "Varchar",
		"Address" => "Varchar(600)",
		"MapType" => "Enum('roadmap, satellite, terrain, hybrid')",
		"MarkerSize" => "Enum('tiny, mid, small')",
		"MarkerLabel" => "Enum('A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z')",
		"ZoomLevel" => "Int" 
	);
	
	static $defaults = array(
		"ZoomLevel" => "13"
	);
	
	public function updateCMSFields(FieldList $fields){
		$fields->addFieldsToTab("Root.Maps", array(
			new TextField("Latitudes"),
			new TextField("Longitudes"),
			new TextField("Address"),
			new DropdownField("MapType", "Type", array(
				"roadmap" => "roadmap",
				"satellite" => "satellite",
				"terrain" => "terrain",
				"hybrid" => "hybrid"
			)),
			new DropdownField("ZoomLevel", "Zoom level", array(
				"1" => "1 (the lowest zoom level shows the whole world)",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
				"7" => "7",
				"8" => "8",
				"9" => "9",
				"10" => "10",
				"11" => "11",
				"12" => "12",
				"13" => "13",
				"14" => "14",
				"15" => "15",
				"16" => "16",
				"17" => "17",
				"18" => "18",
				"19" => "19",
				"20" => "20",
				"21" => "21 (the highest zoom level, zooms upto one building)"
			)),
			new LiteralField("Markers", "<h2>Marker settings</h2>"),
			new DropdownField("MarkerSize", "Marker size", array(
				"tiny" => "tiny", 
				"mid" => "mid", 
				"small" => "small"
			)),
			new DropdownField("MarkerLabel", "Marker label", array(
				"A" => "A", 
				"B" => "B", 
				"C" => "C",   
				"D" => "D", 
				"E" => "E", 
				"F" => "F",
				"G" => "G", 
				"H" => "H", 
				"I" => "I", 
				"J" => "J",
				"K" => "K", 
				"L" => "L", 
				"M" => "M",   
				"N" => "N", 
				"O" => "O", 
				"P" => "P",
				"Q" => "Q", 
				"R" => "R", 
				"S" => "S", 
				"T" => "T",
				"U" => "U",   
				"V" => "V", 
				"W" => "W", 
				"X" => "X",
				"Y" => "Y", 
				"Z" => "Z"
			)),
		));   
	}
	
	function MarkerColor(){
		//This shouldn't be here (but it is)
		switch( $this->owner->PageColour){
			case "blue":
				return "36bfdf";
			case "green":
				return "c0d34b";
			case "pink":
				return "db2353";
			case "orange":
				return "cd6632";
			case "purple":
				return "8174b0";
			default:
				return "fff";
		}
	}
	
	
	function MakeGoogleMap(){
		Requirements::javascript("http://maps.google.com/maps/api/js?sensor=true"); 
		$latitudes = $this->owner->Latitudes ? $this->owner->Latitudes : 0;
		$longitudes = $this->owner->Longitudes ? $this->owner->Longitudes : 0;
		$title = $this->owner->Title;
		$address = $this->owner->Address;
		$zoomLevel = $this->owner->ZoomLevel;
		$mapType = strtoupper($this->owner->MapType);
		$markerSize = $this->owner->MarkerSize;
		$markerColor = $this->owner->MarkerColor();
		$markerLabel = $this->owner->MarkerLabel;
		Requirements::customScript(<<<JS
			jQuery(document).ready(function(){ 
			
				function makeInfoWindowEvent(map, infowindow, contentString, marker) {
				  google.maps.event.addListener(marker, 'click', function() {
				    infowindow.setContent(contentString);
				    infowindow.open(map, marker);
				  });
				}
				var map, 
				infowindow = new google.maps.InfoWindow(),
				address = "$address";
				if(address != ""){
					geocoder = new google.maps.Geocoder();
					geocoder.geocode( { 'address': address}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) { 
							var mapOptions = {
							  zoom: {$zoomLevel},
							  center: results[0].geometry.location,
							  mapTypeId: google.maps.MapTypeId.{$mapType}
							};
							map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);  
							var marker = new google.maps.Marker({
								map: map, 
								position: results[0].geometry.location,
								icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld={$markerLabel}|{$markerColor}|333'
							});
							makeInfoWindowEvent(map, infowindow, "$address", marker);
						} else {
					  		alert("Geocode was not successful for the following reason: " + status);
						}
					}); 
				}else{ 
					var latlng = new google.maps.LatLng($latitudes, $longitudes);
					var mapOptions = {
					  zoom: {$zoomLevel},
					  center: latlng,
					  mapTypeId: google.maps.MapTypeId.{$mapType}
					};
					map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions); 
					var marker = new google.maps.Marker({
						map: map, 
						position: latlng
					});
					makeInfoWindowEvent(map, infowindow, "$title", marker);
				}
			}); 
JS
);
	}
}