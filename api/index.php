<?php

// Set the correct paths for Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';

// Forward Vercel requests to public/index.php
require __DIR__ . '/../public/index.php';
