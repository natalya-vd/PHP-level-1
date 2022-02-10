<?php
function render($page, $params)
{
    return renderTemplate(MODULES_DIR . 'layout', [
        'title' => $params['title'],
        $params['feedback'] = renderTemplate(MODULES_DIR . 'feedback', $params),
        'content' => renderTemplate($page, $params),
        $params['menu'] = renderTemplate(MODULES_DIR . 'menu', ['menuList' => getMenuList()['menuList']]),
        'header' => renderTemplate(MODULES_DIR . 'header', $params),
        'footer' => renderTemplate(MODULES_DIR . 'footer', $params),
        
    ]);
}

function renderTemplate($page, $params = [])
{
    ob_start();

    extract($params);

    include TEMPLATES_DIR . $page . '.php';

    return ob_get_clean();
}