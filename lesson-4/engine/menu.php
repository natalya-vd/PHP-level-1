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
        'link' => '/?page=gallery',
        'title' => 'Галлерея',
      ],
      [
        'link' => '/?page=catalog_ssr',
        'title' => 'Каталог SSR',
      ],
      [
        'link' => '/?page=catalog_spa',
        'title' => 'Каталог SPA',
      ],
      [
        'link' => '/?page=chat',
        'title' => 'Чат',
      ],
    ]
    ];
}