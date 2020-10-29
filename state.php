<?php 
if ($showSuccess) {
    require($_SERVER['DOCUMENT_ROOT'] . '/include/success.php');
} else if ($showError) {
    require($_SERVER['DOCUMENT_ROOT'] . '/include/error.php');
} 
