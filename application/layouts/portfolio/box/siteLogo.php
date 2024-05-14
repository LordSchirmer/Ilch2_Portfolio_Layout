<?php

/** @var \Ilch\Layout\Frontend $this */

if ($this->getLayoutSetting('siteLogo') != '' && file_exists($this->getBaseUrl($this->getLayoutSetting('siteLogo')))) {
    echo $this->getBaseUrl($this->getLayoutSetting('siteLogo'));
} else {
    echo $this->getLayoutUrl('assets/img/profile-img.jpg');
}
