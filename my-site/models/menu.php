<?php
/**
 * Данные для меню
 */
function getMenuList() 
{
  return [
    'menuList' => [
      [
        'link' => '/',
        'title' => 'Главная',
      ],
      [
        'link' => '/gallery',
        'title' => 'Галлерея',
      ],
      [
        'link' => '/catalog_ssr',
        'title' => 'Каталог SSR',
      ],
      [
        'link' => '/catalog_spa',
        'title' => 'Каталог SPA',
      ],
      [
        'link' => '/chat',
        'title' => 'Чат',
      ],
      [
        'link' => '/calculator',
        'title' => 'Калькулятор',
      ],
    ]
  ];
}