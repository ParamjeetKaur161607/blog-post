<?php
$config=require 'config.php';

return new QueryBuilder(
    Connection::make($config['database'])
);