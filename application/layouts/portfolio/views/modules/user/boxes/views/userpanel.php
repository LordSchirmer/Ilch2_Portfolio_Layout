<?php

/** @var \Ilch\View $this */

if ($this->getUser() !== null) : ?>
    <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'panel', 'action' => 'index']) ?>">
        <i class="fa-solid fa-user" aria-hidden="true"></i> <?=$this->getTrans('hello') ?> <?=$this->escape($this->getUser()->getName()) ?>
    </a><br />
    <?php if ($this->get('userAccesses') || $this->getUser()->isAdmin()) : ?>
        <a href="<?=$this->getUrl(['module' => 'admin', 'controller' => 'admin', 'action' => 'index']) ?>">
            <i class="fa-solid fa-gears" aria-hidden="true"></i> <?=$this->getTrans('admincenter') ?>
        </a> &nbsp;
    <?php endif; ?>
        <a href="<?=$this->getUrl(['module' => 'admin/admin', 'controller' => 'login', 'action' => 'logout', 'from_frontend' => 1]) ?>">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> <?=$this->getTrans('logout') ?>
        </a>
<?php else : ?>
    <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'login', 'action' => 'index']) ?>">
        <i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i> <?=$this->getTrans('login') ?>
    </a>
<?php endif; ?>
