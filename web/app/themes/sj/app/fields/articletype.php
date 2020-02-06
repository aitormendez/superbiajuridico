<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$menuitem = new FieldsBuilder('articletype');

$menuitem
    ->setLocation('taxonomy', '==', 'article-type');

$menuitem
    ->addText('article_type_term_plural', [
        'label' => 'Plural',
    ]);

return $menuitem;
