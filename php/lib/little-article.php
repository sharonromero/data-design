<?php

namespace sharonromero\DataDesign;

require_once("../Classes/Article.php");

$Article = new Article("3c4476f1-8c2c-46b1-a213-188a7e75fdf1", "f8135d53-a85e-4a3e-a6f7-41bbe5cf3b61", "newArticleContent", "newArticleBirdImage");
var_dump($Article);

