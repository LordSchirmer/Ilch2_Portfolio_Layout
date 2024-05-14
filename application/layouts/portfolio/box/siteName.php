<?php

/** @var \Ilch\Layout\Frontend $this */

if ($this->getLayoutSetting('siteName') != '') {
    echo $this->getLayoutSetting('siteName');
} else {
    echo 'Max Mustermann';
}
