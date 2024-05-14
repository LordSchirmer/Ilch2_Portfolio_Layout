<?php

namespace Layouts\Portfolio\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'name' => 'Ilch-Portfolio',
        'version' => '1.0.0',
        'ilchCore' => '2.2.0',
        'author' => 'Lord|Schirmer',
        'link' => 'https://www.ilch.de',
        'desc' => 'Portfolio Layout',
        'settings' => [
            'siteName' => [
                'type' => 'text',
                'default' => 'Max Mustermann',
                'description' => 'descSiteName',
            ],
            'siteTitle' => [
                'type' => 'text',
                'default' => 'Musterman´s Portfolio',
                'description' => 'descSiteTitle',
            ],
            'siteLogo' => [
                'type' => 'mediaselection',
                'default' => 'application/layouts/portfolio/assets/img/profile-img.jpg',
                'description' => 'descSiteLogo',
            ],
            'siteBackground' => [
                'type' => 'mediaselection',
                'default' => 'application/layouts/portfolio/assets/img/profile-background.jpg',
                'description' => 'descSiteBackground',
            ],
            'siteColors' => [
                'type' => 'separator',
            ],
            'siteBrightness' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => 'descSiteBrightness',
            ],
            'siteAccentColor' => [
                'type' => 'colorpicker',
                'default' => '#149ddd',
                'description' => 'descSiteAccentColor',
            ],
            'siteSocials' => [
                'type' => 'separator',
            ],
            'buttonFacebook' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => 'descFacebook',
            ],
            'urlFacebook' => [
                'type' => 'url',
                'default' => 'https://www.facebook.com/',
                'description' => 'descUrlFacebook',
            ],
            'buttonInstagram' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => 'descInstagram',
            ],
            'urlInstagram' => [
                'type' => 'url',
                'default' => 'https://www.instagram.com/',
                'description' => 'descUrlInstagram',
            ],
            'buttonLinkedin' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => 'descLinkedin',
            ],
            'urlLinkedin' => [
                'type' => 'url',
                'default' => 'https://linkedin.com/',
                'description' => 'descUrlLinkedin',
            ],
            'buttonTwitter' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => 'descTwitter',
            ],
            'urlTwitter' => [
                'type' => 'url',
                'default' => 'https://twitter.com/',
                'description' => 'descUrlTwitter',
            ],
            'buttonYoutube' => [
                'type' => 'flipswitch',
                'default' => '1',
                'description' => 'descYoutube',
            ],
            'urlYoutube' => [
                'type' => 'url',
                'default' => 'https://youtube.com/',
                'description' => 'descUrlYoutube',
            ],
        ],
        'layouts' => [
            'index_full' => [
                ['module' => 'calendar'],
                ['module' => 'forum'],
                ['module' => 'gallery'],
                ['module' => 'shop'],
                ['module' => 'events'],
                ['module' => 'user'],
            ],
        ],
    ];

    public function getUpdate($installedVersion)
    {
        switch ($installedVersion) {
            case "1.0.0":
                // Anweisungen
        }
    }
}