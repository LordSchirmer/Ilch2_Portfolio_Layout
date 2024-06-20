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
 * Check Background Image
 */
if ($this->getLayoutSetting('siteBackgroundImage') != '' && file_exists($this->getBaseUrl($this->getLayoutSetting('siteBackgroundImage')))) {
    $backgroundImage = $this->getBaseUrl($this->getLayoutSetting('siteBackgroundImage'));
} else {
    $backgroundImage = $this->getLayoutUrl('assets/img/profile-background.jpg');
}

/**
 * Check Background Cover
 */
$n = "\n" . '    ';
if (is_numeric($this->getLayoutSetting('siteBackgroundCover'))) {
    if ($this->getLayoutSetting('siteBackgroundCover') <= 0) {
        $alpha = 0;
    } elseif ($this->getLayoutSetting('siteBackgroundCover') >= 100) {
        $alpha = 1;
    } else {
        $alpha = $this->getLayoutSetting('siteBackgroundCover') / 100;
    }
    $backgroundAlpha = '.portfolio-details { background: linear-gradient(rgba(var(--bs-body-bg-rgb), ' . $alpha . '), rgba(var(--bs-body-bg-rgb), ' . $alpha . ')), url(' . $backgroundImage . ') no-repeat fixed; background-size: cover; }' . $n;
} else {
    $backgroundAlpha = '';
}

/**
 * Output styles
 **/
$style = '<!-- advanced css settings -->' . $n . 
         '<style>' . $n .
         'a, .ilch-link { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . $n .
         'a:hover { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.25 ) . '; }' . $n .
         '.back-to-top, .mobile-nav-toggle { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . $n .
         '.back-to-top:hover, .mobile-nav-toggle:hover { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . $n .
         '#header .site-profile img.profile-image { border: 8px solid ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . $n .
         '#header .site-profile .social-links a:hover { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; }' . $n .
         '.nav-menu ul li ul li a:hover, .nav-menu ul li ul li a:hover::before { color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0.25 ) . '; }' . $n .
         $backgroundAlpha .
         '.portfolio-details .portfolio-info { box-shadow: ' . hexToRGBA(adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ), 0.5 ) . ' 1px 1px 2px; }' . $n .
         '#portfolio-footer a:hover { color:  ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0.25 ) . '; }' . $n .
         '.ilch-head { background: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ) . '; background: linear-gradient(180deg, ' . hexToRGBA(adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.3 ), 1 ) . ' 0%, ' . hexToRGBA(adjustBrightness($this->getLayoutSetting('siteAccentColor'), 0 ), 1 ) . ' 100%); }' . $n .
         '#forum .btn.btn-primary, #forum .btn.btn-sm.btn-primary { background-color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.2 ) . '; }' . $n .
         '#forum .btn.btn-primary:hover, #forum .btn.btn-sm.btn-primary:hover { background-color: ' . adjustBrightness($this->getLayoutSetting('siteAccentColor'), -0.5 ) . '; }' . $n .         
         '</style><!-- end advanced css settings -->' . "\r\n";
echo $style;
