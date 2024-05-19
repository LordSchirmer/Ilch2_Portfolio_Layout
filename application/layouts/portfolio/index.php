<?php /** @var $this \Ilch\Layout\Frontend */ ?>
<!DOCTYPE html>
<html lang="en"<?=($this->getLayoutSetting('siteBrightness') == 1) ? ' data-bs-theme="light"' : ' data-bs-theme="dark"'?>>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?=$this->getHeader() ?>
    <link href="<?=$this->getVendorUrl('twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?=$this->getLayoutUrl('assets/css/style.css') ?>" rel="stylesheet">
    <?php include('box/siteColor.php'); ?>
    <?=$this->getCustomCSS() ?>
    <script src="<?=$this->getVendorUrl('twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</head>

<body>
    <!-- mobile nav toggle button -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none fa-solid fa-bars"></i>

    <!-- header -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="site-profile">
                <a href="<?=$this->getUrl() ?>"><img src="<?php include('box/siteLogo.php'); ?>" alt="Logo" class="profile-image img-fluid rounded-circle"></a>
                <h1><a href="<?=$this->getUrl() ?>"><?php include('box/siteName.php'); ?></a></h1>
                <div class="social-links mt-3 text-center">
                    <?php include('box/siteSocial.php'); ?>
                </div>
            </div>

            <!-- nav-menu -->
            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <?=$this->getMenu(1, '<li><a href="#" title="%s">%s</a>%c</li>', [
                        'menus' => [
                            'ul-class-root' => '',
                            'ul-class-child' => '',
                            'allow-nesting' => false
                        ],
                        'boxes' => [
                            'render' => false
                        ],
                    ]) ?>
                </ul>
            </nav><!-- end nav-menu -->

        </div>
    </header><!-- end header -->

    <!-- main -->
    <main id="main">

        <!-- breadcrumbs -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2><?php include('box/siteTitle.php'); ?></h2>
                    <ol>
                        <?=$this->getHmenu() ?>
                    </ol>
                </div>
            </div>
        </section><!-- end breadcrumbs -->

        <!-- portfolio details section -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <?=$this->getContent() ?>
                    </div>
                    <div class="col-lg-4">
                        <?=$this->getMenu(2, '<div class="portfolio-info">
                            <h3>%s</h3>
                            <div>%c</div>
                        </div>') ?>
                    </div>
                </div>
            </div>
        </section><!-- end portfolio details section -->

    </main><!-- end main -->

    <!-- footer -->
    <footer id="portfolio-footer">
        <div class="container">
            <div class="userpanel">
                <?=$this->getBox('user', 'login', 'userpanel'); ?>
            </div>
            <div class="copyright">
                <script>document.write(new Date().getFullYear());</script> &copy; by <?php include('box/siteName.php'); ?>
            </div>
        </div>
    </footer><!-- end footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></a>

    <!-- js files -->
    <?=$this->getFooter() ?>
    <script>window.jQuery || document.write('<script src="<?=$this->getVendorUrl('npm-asset/jquery/dist/jquery.min.js') ?>">\x3C/script>')</script>
    <script src="<?=$this->getLayoutUrl('assets/js/main.js') ?>"></script>

</body>

</html>