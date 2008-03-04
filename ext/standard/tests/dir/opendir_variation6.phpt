--TEST--
Test opendir() function : usage variations - Different wildcards
--FILE--
<?php
/* Prototype  : mixed opendir(string $path[, resource $context])
 * Description: Open a directory and return a dir_handle 
 * Source code: ext/standard/dir.c
 */

/*
 * Pass paths containing wildcards to test if opendir() recognises them
 */

echo "*** Testing opendir() : usage variations ***\n";
// create the temporary directories
$file_path = dirname(__FILE__);
$dir_path = $file_path . "/opendir_variation6";
$sub_dir_path = $dir_path . "/sub_dir1";

mkdir($dir_path);
mkdir($sub_dir_path);

// with different wildcard characters

echo "\n-- Wildcard = '*' --\n"; 
var_dump( opendir($file_path . "/opendir_var*") );
var_dump( opendir($file_path . "/*") );

echo "\n-- Wildcard = '?' --\n";
var_dump( opendir($dir_path . "/sub_dir?") );
var_dump( opendir($dir_path . "/sub?dir1") );

?>
===DONE===
--CLEAN--
<?php
$dir_path = dirname(__FILE__) . "/opendir_variation6";
$sub_dir_path = $dir_path . "/sub_dir1";

rmdir($sub_dir_path);
rmdir($dir_path);
?>
--EXPECTF--
*** Testing opendir() : usage variations ***

-- Wildcard = '*' --

Warning: opendir(%s/opendir_var*): failed to open dir: No such file or directory in %s on line %d
bool(false)

Warning: opendir(%s/*): failed to open dir: No such file or directory in %s on line %d
bool(false)

-- Wildcard = '?' --

Warning: opendir(%s/opendir_variation6/sub_dir?): failed to open dir: No such file or directory in %s on line %d
bool(false)

Warning: opendir(%s/opendir_variation6/sub?dir1): failed to open dir: No such file or directory in %s on line %d
bool(false)
===DONE===
--UEXPECTF--
*** Testing opendir() : usage variations ***

-- Wildcard = '*' --

Warning: opendir(%s/opendir_var*): failed to open dir: No such file or directory in %s on line %d
bool(false)

Warning: opendir(%s/*): failed to open dir: No such file or directory in %s on line %d
bool(false)

-- Wildcard = '?' --

Warning: opendir(%s/opendir_variation6/sub_dir?): failed to open dir: No such file or directory in %s on line %d
bool(false)

Warning: opendir(%s/opendir_variation6/sub?dir1): failed to open dir: No such file or directory in %s on line %d
bool(false)
===DONE===
