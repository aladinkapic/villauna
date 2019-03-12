<?php
require_once '../../../classes/db.php';

unset($_SESSION["company"]);
Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.Input::get('time'));