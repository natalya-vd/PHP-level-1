<?php
/**
 * @returns Возвращает каталог
 */

function getCatalog()
{
    return [
        'catalog' => [
            [
                'name' => 'Суши',
                'price' => 145,
                'image' => '/img/sushi.jpg'
            ],
            [
                'name' => 'Роллы',
                'price' => 478,
                'image' => '/img/rolls.jpg'
            ],
            [
                'name' => 'Чай',
                'price' => 45,
                'image' => '/img/tea.jpg'
            ],
            [
                'name' => 'Кофе',
                'price' => 63,
                'image' => '/img/coffee.jpg'
            ],
        ]
    ];
}