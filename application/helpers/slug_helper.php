<?php 
	function createSlug($slug) { 
	$spacesHypens = '/[^\-\s\pN\pL]+/u';
	$duplicateHypens= '/[\-\s]+/';
	$slug = preg_replace($spacesHypens, '', mb_strtolower($slug,'UTF-8'));
	$slug = preg_replace($duplicateHypens, '-', $slug);
	$slug = trim($slug,'-');
	return $slug;
}