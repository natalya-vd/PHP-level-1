<?php
/**
 * Рендер страниц
 */
function render($page, $params)
{
    return renderTemplate(MODULES_DIR . 'layout', [
        'title' => $params['title'],
        'content' => renderTemplate($page, $params),
        'header' => renderTemplate(MODULES_DIR . 'header', $params),
        'footer' => renderTemplate(MODULES_DIR . 'footer', $params),
    ]);
}

/**
 * Движок
 */
function renderTemplate($page, $params = [])
{
    ob_start();

    extract($params);

    include TEMPLATES_DIR . $page . '.php';

    return ob_get_clean();
}