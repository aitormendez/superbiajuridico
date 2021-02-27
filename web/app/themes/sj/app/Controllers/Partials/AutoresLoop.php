<?php

namespace App\Controllers\Partials;

trait AutoresLoop {
  public static function losAutoresLoop()
    {
        $autores = get_field('autores');

        if ($autores) {

            $output = array_map(function ($autor) {

                $ava = get_field('avatar', 'user_' . $autor['ID']);

                $out = [
                    'nombre' => $autor['display_name'],
                    'info' => get_field('info_adicional', 'user_' . $autor['ID']),
                    'pagina_autor' => get_author_posts_url($autor['ID'])
                ];

                if ($ava) {
                    $out['avatar_url'] = $ava['url'];
                }

                return $out;

            }, $autores);

            return $output;

        } else {
            $ava = get_field('avatar', 'user_' . get_the_author_meta('ID'));
            $out = [
                'nombre' => get_the_author(),
                'info' => get_field('info_adicional', 'user_' . get_the_author_meta('ID')),
                'pagina_autor' => get_author_posts_url(get_the_author_meta('ID'))
            ];

            if ($ava) {
                $ava_url = $ava['url'];
                $out['avatar_url'] = $ava;
            }

            return [$out];
        }
    }
}
