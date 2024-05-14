<?php

/** @var \Ilch\Layout\Frontend $this */

$buttons = '';
if ($this->getLayoutSetting('buttonFacebook') == 1) {
    $buttons .= '<a href="' . $this->getLayoutSetting('urlFacebook') . '" title="Facebook" class="social-icon" target="_blank"><img src="' . $this->getLayoutUrl('assets/img/icons/facebook.png') . '"></a>';
}
if ($this->getLayoutSetting('buttonInstagram') == 1) {
    $buttons .= '<a href="' . $this->getLayoutSetting('urlInstagram') . '" title="Instagram" class="social-icon" target="_blank"><img src="' . $this->getLayoutUrl('assets/img/icons/instagram.png') . '"></a>';
}
if ($this->getLayoutSetting('buttonLinkedin') == 1) {
    $buttons .= '<a href="' . $this->getLayoutSetting('urlLinkedin') . '" title="LinkedIn" class="social-icon" target="_blank"><img src="' . $this->getLayoutUrl('assets/img/icons/linkedin.png') . '"></a>';
}
if ($this->getLayoutSetting('buttonTwitter') == 1) {
    $buttons .= '<a href="' . $this->getLayoutSetting('urlTwitter') . '" title="Twitter" class="social-icon" target="_blank"><img src="' . $this->getLayoutUrl('assets/img/icons/twitter.png') . '"></a>';
}
if ($this->getLayoutSetting('buttonYoutube') == 1) {
    $buttons .= '<a href="' . $this->getLayoutSetting('urlYoutube') . '" title="Youtube" class="social-icon" target="_blank"><img src="' . $this->getLayoutUrl('assets/img/icons/youtube.png') . '"></a>';
}

echo $buttons;
