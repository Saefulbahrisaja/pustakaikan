<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('create_slug'))
{
	function create_slug($slug)
	{
		$spacesHypens = '/[^\-\s\pN\pL]+/u';
		$duplicateHypens= '/[\-\s]+/';
		$slug = preg_replace($spacesHypens, '', mb_strtolower($slug,'UTF-8'));
		$slug = preg_replace($duplicateHypens, '-', $slug);
		$slug = trim($slug,'-');
		return $slug;
	}
}