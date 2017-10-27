<?php
	

	$fileContent = file( "errorDetails.txt" );
	$sz = count( $fileContent );
	$idWithDescription = array();
	$MASTER_LIST = array();
	for( $index = 0; $index < $sz; $index++ ) {
		//echo $fileContent[ $index ]."\n";
		$content = trim( $fileContent[ $index ] );
		if( $content[ 0 ] == "\"" ) {
			$arr = preg_split( "/:/", $content );
			$arr[ 0 ] = trim( preg_replace("/\"/", " ",  $arr[ 0 ] ) );
			$arr[ 1 ] = trim( $arr[ 1 ] );
			$MASTER_LIST[ "bugId" ] = $arr[ 0 ];
			$MASTER_LIST[ "bugSummary" ] = $arr[ 1 ];
			$MASTER_LIST[ "priority" ] = "MEDIUM";
			array_push( $idWithDescription, $MASTER_LIST );
		}
	}
	//print_r( $idWithDescription );
	$sz = count( $idWithDescription );
	for( $index = 0; $index < $sz; $index++ ) {
		echo $index."[bugId] = "."\"".$idWithDescription[ $index ]['bugId']."\"\n";
		echo $index."[bugSummary] = "."\"".$idWithDescription[ $index ]['bugSummary']."\"\n";
		echo $index."[priority] = "."\"".$idWithDescription[ $index ]['priority']."\"\n\n\n";
	}
?>