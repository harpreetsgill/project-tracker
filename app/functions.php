<?php
    function sanitize($data) {
        return htmlspecialchars($data);
    }

    function siteURL() {
        $protocol = 'https://';
        $domainName = $_SERVER['HTTPS_HOST'] . '/project-tracker/';
        return $protocol . $domainName;
    }
    DEFINE('SITE_URL', siteURL());

    function dateFormat($rawDate) {
        $tempDate = date_create($rawDate);
        return date_format($tempDate,"F j, Y");
    }

    function timeFormat($rawTime) {
        $tempTime = date_create($rawTime);
        return date_format($tempTime, "g:i a");
    }

    function makeEditable() {
        console.log("YES");
    }
?>