<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2015 Teclib'.

 http://glpi-project.org

 based on GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2014 by the INDEPNET Development Team.
 
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

/** @file
* @brief 
*/


if (!($dropdown instanceof CommonDropdown)) {
   Html::displayErrorAndDie('');
}
if (!$dropdown->canView()) {
   // Gestion timeout session
   Session::redirectIfNotLoggedIn();
   Html::displayRightError();
}

$dropdown->displayHeader();

$dropdown->title();

Search::show(get_class($dropdown));

if($dropdown instanceof ITILCategory) {
	echo "<center><a class=\"vsubmit\" href=\"/front/itilcategory.form.php\" style=\"margin-top:10px;\">Ajoutez une catégorie</a></center>";
}
else if($dropdown instanceof Location) {
	echo "<center><a class=\"vsubmit\" href=\"/front/location.form.php\" style=\"margin-top:10px;\">Ajoutez un partenaire</a></center>";
}
else if($dropdown instanceof Calendar) {
	echo "<center><a class=\"vsubmit\" href=\"/front/calendar.form.php\" style=\"margin-top:10px;\">Ajoutez un calendrier</a></center>";
}
Html::footer();
?>