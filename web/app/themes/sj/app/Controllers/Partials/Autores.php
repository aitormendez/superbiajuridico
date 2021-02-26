<?php

namespace App\Controllers\Partials;

trait Autores
{
    public function losAutores()
    {
        $autores = get_field('autores');

        if ($autores) {
            return array_map(function ($autor) {
                $ava = get_field('avatar', 'user_' . $autor['ID']);
                $output = [
                    'nombre' => $autor['display_name'],
                    'info' => get_field('info_adicional', 'user_' . $autor['ID']),
                    'pagina_autor' => get_author_posts_url($autor['ID'])
                ];
                if ($ava) {
                    $output['avatar_url'] = $ava['url'];
                }

                return $output;
            }, $autores);
        } else {
            $ava = get_field('avatar', 'user_' . get_the_author_meta('ID'));
            $output = [
                'nombre' => get_the_author(),
                'info' => get_field('info_adicional', 'user_' . get_the_author_meta('ID')),
                'pagina_autor' => get_author_posts_url(get_the_author_meta('ID'))
            ];
            if ($ava) {
                $output['avatar_url'] = $ava['url'];
            }
            return [
                $output
            ];
        }
    }
}
