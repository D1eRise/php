<?php

function title($punkt) {
	if (URL($punkt['path'])) {
		return $punkt['title'];
	}
}
