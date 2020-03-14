<?php

namespace App\Controllers\Partials;

trait Classnews
{
  public static function setClassNews()
  {
      if ( has_term('superbia-juridico', 'news-category') ) {
          $class = 'infinite-scroll-item sj my-3';
      } else {
          $class = 'infinite-scroll-item my-3';
      }
      return $class;
  }
}
