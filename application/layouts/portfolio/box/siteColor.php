<?php

/** @var \Ilch\Layout\Frontend $this */

/**
 * brightness a color by a percentage
 *
 * @param   string  $hex            Supported formats: #FFF, #FFFFFF, FFF, FFFFFF
 * @param   number  $brightness     A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker
 *
 * @return  string
 */
function adjustBrightness($hex, $brightness) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) == 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    $hex = array_map('hexdec', str_split($hex, 2));
    foreach ($hex as & $color) {
        $adjustableLimit = $brightness < 0 ? $color : 255 - $color;
        $adjustAmount = ceil($adjustableLimit * $brightness);
        $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
    }
    return '#' . implode($hex);
}
/**
 * Converts hex to rgba
 *
 * @param   string  $hex
 * @param   number  $opacity    A number between 0 and 1; 0.5 = 50% opacity
 *
 * @return  string
 */
function hexToRGBA($hex, $opacity) {
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    return 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . $opacity . ')';
}

/**
 * Check Background
 */
if ($this->getLayoutSetting('siteBackground') != '' && file_exists($this->getBaseUrl($this->getLayoutSetting('siteBackground')))) {
    $background = $this->getBaseUrl($this->getLayoutSetting('siteBackground'));
} else {
    $background = $this->getLayoutUrl('assets/img/profile-background.jpg');
}

/**
 * Check Brightness
 */
if ($this->getLayoutSetting('siteBrightness') == 1) {
    $brightness = '    .portfolio-details { background: linear-gradient(rgba(var(--bs-body-bg-rgb), 0.8), rgba(var(--bs-body-bg-rgb), 0.8)), url(' . $background . ') no-repeat fixed; background-size: cover; }';
} else {
    $brightness = '    .portfolio-details { background: linear-gradient(rgba(var(--bs-body-bg-rgb), 0.9), rgba(var(--bs-body-bg-rgb), 0.9)), url(' . $background . ') no-repeat fixed; background-size: cover; }';
}

/**
 * Output styles
 **/
$style = '<style>' . "\n" . $brightness . "\n" .
         '    a, .ilch-link { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . "\n" .
         '    a:hover { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.25 ) . '; }' . "\n" .
         '    .back-to-top { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . "\n" .
         '    .back-to-top:hover { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . "\n" .
         '    .mobile-nav-toggle { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . "\n" .
         '    .mobile-nav-toggle:hover { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . "\n" .
         '    #header .site-profile img.profile-image { border: 8px solid ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . "\n" .
         '    #header .site-profile .social-links a:hover { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . "\n" .
         '    .nav-menu ul li ul li a:hover::before { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0.25 ) . '; }' . "\n" .
         '    .nav-menu ul li ul li a:hover { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0.25 ) . '; }' . "\n" .
         '    #portfolio-footer a:hover { color:  ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0.25 ) . '; }' . "\n" .
         '    .ilch-head { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; background: linear-gradient(180deg, ' . hexToRGBA(adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.3 ), 1 ) . ' 0%, ' . hexToRGBA(adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ), 1 ) . ' 100%); }' . "\n" .
         '    #forum .btn.btn-primary { background-color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.2 ) . '; }' . "\n" .
         '    #forum .btn.btn-sm.btn-primary { background-color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.2 ) . '; }' . "\n" .
         '    #forum .btn.btn-primary:hover { background-color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . "\n" .
         '    #forum .btn.btn-sm.btn-primary:hover { background-color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . "\n" .         
         '</style>' . "\n";

echo $style;
