<?php
    function sanitize($data) {
        return htmlspecialchars($data);
    }

    function siteURL() {
        $protocol = 'http://';
        $domainName = $_SERVER['HTTP_HOST'] . '/project-tracker';
        return $protocol . $domainName;
    }
    DEFINE('SITE_URL', siteURL());
?>