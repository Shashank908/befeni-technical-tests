<?php
require "vendor/autoload.php";

use SyncMySql\SyncMySQL;
use SyncMySql\Connection\MySQLiConnection;
use SearchElastic\Search;
use ElasticSearchClient\Mapping;

$connection = new \PDO('mysql:host=localhost;dbname=test_DB;','root', '');
$sync = new Search();
$sync->setIndex("blog");
$sync->setType("user");
$sync->setSearchColumn("name");
echo print_r($sync->search("sssss"));

$connection = new PDO('mysql:host=localhost;dbname=test_DB;','root', '');

print_r($connection);