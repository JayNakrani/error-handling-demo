<?php
// Some other functions : {

	function demo_function_1($a)
	{
		echo "\nThis is demo_function_1..!!\n";
		echo $x;	// error is here..!!
	}

	function demo_function_2($a, $b)
	{
		echo "\nThis is demo_function_2..!!\n";
		demo_function_1('xyz');
	}

	function demo_function_3()
	{
		echo "\nThis is demo_function_3..!!\n";
		demo_function_2(5,7);
	}

// }
?>