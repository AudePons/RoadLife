var map;
var ajaxRequest;
var plotlist;
var plotlayers=[];

function initmap() {
	// set up AJAX request
	ajaxRequest=GetXmlHttpObject();
	if (ajaxRequest==null) {
	  alert ("This browser does not support HTTP Request");
	  return;
	};

    // set up the map
    map = new L.Map('map');

    // create the tile layer with correct attribution
    var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
    var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 12, attribution: osmAttrib});

    function GetXmlHttpObject() {
	  if (window.XMLHttpRequest) { return new XMLHttpRequest(); }
	  if (window.ActiveXObject)  { return new ActiveXObject("Microsoft.XMLHTTP"); }
	  return null;
	};

	
    function askForPlots() {
        // request the marker info with AJAX for the current bounds
        var bounds=map.getBounds();
        var minll=bounds.getSouthWest();
        var maxll=bounds.getNorthEast();
        var msg='../js/main.js?minlng='+minll.lng+'&minlat='+minll.lat+'&maxlng='+maxll.lng+'&maxlat='+maxll.lat;
        ajaxRequest.onreadystatechange = stateChanged;
        ajaxRequest.open('GET', msg, true);
        ajaxRequest.send(null);
    
	}

	//fonctions qui effacent les anciens marqueurs et qui affiche les nouveaux 

	function stateChanged() {
    // if AJAX returned a list of markers, add them to the map
    if (ajaxRequest.readyState==4) {
        //use the info here that was returned
        if (ajaxRequest.status==200) {
            plotlist=eval("(" + ajaxRequest.responseText + ")");
            removeMarkers();
            for (i=0;i<plotlist.length;i++) {
                var plotll = new L.LatLng(plotlist[i].lat,plotlist[i].lon, true);
                var plotmark = new L.Marker(plotll);
                plotmark.data=plotlist[i];
                map.addLayer(plotmark);
                plotmark.bindPopup("<h3>"+plotlist[i].name+"</h3>"+plotlist[i].details);
                plotlayers.push(plotmark);
            }
        }
    }
	};

	function removeMarkers() {
	    for (i=0;i<plotlayers.length;i++) {
	        map.removeLayer(plotlayers[i]);
	    }
	    plotlayers=[];
	};

	function onMapMove(e) { askForPlots(); };

    // start the map in South-East England
    map.setView(new L.LatLng(33.1667, -5.5667),10);
    map.addLayer(osm);
    askForPlots();
    map.on('moveend', onMapMove);
}