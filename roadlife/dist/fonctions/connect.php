<?php

function connect(){
	return $idc = pg_connect('host=localhost dbname = bd_camion user=postgres password=postgres');
}

?>