<?php
/**
 * Данные для меню
 */
function getMenuList($count) 
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
      // [
      //   'link' => '/catalog_spa',
      //   'title' => 'Каталог SPA',
      // ],
      // [
      //   'link' => '/chat',
      //   'title' => 'Чат',
      // ],
      // [
      //   'link' => '/calculator',
      //   'title' => 'Калькулятор',
      // ],
      [
        'link' => '/login',
        'title' => 'Авторизация'
      ],
      [
        'link' => '/basket',
        'title' => 'Корзина',
        'count' => "$count[count]"
      ]
    ]
  ];
}