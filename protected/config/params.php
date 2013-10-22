<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/siteinfo.php'),
	require(dirname(__FILE__).'/ipaccess.php'),
	array(
		'dcmsVersion'=>'1.0',
		'releaseDate'=>'20130808'
	)
);