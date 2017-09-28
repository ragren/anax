<?php
$navbar = [
    "config" => [
        "navbar-class" => "myNav water",

    ],
    "items" => [
        "home" => [
            "text" => "Hem",
            "route" => "",
        ],
        "about" => [
            "text" => "Om",
            "route" => "about",
        ],
        "report" => [
            "text" => "kmom",
            "route" => "report",
        ],
        "remserver" => [
            "text" => "REM",
            "route" => "remserver",
        ],
        "comments" => [
            "text" => "Inlägg",
            "route" => "comments",
        ],
    ]
];
$html = "<div id='nav'> <ul>";
?>
<div class ="<?php echo $navbar["config"]["navbar-class"];?>">
    <?php
    $request_path = $_SERVER['REQUEST_URI'];
    $path = explode("/", $request_path);
    foreach ($navbar["items"] as $key => $value) {
        $url[$key] = $app->url->create($value["route"]);
        $class = " class='nonCurrent'";
        if (end($path) == $value["route"]) {
            $class = " class='current'";
        }
        $html .= "<li><a href=" . $url[$key] . $class . ">" . $value["text"] . "</a></li>";
    }
    $html .= "</ul></div>";
    ?>
<?=$html?>
</div>
