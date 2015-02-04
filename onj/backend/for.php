<?php

$conn_error = "Unable to connect.";

$mysql_host = "localhost";
$mysql_user = "sidgupta";
$mysql_password = "teamonjpassword";
$db = "btronj";

if (!@mysql_connect($mysql_host,$mysql_user,$mysql_password) || !@mysql_select_db($db))
	die("Could not connect"); 
/*
for ($i = 51; $i < 54; $i ++)
{
	mysql_query("INSERT INTO `online judge`.`problems` (`id`, `problem_id`, `problem_name`, `contest_id`, `contest_name`, `problem_statement`, `short_desc`, `input_desc`, `output_desc`, `constraints`, `sample_input`, `sample_output`, `total_submissions`, `accepted_submissions`, `time_limit`, `memory_limit`, `difficulty`, `author`) VALUES (NULL, 'COMPNPARSE54".$i."', 'Compilers and Parsers', 'MAYLONG14', 'May Long Challenge', 'Lira is now very keen on compiler development. :) She knows that one of the most important components of a compiler, is its parser. A parser is, in simple terms, a software component that processes text, and checks it''s semantic correctness, or, if you prefer, if the text is properly built. As an example, in declaring and initializing an integer, in C/C++, you can''t do something like: int = x ;4 as the semantics of such statement is incorrect, as we all know that the datatype must precede an identifier and only afterwards should come the equal sign and the initialization value, so, the corrected statement should be: int x = 4; Given some expressions which represent some instructions to be analyzed by Lira''s compiler, you should tell the length of the longest prefix of each of these expressions that is valid, or 0 if there''s no such a prefix.', 'Given some expressions which represent some instructions to be analyzed by Lira''s compiler, you should tell the length of the longest prefix of each of these expressions that is valid, or 0 if there''s no such a prefix.', 'Input will consist of an integer T denoting the number of test cases to follow.
Then, T strings follow, each on a single line, representing a possible expression in L++.', 'For each expression you should output the length of the longest prefix that is valid or 0 if there''s no such a prefix.', '1 <= T <= 500
1 <= The length of a single expression <= 106
The total size all the input expressions is no more than 5*106', '3', '4', '107', '63', '3', '5', '1', 'Triveni Mahatha')");
}


for ($i = 61; $i < 64; $i ++)
{
	mysql_query("INSERT INTO `online judge`.`problems` (`id`, `problem_id`, `problem_name`, `contest_id`, `contest_name`, `problem_statement`, `short_desc`, `input_desc`, `output_desc`, `constraints`, `sample_input`, `sample_output`, `total_submissions`, `accepted_submissions`, `time_limit`, `memory_limit`, `difficulty`, `author`) VALUES (NULL, 'COMPNPARSE54".$i."', 'Compilers and Parsers', 'MAYLONG14', 'May Long Challenge', 'Lira is now very keen on compiler development. :) She knows that one of the most important components of a compiler, is its parser. A parser is, in simple terms, a software component that processes text, and checks it''s semantic correctness, or, if you prefer, if the text is properly built. As an example, in declaring and initializing an integer, in C/C++, you can''t do something like: int = x ;4 as the semantics of such statement is incorrect, as we all know that the datatype must precede an identifier and only afterwards should come the equal sign and the initialization value, so, the corrected statement should be: int x = 4; Given some expressions which represent some instructions to be analyzed by Lira''s compiler, you should tell the length of the longest prefix of each of these expressions that is valid, or 0 if there''s no such a prefix.', 'Given some expressions which represent some instructions to be analyzed by Lira''s compiler, you should tell the length of the longest prefix of each of these expressions that is valid, or 0 if there''s no such a prefix.', 'Input will consist of an integer T denoting the number of test cases to follow.
Then, T strings follow, each on a single line, representing a possible expression in L++.', 'For each expression you should output the length of the longest prefix that is valid or 0 if there''s no such a prefix.', '1 <= T <= 500
1 <= The length of a single expression <= 106
The total size all the input expressions is no more than 5*106', '3', '4', '107', '63', '3', '5', '2', 'Triveni Mahatha')");
}

for ($i = 71; $i < 74; $i ++)
{
	mysql_query("INSERT INTO `online judge`.`problems` (`id`, `problem_id`, `problem_name`, `contest_id`, `contest_name`, `problem_statement`, `short_desc`, `input_desc`, `output_desc`, `constraints`, `sample_input`, `sample_output`, `total_submissions`, `accepted_submissions`, `time_limit`, `memory_limit`, `difficulty`, `author`) VALUES (NULL, 'COMPNPARSE54".$i."', 'Compilers and Parsers', 'MAYLONG14', 'May Long Challenge', 'Lira is now very keen on compiler development. :) She knows that one of the most important components of a compiler, is its parser. A parser is, in simple terms, a software component that processes text, and checks it''s semantic correctness, or, if you prefer, if the text is properly built. As an example, in declaring and initializing an integer, in C/C++, you can''t do something like: int = x ;4 as the semantics of such statement is incorrect, as we all know that the datatype must precede an identifier and only afterwards should come the equal sign and the initialization value, so, the corrected statement should be: int x = 4; Given some expressions which represent some instructions to be analyzed by Lira''s compiler, you should tell the length of the longest prefix of each of these expressions that is valid, or 0 if there''s no such a prefix.', 'Given some expressions which represent some instructions to be analyzed by Lira''s compiler, you should tell the length of the longest prefix of each of these expressions that is valid, or 0 if there''s no such a prefix.', 'Input will consist of an integer T denoting the number of test cases to follow.
Then, T strings follow, each on a single line, representing a possible expression in L++.', 'For each expression you should output the length of the longest prefix that is valid or 0 if there''s no such a prefix.', '1 <= T <= 500
1 <= The length of a single expression <= 106
The total size all the input expressions is no more than 5*106', '3', '4', '107', '63', '3', '5', '3', 'Triveni Mahatha')");
}*/

echo "<h1>Hello</h1>";
$q = mysql_query("SELECT * FROM problems");

$r = mysql_fetch_assoc($q);
print_r($r);

?>
