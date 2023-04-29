<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;

class ThemeHelper {

  const COOKIE_KEY = 'theme_selected';

  //Const com as listas de temas
  const THEME_COLORS = [
      'name' => 'default',
      'primary' => [
        'color' => '',
        'text' => 'text-lime-600 hover:text-lime-800',
        'link' => 'text-lime-600 hover:text-lime-800 hover:underline',
        'textNeutral' => 'text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-500',
        'button' => 'bg-lime-600 hover:bg-lime-700 text-white transition duration-300 ease-in-out',
      ],
      'background' => 'bg-slate-300 dark:bg-gray-900',
      'backgroundSecondary' => 'bg-slate-400 dark:bg-gray-900',
  ];

  const THEMES = [
    'light' => 'light',
    'dark' => 'dark'
];

  /**
   * Retorna o tema atual
   * @return object
   */
  public static function getTheme(): string
  {
    //verifica se existe o cookie
    if(Cookie::has(self::COOKIE_KEY) && in_array(Cookie::get(self::COOKIE_KEY), self::THEMES)){
      return Cookie::get(self::COOKIE_KEY);
    }

    return (string) self::setTheme('light');
  }

  /**
   * Define o tema atual na sessão, caso nao exista o tema, define o tema padrão.
   * @param string $theme
   * @return void
   */
  public static function setTheme(string $themeName){

    $theme = self::THEMES['light'];

    if(array_key_exists($themeName, self::THEMES)){
      $theme = self::THEMES[$themeName];
    }

    //salvar o cookie 
    Cookie::queue(self::COOKIE_KEY, $themeName, 1000);

    //retorna o tema
    return $theme;

  }

  /**
   * Retorna as cores do tema atual
   * @return object
   */
  public static function getThemeColors(): object
  {
    $colors = self::THEME_COLORS;

    return self::arrayToObject($colors);
  }

  /**
   * Converte um array em objeto
   * @param array $array
   * @return object
   */
  private static function arrayToObject(array $array){

    foreach($array as $key => $value){
      if(is_array($value)){
        $array[$key] = self::arrayToObject($value);
      }
    }

    return (object) $array;
  } 
}