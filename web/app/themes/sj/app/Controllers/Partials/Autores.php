<?php

namespace App\Controllers\Partials;

trait Autores
{
    public function losAutores()
    {
        $autores = get_field('autores');

        if ($autores) {
            return array_map(function ($autor) {
                return [
                    'nombre' => $autor['display_name'],
                    'info' => get_field('info_adicional', 'user_' . $autor['ID']),
                    'avatar_url' => get_field('avatar', 'user_' . $autor['ID'])['url'],
                    'pagina_autor' => get_author_posts_url($autor['ID'])
                ];
            }, $autores);
        } else {
            return [
                [
                    'nombre' => get_the_author(),
                    'info' => get_field('info_adicional', 'user_' . get_the_author_meta('ID')),
                    'avatar_url' => get_field('avatar', 'user_' . get_the_author_meta('ID'))['url'],
                    'pagina_autor' => get_author_posts_url(get_the_author_meta('ID'))
                ]
            ];
        }


    }
}
