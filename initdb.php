<?php

// sql init directories
$directory1 = __DIR__ . '/db/schema/';
$directory2 = __DIR__ . '/db/initial_data/';

// sqlite directory
$dbFile = __DIR__ . '/db/db_local.sqlite';

// try open database
$db = new SQLite3($dbFile);

// check conection
if (!$db) {
    die('Error al conectar con la base de datos.');
}

//execute SQL file 
function executeSqlFile($db, $filePath) 
{
    $sql = file_get_contents($filePath);
    $result = $db->exec($sql);
    if (!$result) {
        die('Error al ejecutar el script SQL (' . $filePath . '): ' . $db->lastErrorMsg());
    }
    echo 'Script SQL (' . $filePath . ') ejecutado exitosamente.' . PHP_EOL;
}

//get number (n) in file (*_n.sql)to sort file to execute
function getNumberFromFilename($filename) 
{
    preg_match('/_(\d+)\.sql/', $filename, $matches);
    return isset($matches[1]) ? (int)$matches[1] : null;
}

//execute SQL file in directory
function executeSqlFilesInDirectory($db, $directory) 
{
    $sqlFiles = glob($directory . '*.sql');
    usort($sqlFiles, function ($a, $b) {
        return getNumberFromFilename($a) <=> getNumberFromFilename($b);
    });
    foreach ($sqlFiles as $sqlFile) {
        executeSqlFile($db, $sqlFile);
    }
}

// Execute SQL files in both directories in order
executeSqlFilesInDirectory($db, $directory1);
executeSqlFilesInDirectory($db, $directory2);

$db->close();
echo 'Todos los scripts SQL ejecutados exitosamente en orden.' . PHP_EOL;
