<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$menuitem = new FieldsBuilder('menuitem');

$menuitem
    ->setLocation('nav_menu_item', '==', 'location/primary_navigation')
        ->or('nav_menu_item', '==', 'location/primary_navigation_qj');

$menuitem
    ->addText('menu_icon', [
        'label' => 'Icono Fontawesome',
        'instructions' => 'Introducir la clase CSS correspondiente al icono que se desea usar',
    ]);

return $menuitem;
