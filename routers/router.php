<?php
if ($menu == "dashboard") {
    include "dasboard.php";
} else if ($menu == "table") {
    include "table_content.php";
} else if ($menu == "hello") {
    include "page/hello/hello.php";
} else {
    include "404.php";
}
  














// $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $params = explode('/', $request);
// $test = $params[2];

// if($test == "login"){
//     require "auth/login.php";
// }else if($test == "register"){
//     require "auth/register.php";

// }else if($test == "dasboard"){
//     require "pages/index.route.php";
// }else if ($test == "table"){
//     require "pages/index.route.php";
// }else if($test == "blog"){
//     require "pages/blog/index.php";
// }else if($test == "create-blog"){
//     require "pages/blog/create_blog.php";

// }else{
//     require "pages/404.php";
// }