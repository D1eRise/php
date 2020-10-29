<?php
function cutString ($string, $maxLen = 12) {
	if (strlen($string) > $maxLen) {
		return substr_replace($string, '...', $maxLen);
	}
	return $string;
}
