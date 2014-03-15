<?php
// Error Handlers : {
	
	function error_handler($errno, $errstr, $errfile, $errline)	//will be called when a run time error is encountered.
	{
		echo "\n\tError#".$errno." encountered on line#".$errline." of \"".$errfile."\" > ".$errstr."\n";
		echo "\nStack Trace:\n";
		 $stack_trace_array = debug_backtrace();
		 // var_dump($stack_trace_array);
		 foreach($stack_trace_array as $i=>$stack_frame)
		 {
		 	if($i == 0)	// first frame is always error_handler. So ignore it.
		 	{
		 		continue;
		 	}
		 	$error_str = "\tfile:".$stack_frame["file"]."\tline:".$stack_frame["line"]."\tfunction:".$stack_frame["function"]."(";
	 		foreach($stack_frame["args"] as $j=>$arg)
	 		{
	 			if($j != 0)
	 			{
	 				$error_str .= ", ";
	 			}

	 			$error_str .= "arg[".$j."] = ".$arg;
	 		}
	 		$error_str .= ")";
		 	echo "\nFrame[".$i."]:".$error_str;
		 	if($i >= 15)	// only a set of stack frames.
		 	{
		 		break;
		 	}
		 }
		die("\nDying now...!!!!\n");
	}

// }

// Main script : {

	include "./lib/lib.php";

	echo "\nSetting up user defined error handler..!!";
	$old_error_handler = set_error_handler("error_handler");
	echo "\nold_error_handler:";	var_dump($old_error_handler);

	echo "\n--------------------------------Error Test Starts..!!------------------------------ \n ";
		
		//here's the syntax error.
		echo "Haha";
		demo_function_3();

	echo "\n---------------------------------Error Test Ends..!!-------------------------------\n";

// }

?>