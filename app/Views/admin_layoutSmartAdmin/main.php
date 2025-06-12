<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Page Title - Category - SmartAdmin v4.6.0
        </title>
        <meta name="description" content="Page Title">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-title" content="Page Title">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!-- Mobile proof your site -->
        <link rel="manifest" href="<?= base_url() ?>adminAssets/media/data/manifest.json">
        <!-- Remove phone, date, address and email as default links -->
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="date=no">
        <meta name="format-detection" content="address=no">
        <meta name="format-detection" content="email=no">
        <meta name="theme-color" content="#37393e">
        <!-- iDevice splash screens -->
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <link href="<?= base_url() ?>adminAssets/img/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="<?= base_url() ?>adminAssets/css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="<?= base_url() ?>adminAssets/css/app.bundle.css">
        <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
        <link id="myskin" rel="stylesheet" media="screen, print" href="<?= base_url() ?>adminAssets/css/skins/skin-master.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>adminAssets/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>adminAssets/img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="<?= base_url() ?>adminAssets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- You can add your own stylesheet here to override any styles that comes before it
		<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
        <link rel="stylesheet" href="<?= base_url() ?>adminAssets/css/datagrid/datatables/datatables.bundle.css">


    </head>

    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var htmlRoot = document.getElementsByTagName('HTML')[0],
                classHolder = document.getElementsByTagName('BODY')[0],
                head = document.getElementsByTagName('HEAD')[0],
                themeID = document.getElementById('mytheme'),
                filterClass = function(t, e)
                {
                    return String(t).split(/[^\w-]+/).filter(function(t)
                    {
                        return e.test(t)
                    }).join(' ')
                },
                /** 
                 * Load theme options
                 **/
                loadSettings = function()
                {
                    var t = localStorage.getItem('themeSettings') || '',
                        e = t ? JSON.parse(t) :
                        {};
                    return Object.assign(
                    {
                        htmlRoot: '',
                        classHolder: '',
                        themeURL: ''
                    }, e)
                },
                /** 
                 * Save to localstorage 
                 **/
                saveSettings = function()
                {
                    themeSettings.htmlRoot = filterClass(htmlRoot.className, /^(root)-/i),
                        themeSettings.classHolder = filterClass(classHolder.className, /^(nav|header|footer|mod|display)-/i),
                        themeSettings.themeURL = themeID.getAttribute("href") ? themeID.getAttribute("href") : "",
                        localStorage.setItem("themeSettings", JSON.stringify(themeSettings))
                },
                /** 
                 * Reset settings
                 **/
                resetSettings = function()
                {
                    localStorage.setItem("themeSettings", "")
                },
                themeSettings = loadSettings();

            themeID || ((themeID = document.createElement('link')).id = 'mytheme',
                    themeID.rel = 'stylesheet',
                    themeID.href = '',
                    head.appendChild(themeID),
                    themeID = document.getElementById('mytheme')),
                themeSettings.htmlRoot && (htmlRoot.className = themeSettings.htmlRoot),
                themeSettings.classHolder && (classHolder.className = themeSettings.classHolder),
                themeSettings.themeURL && themeID.setAttribute("href", themeSettings.themeURL);

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->

                <!-- include sidebar.php -->
                 <?= view('admin_layout/sidebar') ?>

                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    
                    <!-- include header.php -->
                     <?= view('admin_layout/header') ?>

                    <!-- END Page Header -->

                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    
                    <!-- at dashboard.php -->
                    <?= view($view, $data); ?>

                    <!-- this overlay is activated only when mobile menu is triggered -->

                    <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    
                    <!-- at footer.php -->
                     <?= view('admin_layout/footer') ?>

                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                    
                    <!-- at shortcuts.php -->
                     <?= view('admin_layout/shortcuts') ?>

                    <!-- END Shortcuts -->
                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->
                    <p id="js-color-profile" class="d-none">
                        <span class="color-primary-50"></span>
                        <span class="color-primary-100"></span>
                        <span class="color-primary-200"></span>
                        <span class="color-primary-300"></span>
                        <span class="color-primary-400"></span>
                        <span class="color-primary-500"></span>
                        <span class="color-primary-600"></span>
                        <span class="color-primary-700"></span>
                        <span class="color-primary-800"></span>
                        <span class="color-primary-900"></span>
                        <span class="color-info-50"></span>
                        <span class="color-info-100"></span>
                        <span class="color-info-200"></span>
                        <span class="color-info-300"></span>
                        <span class="color-info-400"></span>
                        <span class="color-info-500"></span>
                        <span class="color-info-600"></span>
                        <span class="color-info-700"></span>
                        <span class="color-info-800"></span>
                        <span class="color-info-900"></span>
                        <span class="color-danger-50"></span>
                        <span class="color-danger-100"></span>
                        <span class="color-danger-200"></span>
                        <span class="color-danger-300"></span>
                        <span class="color-danger-400"></span>
                        <span class="color-danger-500"></span>
                        <span class="color-danger-600"></span>
                        <span class="color-danger-700"></span>
                        <span class="color-danger-800"></span>
                        <span class="color-danger-900"></span>
                        <span class="color-warning-50"></span>
                        <span class="color-warning-100"></span>
                        <span class="color-warning-200"></span>
                        <span class="color-warning-300"></span>
                        <span class="color-warning-400"></span>
                        <span class="color-warning-500"></span>
                        <span class="color-warning-600"></span>
                        <span class="color-warning-700"></span>
                        <span class="color-warning-800"></span>
                        <span class="color-warning-900"></span>
                        <span class="color-success-50"></span>
                        <span class="color-success-100"></span>
                        <span class="color-success-200"></span>
                        <span class="color-success-300"></span>
                        <span class="color-success-400"></span>
                        <span class="color-success-500"></span>
                        <span class="color-success-600"></span>
                        <span class="color-success-700"></span>
                        <span class="color-success-800"></span>
                        <span class="color-success-900"></span>
                        <span class="color-fusion-50"></span>
                        <span class="color-fusion-100"></span>
                        <span class="color-fusion-200"></span>
                        <span class="color-fusion-300"></span>
                        <span class="color-fusion-400"></span>
                        <span class="color-fusion-500"></span>
                        <span class="color-fusion-600"></span>
                        <span class="color-fusion-700"></span>
                        <span class="color-fusion-800"></span>
                        <span class="color-fusion-900"></span>
                    </p>
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="page_login.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
                <i class="fal fa-sign-out"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
                <i class="fal fa-expand"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
                <i class="fal fa-print"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
                <i class="fal fa-microphone"></i>
            </a>
        </nav>
        <!-- END Quick Menu -->

        <!-- BEGIN Page Settings -->
        
        <!-- at settings.php -->
         <?= view('admin_layout/settings') ?>

        <!-- END Page Settings -->
        <script src="<?= base_url() ?>adminAssets/js/vendors.bundle.js"></script>
        <script src="<?= base_url() ?>adminAssets/js/app.bundle.js"></script>
        <script src="<?= base_url() ?>adminAssets/js/datagrid/datatables/datatables.bundle.js"></script>
        <!--This page contains the basic JS and CSS files to get started on your project. If you need aditional addon's or plugins please see scripts located at the bottom of each page in order to find out which JS/CSS files to add.-->
    </body>
    <!-- END Body -->
</html>
