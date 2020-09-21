<?php
try 
{
	new PDO("mysql:host=localhost:3307;dbname=catalogue_top_secret;port=82;charset=utf8mb4", "root", "abcd");
}
catch(Exception $e)
{
	echo "meow";
};
?>