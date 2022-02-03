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
                'image' => IMG_DIR . 'sushi.jpg'
            ],
            [
                'name' => 'Роллы',
                'price' => 478,
                'image' => IMG_DIR . 'rolls.jpg'
            ],
            [
                'name' => 'Чай',
                'price' => 45,
                'image' => IMG_DIR . 'tea.jpg'
            ],
            [
                'name' => 'Кофе',
                'price' => 63,
                'image' => IMG_DIR . 'coffee.jpg'
            ],
        ]
    ];
}