<?php 
	$url = 'www.youtube.com/watch?v=2QK-XUsKb00';
	$queryString = parse_url($url, PHP_URL_QUERY);
	var_dump($queryString);
	parse_str($queryString, $params);
	var_dump($params);
	$video = "i3.ytimg.com/vi/{$params['v']}/default.jpg";
	echo $video;
?>