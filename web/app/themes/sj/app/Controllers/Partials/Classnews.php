<?php

namespace App\Controllers\Partials;

trait Classnews
{
  public static function setClassNews()
  {
      if ( has_term('superbia-juridico', 'news-category') ) {
          $class = 'infinite-scroll-item sj';
      } else {
          $class = 'infinite-scroll-item';
      }
      return $class;
  }
}
