<?php
$ipadStyle = "";
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||
strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
{
$ipadStyle = '	<link rel="stylesheet" href="/css/ipad.css" type="text/css" />';

}
else if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))
{
	$ipadStyle = '<link rel="stylesheet" href="/css/ipad.css" type="text/css" />';


}?>