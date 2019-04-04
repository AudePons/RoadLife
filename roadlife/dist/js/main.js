// PARTIE CARTE 


function onEachFeature(feature, layer) 
  { 
    var popupContent = "<p><p>"; 
    if (feature.properties && feature.properties.popupContent) 
    { 
      popupContent += feature.properties.popupContent; 
      }
    layer.bindPopup(popupContent); 

  } 

//code JQuery exécuté après chargement du DOM Html
$(document).ready(function()
{

$("#chauffeurs").click(function(){

  //création des icones sites prods
    var chauffeurIcon = L.icon({
      iconUrl: 'dist/image/icon_cf.png',
      iconSize: [38, 38],
      iconAnchor: [22, 94],
      popupAnchor: [-3, -76],
      });

    //charger le geojson
    $.getJSON("dist/action/geojson/getChauffeursJson.php", function(data){
      
      var mes_chauffeurs = L.geoJSON(data, {pointToLayer: function (feature, latlng) {
      return L.marker(latlng, {icon: chauffeurIcon});
    },

    onEachFeature: onEachFeature});

      var clusters = L.markerClusterGroup();
      clusters.addLayer(mes_chauffeurs);
      mymap.addLayer(clusters);
    })
  });

  $("#site_prod").click(function(){
    
    //création des icones sites prods
    var SpIcon = L.icon({
      iconUrl: 'dist/image/icon_sp.png',
      iconSize: [38, 38],
      iconAnchor: [22, 94],
      popupAnchor: [-3, -76],
      });
   
    //charger le geojson
    $.getJSON("dist/action/geojson/getSiteProdJson.php", function(data){
      //data= données contenues dans le fichier
      // ajouter le geojson a la carte
     
      var coorsLayer = L.geoJSON(data, {pointToLayer: function (feature, latlng) {
      return L.marker(latlng, {icon: SpIcon});
    },

    onEachFeature: onEachFeature}).addTo(mymap);
    });
  });




   $("#chauffeur_seul").click(function(){
    
    
    var url = "dist/action/geojson/getUnSeulChauffeurJson.php";
    
    //si un id parcours est sélectionné
    var cf_id = $("#zl_cf").val();
    if( cf_id !== 0){
      url ="dist/action/geojson/getUnSeulChauffeurJson.php?cf_id="+ cf_id;
    }

    //création des icones chauffeurs
    var CamionIcon = L.icon({
      iconUrl: 'dist/image/icon_veh.png',
      iconSize: [38, 38],
      iconAnchor: [22, 94],
      popupAnchor: [-3, -76],
      });

      $.getJSON(url, function(data){
      //data= données contenues dans le fichier
      // ajouter le geojson a la carte
      L.geoJSON(data, {pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {icon: CamionIcon});
    },onEachFeature: onEachFeature}).addTo(mymap);
      });
    });
 });


var drawnItems = L.featureGroup();
//popup sur marker

//Crrer la carte en y ajoutant les layers
var mymap = L.map('map', {
    center: [48.866667, 2.333333],
    zoom: 6,

});

// $.getJSON("dist/action/getChauffeursJson.php", function(data){
// 	L.geoJSON(data, {
// 		onEachFeature: function (feature, lay) {
// 	           lay.on('click', function () {
//         });                                 
// 	   }
// 	}).addTo(mymap);
// });

/*initmap()*/

//Ma liste des layers
var premiere = L.tileLayer('https://c.tile.openstreetmap.org/{z}/{x}/{y}.png', {  attribution: 'OSM'}).addTo(mymap);

//Marqueur posté sur Carcassonne
//var marker = L.marker([33.1667, -5.5667]).addTo(mymap);

function centerMap(lat, lng){
    var lat = parseFloat(lat);
    var lng = parseFloat(lng);
    //objet.methode(parametres) fonctionne avec flyTo & setView
    mymap.flyTo([lat,lng], 10)
  };







function addMarker(lat,lng, title){
    var marker = L.marker([lat,lng], {title:'Site de production'}).addTo(mymap);
    marker.openPopup();
  };

  






function masquer_div(id)
{
  if (document.getElementById(id).style.display == 'none')
  {
       document.getElementById(id).style.display = 'block';
  }
  else
  {
       document.getElementById(id).style.display = 'none';
  }
};


//PARTIE FONCTIONS

var httpRequest;

function recup_data()
{
  if (httpRequest.readyState == 4 
      && httpRequest.status == 200) 
  {
    //nom de la div
    resultat.innerHTML=httpRequest.responseText;
  } 
}
function synchro_lst()
{
  httpRequest = creer_httpr();
  var prg = "./dist/action/ajax/liste_chauffeurs.php";
  
  var num_sp = document.frm["zl_sp"].value
  var param="?num="+num_sp;
  // si un autre param�tre ajouter :
  // num2=document.frm["frm"].value;
  // param=param+"&num2="+num2;
  httpRequest.onreadystatechange = recup_data;
  httpRequest.open("GET", prg+param, true);
  httpRequest.send(null);
}

  


  function getJSON(){
      return("../dist/action/geojson/getChauffeursJson.php")
  } 

  function onEachFeature(feature, layer)
{
  var popupContent = "";
  if (feature.properties && feature.properties.cf_id) 
  { 
    popupContent = "Id chauffeur : " + feature.properties.cf_id; 
    popupContent += "<br /> Pseudo Trimble : " + feature.properties.cf_pseudo_trimble;
    popupContent += "<br /> Nom : " + feature.properties.cf_nom;
    popupContent += "<br /> Prenom : " + feature.properties.cf_prenom;
    popupContent += "<br /> Mail : " + feature.properties.cf_mail;
    popupContent += "<br /> Numéro de téléphone : " + feature.properties.cf_numtel;
    popupContent += "<br /> Id site de production : " + feature.properties.sp_id;
    popupContent += "<br /> En pause? : NON"; 
  }
  else if (feature.properties && feature.properties.sp_id) 
  { 
    popupContent = "Id site de production : " + feature.properties.sp_id; 
    popupContent += "<br /> Ville : " + feature.properties.sp_libelle;
  }

  layer.bindPopup(popupContent);
}