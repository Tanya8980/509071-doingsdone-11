<?php
// показывать или нет выполненные задачи
//$show_complete_tasks = rand(0, 1);//
$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'category' => 'Работа',
        'status' => false
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'category' => 'Работа',
        'status' => false
    ],
    [
        'name' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'category' => 'Учеба',
        'status' => true
    ],
    [
        'name' => 'Встреча с другом',
        'date' => '22.12.2019',
        'category' => 'Входящие',
        'status' => false
    ],
    [
        'name' => 'Купить корм для кота',
        'date' => null,
        'category' => 'Домашние дела',
        'status' => false
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => null,
        'category' => 'Домашние дела',
        'status' => false
    ],
];
function getTaskCount(array $tasks, $category)
{
    $count = 0;
    foreach ($tasks as $task) {
        if ($category == $task['category']) {
            $count++;
        }
    }
    return $count;
}
function include_template($name, $data)
{
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}
$page_content = include_template(
    'main.php',
    [
        'projects' =>$projects,
        'tasks' => $tasks
    ]
);
$layout_content = include_template(
    'layout.php',
    [
        'content' => $page_content,
        'user_name' => 'Константин',
        'title' => 'Дела в порядке'
    ]
    );
echo ($layout_content);
?>
