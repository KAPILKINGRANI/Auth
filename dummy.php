<?php
require_once("./app/init.php");

$queryBuilder = new QueryBuilder($connection, $config->APP_DEBUG);

// $userData = ['username' => 'pratik', 'email' => 'pp@gmail.com', 'password' => 'asd1234'];
// $queryBuilder->table('users')
//     ->insert($userData);

// dd($queryBuilder->table('users')
//     ->where('username', 'LIKE', 'P%')
//     ->update(['email' => 'example@smaple.com', 'password' => '2345']));

// dd($queryBuilder->table('users')
//     ->where('username', 'LIKE', 'P%')
//     ->get());

// dd($queryBuilder->table('users')
//     ->count());

// dd($queryBuilder->table('users')
//     ->select()
//     ->get());

// dd($queryBuilder->table('users')
//     ->where('username', 'LIKE', 'sahil')
//     ->delete());

// dd($queryBuilder->table('users')
//     ->limit(0, 2)
//     ->select()
//     ->get());
