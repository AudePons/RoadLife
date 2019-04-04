// Rempli les champs automatiquement avec les données enregistrées dans la base de données pour faciliter la modification.
function remplir_liste(url, le_id)
{
  var cf_id = document.getElementById(le_id).value;

  var params = '?cf_id=' + encodeURIComponent(cf_id);

  var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
        }
    }
  
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4)
       {
          if(xhr.status  == 200) 
          {
            document.getElementById("part-form-2").innerHTML = xhr.responseText;
            var id = xhr_object.responseText; 
           document.getElementById('le_test').innerHTML = id;
          }
          else
          {
            document.getElementById("part-form-2").innerHTML =  xhr.status;
          }
        }
    }; 
 
   xhr.open("GET", url + params,  true); 
   xhr.send(null); 
}


function remplir_vehicule(url, le_id)
{
  var veh_id = document.getElementById(le_id).value;

  var params = '?veh_id=' + encodeURIComponent(veh_id);

  var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
        }
    }
  
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4)
       {
          if(xhr.status  == 200) 
          {
            document.getElementById("part-form-4").innerHTML = xhr.responseText;
            //var id = xhr_object.responseText; 
           //document.getElementById('le_test').innerHTML = id;
          }
          else
          {
            document.getElementById("part-form-4").innerHTML =  xhr.status;
          }
        }
    }; 
 
   xhr.open("GET", url + params,  true); 
   xhr.send(null); 
}


function remplir_unite(url, le_id)
{
  var uni_id = document.getElementById(le_id).value;

  var params = '?uni_id=' + encodeURIComponent(uni_id);

  var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
        }
    }
  
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4)
       {
          if(xhr.status  == 200) 
          {
            document.getElementById("part-form-5").innerHTML = xhr.responseText;
            //var id = xhr_object.responseText; 
           //document.getElementById('le_test').innerHTML = id;
          }
          else
          {
            document.getElementById("part-form-5").innerHTML =  xhr.status;
          }
        }
    }; 
 
   xhr.open("GET", url + params,  true); 
   xhr.send(null); 
}

function remplir_siteprod(url, le_id)
{
  var sp_id = document.getElementById(le_id).value;

  var params = '?sp_id=' + encodeURIComponent(sp_id);

  var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
        }
    }
  
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4)
       {
          if(xhr.status  == 200) 
          {
            document.getElementById("part-form-6").innerHTML = xhr.responseText;
            //var id = xhr_object.responseText; 
           //document.getElementById('le_test').innerHTML = id;
          }
          else
          {
            document.getElementById("part-form-6").innerHTML =  xhr.status;
          }
        }
    }; 
 
   xhr.open("GET", url + params,  true); 
   xhr.send(null); 
}

function update_info(url)
{

  var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
        }
    }
  
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4)
       {
          if(xhr.status  == 200) 
          {
            document.getElementById("up_info").innerHTML = xhr.responseText;
          }
          else
          {
            document.getElementById("up_info").innerHTML =  xhr.status;
          }
        }
    }; 
 
   xhr.open("GET", url ,  false); 
   xhr.send(null); 
}