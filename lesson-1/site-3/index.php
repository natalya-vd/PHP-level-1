<?php 
$title = "Главная страница - страница обо мне";
$header = "Информация обо мне";
$date = date ('Y');

$content = file_get_contents("template.html");
$strings_template = array("{{ title }}", "{{ header }}", "{{ date }}");
$variables_program = array($title, $header, $date);

$content = str_replace($strings_template, $variables_program, $content);

echo $content;