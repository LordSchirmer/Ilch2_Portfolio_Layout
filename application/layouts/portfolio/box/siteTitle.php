<?php

/** @var \Ilch\Layout\Frontend $this */

if ($this->getLayoutSetting('siteTitle') != '') {
    echo $this->getLayoutSetting('siteTitle');
} else {
    echo 'Mustermann´s Portfolio';
}
