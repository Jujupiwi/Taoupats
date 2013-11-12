<?php
include 'contenu/param.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="ISO-8859-1">
<title>Taoupats de Daux</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link href="css/photos.css" rel="stylesheet">
<link rel="stylesheet" href="css/diapositive.css">
<link rel="stylesheet" href="css/diapo.css">
<link href="css/style.css" rel="stylesheet">
<link href="css/couleur.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<style>

body {
    background: url("../img/fond.png") repeat scroll 0 0 #FFFFFF;
}

a {
    color: #00AEDB;
}

a:hover {
    color: #000000;
}

.titre, .titreitalic, .page-header h1, .page-header em, article header h2, .entry-title, #wrap_home .home_content h2, #edito, #main_wrapper h2, .contenu h2, #main_wrapper h3, .contenu h3, #axome_menu, .modal-header strong, #ModalNewsletter .textwidget, #wrap_home .home_content .updated {
    font-family: 'Abel', Asap, Arial, sans-serif;
    font-weight: 700;
}

.page-header h1, .entry-title, #wrap_home .home_content h2, #edito, #main_wrapper h3, .contenu h3, .modal-header strong, #ModalNewsletter .textwidget, #wrap_home .home_content .updated, .titreitalic {
}

.big_wrapper, .home_content {
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    margin-top: 15px;
    padding: 8px;
}

.big_wrapper > div, .home_content > div {
    background-color: #FFFFFF;
}

div.ss-legal {
    display: none !important;
}

#logo {
    background: url("../img/logo.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    display: block;
    height: 288px;
    margin: 0 auto;
    width: 262px;
}

#logo span {
    background: url("../img/perso-logo.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    display: block;
    font-size: 0;
    height: 129px;
    line-height: 0;
    margin-top: -25px;
    text-indent: -2344px;
}

#banner {
    background-color: #000000;
    color: #FFFFFF;
    font-size: 10px;
    height: 35px;
}

#banner ul {
    list-style: none outside none;
    padding: 0;
}

header {
    position: relative;
}

header ul {
    margin: 0;
    padding: 0;
}

header ul.social {
    margin-left: 200px;
}

header ul.contact {
    position: relative;
    right: -130%;
    top: 0;
}

header ul.contact li {
    background: url("../img/telephone_picto.png") no-repeat scroll 0 0.32em rgba(0, 0, 0, 0);
    font-size: 13px;
    font-weight: bold;
    line-height: 35px;
    padding-left: 30px;
}

header nav div, header div.home * {
    float: left;
}

header nav .menu-accueil a {
    background: url("../img/toolbar_home.png") no-repeat scroll center center rgba(0, 0, 0, 0);
    display: block;
    height: 35px;
    overflow: hidden;
    text-indent: -9999px;
    vertical-align: middle;
    width: 35px;
}

header div.home a.newsletter {
    color: #FFFFFF;
    display: block;
    line-height: 35px;
}

header div.home a.newsletter:hover {
    color: #808080;
    text-decoration: none;
}

ul.social {
    width: 245px;
}

ul.social li {
    background: url("../img/social-network.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: block;
    float: left;
}

ul.social li a {
    display: block;
    height: 35px;
    overflow: hidden;
    text-indent: -9999px;
    width: 35px;
}

ul.social li.gp {
    background-position: 0 -35px;
}

ul.social li.gp:hover {
    background-position: 0 0;
}

ul.social li.fb {
    background-position: -35px -35px;
}

ul.social li.fb:hover {
    background-position: -35px 0;
}

ul.social li.tt {
    background-position: -70px -35px;
}

ul.social li.tt:hover {
    background-position: -70px 0;
}

ul.social li.yt {
    background-position: -105px -35px;
}

ul.social li.yt:hover {
    background-position: -105px 0;
}

ul.social li.pi {
    background-position: -140px -35px;
}

ul.social li.pi:hover {
    background-position: -140px 0;
}

ul.social li.vo {
    background-position: -175px -35px;
}

ul.social li.vo:hover {
    background-position: -175px 0;
}

ul.social li.fx {
    background-position: -210px -35px;
}

ul.social li.fx:hover {
    background-position: -210px 0;
}

#elem_fixed {
    position: relative;
}

.fanion_top {
    clear: both;
    position: absolute;
    right: 0;
}

#demande_catalogue.fanion_top {
    left: 0;
    right: auto;
}

.fanion_top div {
    float: right;
    width: 104px;
}

#demande_catalogue.fanion_top div {
    float: left;
}

.fanion_top div a {
    color: #FFFFFF;
    font-size: 11px;
    position: absolute;
    text-align: center;
    width: 104px;
}

.fanion_top div a:hover {
    text-decoration: none;
}

.fanion_top div a strong {
    background-color: #00AEDB;
    display: block;
    font-size: 16px;
    padding: 6px 6px 0;
    transition: all 0.2s ease-out 0s;
}

#demande_catalogue.fanion_top div a strong {
    background-color: #E43F79;
}

.fanion_top div a:hover strong {
    padding-top: 10px;
}

.fanion_top div a span {
    background-color: #00AEDB;
    display: block;
    line-height: 1em;
    padding: 8px 5px 0;
}

#demande_catalogue.fanion_top div a span {
    background-color: #E43F79;
}

.fanion_top div a em {
    background: url("../img/fleche-devis.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    display: block;
    height: 33px;
}

#demande_catalogue.fanion_top div a em {
    background-image: url("../img/fleche-catalogue.png");
}

#axome_menu {
    height: 150px;
}

#axome_menu ul {
    list-style: none outside none;
    margin: 0;
    padding: 0 0 0 108px;
}

#axome_menu ul li {
    display: block;
    float: left;
    height: 120px;
    padding: 0 8px;
    width: 87px;
}

#axome_menu ul li a {
    color: #000000;
    display: block;
    float: left;
    font-size: 12px;
    height: 120px;
    line-height: 1.05em;
    text-align: center;
    text-transform: uppercase;
    width: 87px;
}

#axome_menu ul li a:hover {
    text-decoration: none;
}

#axome_menu ul li a i {
    background: url("../img/menu-nous-decouvrir.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    display: block;
    height: 83px;
}

#axome_menu ul li a span {
    display: block;
    padding: 2px 4px;
}

#axome_menu ul li.actu a i {
    background-image: url("../img/menu-actu.png");
}

#axome_menu ul li.charte-qualite a i {
    background-image: url("../img/menu-charte-qualite.png");
}

#axome_menu ul li.confiance a i {
    background-image: url("../img/menu-confiance.png");
}

#axome_menu ul li.contact a i {
    background-image: url("../img/menu-contact.png");
}

#axome_menu ul li.creations-mesure a i {
    background-image: url("../img/menu-creations-mesure.png");
}

#axome_menu ul li.nous-decouvrir a i {
    background-image: url("../img/menu-nous-decouvrir.png");
}

#axome_menu ul li.retour-accueil a i {
    background-image: url("../img/menu-retour-accueil.png");
}

#axome_menu ul li.select-produits a i {
    background-image: url("../img/menu-select-produits.png");
}

#axome_menu ul li a i:hover {
    background-position: center bottom;
}

#wrap {
    margin-top: 20px;
}

body.top-navbar {
    padding-top: 38px;
}

#bg_menufixed {
    padding: 8px 0 20px;
    width: 100%;
}

#bg_menufixed.menuFixe {
    background: url("../img/bandeau-blanc.png") repeat-x scroll center bottom rgba(0, 0, 0, 0);
    position: fixed;
    top: 25px;
    z-index: 9;
}

#content {
}

.wp-post-image {
    display: block;
    float: left;
    margin: 0 15px 15px 0;
}

.clear {
    clear: both;
}

#main {
    float: right;
}

#main_wrapper {
    border-left: 1px solid #BCBCBB;
    min-height: 300px;
    padding: 0 30px 15px;
}

.span12 #main_wrapper {
    border-left: medium none;
}

.page-header {
    border: medium none;
    height: 40px;
    margin: 0;
    padding: 0;
    position: relative;
}

.page-header h1, .page-header em, #wrap_home .home_content h2, .modal-header strong {
    background: url("../img/titre.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    color: #FFFFFF;
    font-size: 24px;
    height: 55px;
    line-height: 44px;
    margin: -25px 0 0;
    position: absolute;
    text-align: center;
    width: 100%;
}

.span12 .page-header h1 {
    width: 100%;
}

#thumbs {
    clear: both;
    padding-top: 10px;
}

#thumbs ul {
    list-style: none outside none;
    margin: 0;
    padding: 0;
}

#thumbs ul li a {
    border: 1px solid #DDDDDD;
    border-radius: 4px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    display: block;
    margin: 3px;
}

#thumbs ul li a img {
    border-radius: 4px;
    display: block;
    margin: 0 auto;
}

#liste_prod {
    clear: both;
}

#liste_prod ul {
    list-style: none outside none;
    margin: 0;
    padding: 0;
}

#liste_prod ul li.alpha {
    margin-left: 0;
}

.prod_list_home {
    padding: 40px 0 35px 10px;
}

.prod_list {
    list-style: none outside none;
    margin: 0;
    padding: 0;
}

.prod_list li {
    overflow: hidden;
    text-align: center;
}

.prod_list li.alpha {
    margin-left: 0;
}

.prod_list li span {
    display: block;
}

.prod_list li a {
    color: #404040;
    font-size: 12px;
    line-height: 1.1em;
    text-decoration: none;
}

.prod_list li a:hover {
    color: #00AEDB;
}

.img_prod {
    display: block;
    height: 150px;
}

.img_prod img {
    display: block;
    margin: 0 auto;
    max-height: 155px;
}

body.page .prod_list {
    clear: both;
    padding-top: 20px;
}

body .prod_list.row-fluid li.span3 {
    min-height: 188px;
}

body #prod_list_partenaires .prod_list.row-fluid li.span4 {
    min-height: 188px;
}

#sidebar {
}

#sidebar .widget {
    clear: both;
    padding: 20px 15px 0 0;
}

.widget_title {
    display: none;
}

.axome_menu_sidebar {
    list-style: none outside none;
    margin: 0;
    padding: 0;
}

.axome_menu_sidebar > li {
    padding: 1px 0;
}

.axome_menu_sidebar > li > a {
    border-bottom: 1px solid #E5E5E5;
    display: block;
    line-height: 1em;
    padding: 8px 10px;
}

.axome_menu_sidebar > li.current_page_ancestor > a, .axome_menu_sidebar > li.current_page_parent > a, .axome_menu_sidebar > li.current_page_item > a {
    background-color: #00AEDB;
    border: medium none;
    border-radius: 3px;
    color: #FFFFFF;
    text-decoration: none;
}

.axome_menu_sidebar ul {
    color: #777777;
    list-style: disc outside none;
    margin: 0 0 0 25px;
    padding: 0;
}

.axome_menu_sidebar ul li {
    padding: 3px 0;
}

.axome_menu_sidebar ul li a {
    color: #777777;
    display: block;
    font-size: 12px;
    line-height: 1.1em;
}

.axome_menu_sidebar ul li.current_page_item a {
    color: #444444;
}

.axome_menu_sidebar li ul {
    display: none;
}

.axome_menu_sidebar li.current_page_item ul, .axome_menu_sidebar li.current_page_ancestor ul, .axome_menu_sidebar li.current_page_parent ul {
    display: block;
}

.page-template-page-product-php .axome_menu_sidebar ul, .page-template-page-categoryprod-php .axome_menu_sidebar ul {
    display: none !important;
}

#voir_tous {
    clear: both;
    padding-bottom: 18px;
}

#voir_tous a {
    background-color: #00AEDB;
    border-radius: 3px;
    color: #FFFFFF;
    display: inline-block;
    font-weight: bold;
    line-height: 0.9em;
    padding: 8px 12px;
    text-decoration: none;
}

#voir_tous a:hover {
    background-color: #0091B6;
}

.hentry header {
}

.hentry time {
}

.hentry p.byline {
}

.hentry .entry-content {
}

.hentry footer {
}

.entry-content .logo_article {
    padding-bottom: 15px;
}

.entry-content .logo_article img {
    box-shadow: 0 0 2px 1px #FFFFFF, 0 0 5px rgba(0, 0, 0, 0.4);
    display: block;
    margin: 0 auto;
}

#wrap_home {
    clear: both;
}

#edito {
    color: #111111;
    padding: 25px 0 35px;
    text-align: center;
}

#edito > div {
    padding: 0 100px;
}

#edito h1 {
    font-size: 12px;
    line-height: 16px;
}

#edito h2 {
    font-size: 33px;
    line-height: 1.1em;
    margin: 0;
}

#edito h3 {
    color: #00AEDB;
    font-size: 24px;
    line-height: 1.1em;
    margin: 0;
}

.images_home {
    background-position: center bottom;
    background-repeat: no-repeat;
    clear: both;
    margin-bottom: 10px;
    position: relative;
}

.images_home > div {
}

.suivez_les_pas {
    background: url("../img/bt-cliquez.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    display: block;
    height: 130px;
    left: 50%;
    margin-left: -65px;
    position: absolute;
    width: 130px;
}

.suivez_les_pas:hover, .suivez_les_pas.active {
    background-position: center bottom;
}

#home_btfooter.suivez_les_pas {
    background-image: url("../img/bt-haut.png");
    position: relative;
}

.image_home {
    left: 50%;
    position: absolute;
    visibility: hidden;
}

#wrap_home .home_content {
    margin-top: 25px;
    position: relative;
}

#wrap_home .home_content h2 {
    background-position: center top;
    width: 100%;
}

#wrap_home .home_content .logo_article {
    margin-left: 5%;
    max-width: 95%;
    padding: 35px 0 15px;
}

#wrap_home .home_content .contenu {
    padding: 40px 10px 35px 0;
}

#wrap_home .home_content .contenu.sans_logo {
    padding: 40px 20px 35px;
}

#wrap_home #actualites.home_content .logo_article {
    padding-top: 55px;
}

.plus_dinfos {
    background: url("../img/bt-infos.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    height: 144px;
    margin-top: -60px;
    position: absolute;
    right: 10px;
    text-decoration: none;
    width: 144px;
    z-index: 8;
}

.plus_dinfos:hover {
    background-position: center bottom;
    text-decoration: none;
}

.plus_dinfos.lirelasuite {
    background-image: url("../img/bt-lire-suite.png");
}

.plus_dinfos.poursuivre {
    background-image: url("../img/bt-visite.png");
}

#wrap_home .home_content .updated {
    display: none;
}

.bloc_home_footer {
    background: url("../img/bloc_home_footer.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    clear: both;
    height: 18px;
}

#colophon {
    clear: both;
    color: #555555;
    font-size: 11px;
    padding: 30px 0 0;
}

body .modal-backdrop, body .modal-backdrop.fade.in {
    opacity: 0.4;
}

body .modal-header {
    border: medium none;
    height: 22px;
}

body .modal-body {
    padding: 5px 20px 30px;
    text-align: center;
}

body .modal-header strong {
    background-image: url("../img/titre_mini.png");
    margin-left: 30px;
    margin-top: -35px;
    width: 475px;
}

#ModalNewsletter.modal {
    box-shadow: 0 0 1px 7px rgba(0, 0, 0, 0.1);
    margin-top: -195px;
    overflow: visible;
}

#ModalNewsletter .textwidget {
    line-height: 1.7em;
    padding: 0 70px 15px;
}

#ModalNewsletter .textwidget strong {
    color: #000000;
    font-size: 30px;
}

#ModalNewsletter .textwidget em {
    color: #00AEDB;
    font-size: 22px;
}

#ModalNewsletter .mailjet-subscribe, #sub_cf .wpcf7-submit {
    background: url("../img/bt-envoyer.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    border: medium none;
    bottom: -70px;
    display: block;
    height: 144px;
    position: absolute;
    right: 330px;
    text-indent: -2344px;
    width: 144px;
}

#ModalNewsletter .mailjet-subscribe:hover, .ss-navigate input:hover, #sub_cf .wpcf7-submit:hover {
    background-position: center bottom;
}

#ModalNewsletter .response {
    line-height: 1.05em;
    padding: 0 140px;
}

#ModalNewsletter .response .error {
    color: #FF3300;
    font-weight: bold;
}

.ss-navigate {
    position: relative;
}

.ss-navigate > .ss-form-entry > input {
    background-color: rgba(0, 0, 0, 0) !important;
    bottom: -130px;
}

#footer_contenu {
    background-color: #000000;
    clear: both;
    color: #FFFFFF;
    font-size: 12px;
    line-height: 1.3em;
    min-height: 75px;
    padding: 9px 0;
}

#footer_contenu a {
    color: #FFFFFF;
}

#footer4 {
    text-align: right;
}

body.page-template-page-product-php #colophon, body.page-id-542 #colophon, body.page-id-66 #colophon {
    padding-top: 95px;
}

#bt_devis {
    clear: both;
    height: 60px;
    position: relative;
}

#bt_devis a {
    background: url("../img/bt-devis.png") no-repeat scroll center top rgba(0, 0, 0, 0);
    border: medium none;
    bottom: -70px;
    display: block;
    height: 144px;
    position: absolute;
    right: 20px;
    text-indent: -2344px;
    width: 144px;
}

#bt_devis a:hover {
    background-position: center bottom;
}

.wpcf7-form #sub_cf .wpcf7-submit {
    bottom: -110px;
}

.home .wpcf7-form #sub_cf .wpcf7-submit {
    bottom: -132px;
}

.wpcf7-form label {
    float: left;
    font-size: 13px;
    padding: 4px 2% 0 0;
    text-align: right;
    width: 30%;
}

.wpcf7-form label.required:after {
    color: #FF0000;
    content: " *";
}

.wpcf7-form span {
    display: inline-block;
    width: 50%;
}

.wpcf7-form span .wpcf7-form-control {
    width: 95%;
}

.wpcf7-form span.wpcf7-not-valid-tip {
    background-color: #FAF3F3;
    margin-left: 100px;
    padding-left: 5px;
    width: 80%;
}

.wpcf7-form .wpcf7-validation-errors {
    background-color: #FDFAF0;
}

#sub_cf {
    position: relative;
}

.wpcf7-form .wpcf7-response-output {
    margin-right: 180px;
}

.wpcf7-form .wpcf7-mail-sent-ok {
    background-color: #EEF8FA;
    border-color: #0093B9;
}

.contactformapdg div.right {
    float: right;
    text-align: center;
    width: 300px;
}

.contactformapdg div.left {
    margin-right: 300px;
}

.aligncenter {
    display: block;
    margin: 0 auto;
}

.alignleft {
    float: left;
}

.alignright {
    float: right;
}

figure.alignnone {
    margin-left: 0;
    margin-right: 0;
}

#main_wrapper h2, .contenu h2 {
    font-size: 22px;
}

#main_wrapper h3, .contenu h3 {
    color: #0093B9;
    font-size: 18px;
    line-height: 1.2em;
    margin-bottom: 5px;
}

body.page-template-page-naked-nl-php {
    background-image: none;
    padding-top: 0 !important;
}

body.page-template-page-naked-nl-php input.mailjet-subscribe {
    background-color: #000000;
    border: medium none;
    border-radius: 3px;
    color: #FFFFFF;
    padding: 6px 10px;
    vertical-align: top;
}

body.page-template-page-naked-nl-php input.mailjet-subscribe:hover {
    background-color: #444444;
}

body .row-fluid [class*="span"] {
    min-height: 25px;
}

@media (max-width: 979px) {
    body.top-navbar {
        padding-top: 0;
    }
}

#fancybox-loading {
    cursor: pointer;
    display: none;
    height: 40px;
    left: 50%;
    margin-left: -20px;
    margin-top: -20px;
    overflow: hidden;
    position: fixed;
    top: 50%;
    width: 40px;
    z-index: 1104;
}

#fancybox-loading div {
    background-image: url("fancybox/fancybox.png");
    height: 480px;
    left: 0;
    position: absolute;
    top: 0;
    width: 40px;
}

#fancybox-overlay {
    display: none;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1100;
}

#fancybox-tmp {
    border: 0 none;
    display: none;
    margin: 0;
    overflow: auto;
    padding: 0;
}

#fancybox-wrap {
    display: none;
    left: 0;
    outline: medium none;
    padding: 20px;
    position: absolute;
    top: 0;
    z-index: 1101;
}

#fancybox-outer {
    background: none repeat scroll 0 0 #FFFFFF;
    height: 100%;
    position: relative;
    width: 100%;
}

#fancybox-content {
    border: 0 solid #FFFFFF;
    height: 0;
    outline: medium none;
    overflow: hidden;
    padding: 0;
    position: relative;
    width: 0;
    z-index: 1102;
}

#fancybox-hide-sel-frame {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1101;
}

#fancybox-close {
    background: url("fancybox/fancybox.png") repeat scroll -40px 0 rgba(0, 0, 0, 0);
    cursor: pointer;
    display: none;
    height: 30px;
    position: absolute;
    right: -15px;
    top: -15px;
    width: 30px;
    z-index: 1103;
}

#fancybox-error {
    color: #444444;
    font: 12px/20px Arial;
    margin: 0;
    padding: 14px;
}

#fancybox-img {
    border: medium none;
    height: 100%;
    line-height: 0;
    margin: 0;
    outline: medium none;
    padding: 0;
    vertical-align: top;
    width: 100%;
}

#fancybox-frame {
    border: medium none;
    display: block;
    height: 100%;
    width: 100%;
}

#fancybox-left, #fancybox-right {
    background: url("blank.gif") repeat scroll 0 0 rgba(0, 0, 0, 0);
    bottom: 0;
    cursor: pointer;
    display: none;
    height: 100%;
    outline: medium none;
    position: absolute;
    width: 35%;
    z-index: 1102;
}

#fancybox-left {
    left: 0;
}

#fancybox-right {
    right: 0;
}

#fancybox-left-ico, #fancybox-right-ico {
    cursor: pointer;
    display: block;
    height: 30px;
    left: -9999px;
    margin-top: -15px;
    position: absolute;
    top: 50%;
    width: 30px;
    z-index: 1102;
}

#fancybox-left-ico {
    background-image: url("fancybox/fancybox.png");
    background-position: -40px -30px;
}

#fancybox-right-ico {
    background-image: url("fancybox/fancybox.png");
    background-position: -40px -60px;
}

#fancybox-left:hover, #fancybox-right:hover {
    visibility: visible;
}

#fancybox-left:hover span {
    left: 20px;
}

#fancybox-right:hover span {
    left: auto;
    right: 20px;
}

.fancybox-bg {
    border: 0 none;
    height: 20px;
    margin: 0;
    padding: 0;
    position: absolute;
    width: 20px;
    z-index: 1001;
}

#fancybox-bg-n {
    background-image: url("fancybox/fancybox-x.png");
    left: 0;
    top: -20px;
    width: 100%;
}

#fancybox-bg-ne {
    background-image: url("fancybox/fancybox.png");
    background-position: -40px -162px;
    right: -20px;
    top: -20px;
}

#fancybox-bg-e {
    background-image: url("fancybox/fancybox-y.png");
    background-position: -20px 0;
    height: 100%;
    right: -20px;
    top: 0;
}

#fancybox-bg-se {
    background-image: url("fancybox/fancybox.png");
    background-position: -40px -182px;
    bottom: -20px;
    right: -20px;
}

#fancybox-bg-s {
    background-image: url("fancybox/fancybox-x.png");
    background-position: 0 -20px;
    bottom: -20px;
    left: 0;
    width: 100%;
}

#fancybox-bg-sw {
    background-image: url("fancybox/fancybox.png");
    background-position: -40px -142px;
    bottom: -20px;
    left: -20px;
}

#fancybox-bg-w {
    background-image: url("fancybox/fancybox-y.png");
    height: 100%;
    left: -20px;
    top: 0;
}

#fancybox-bg-nw {
    background-image: url("fancybox/fancybox.png");
    background-position: -40px -122px;
    left: -20px;
    top: -20px;
}

#fancybox-title {
    font-family: Helvetica;
    font-size: 12px;
    z-index: 1102;
}

.fancybox-title-inside {
    background: none repeat scroll 0 0 #FFFFFF;
    color: #333333;
    padding-bottom: 10px;
    position: relative;
    text-align: center;
}

.fancybox-title-outside {
    color: #FFFFFF;
    padding-top: 10px;
}

.fancybox-title-over {
    bottom: 0;
    color: #FFFFFF;
    left: 0;
    position: absolute;
    text-align: left;
}

#fancybox-title-over {
    background-image: url("fancybox/fancy_title_over.png");
    display: block;
    padding: 10px;
}

.fancybox-title-float {
    bottom: -20px;
    height: 32px;
    left: 0;
    position: absolute;
}

#fancybox-title-float-wrap {
    border: medium none;
    border-collapse: collapse;
    width: auto;
}

#fancybox-title-float-wrap td {
    border: medium none;
    white-space: nowrap;
}

#fancybox-title-float-left {
    background: url("fancybox/fancybox.png") no-repeat scroll -40px -90px rgba(0, 0, 0, 0);
    padding: 0 0 0 15px;
}

#fancybox-title-float-main {
    background: url("fancybox/fancybox-x.png") repeat scroll 0 -40px rgba(0, 0, 0, 0);
    color: #FFFFFF;
    font-weight: bold;
    line-height: 29px;
    padding: 0 0 3px;
}

#fancybox-title-float-right {
    background: url("fancybox/fancybox.png") no-repeat scroll -55px -90px rgba(0, 0, 0, 0);
    padding: 0 0 0 15px;
}

.fancybox-ie6 #fancybox-close {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-left-ico {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-right-ico {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-title-over {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-title-float-left {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-title-float-main {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-title-float-right {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie6 #fancybox-bg-w, .fancybox-ie6 #fancybox-bg-e, .fancybox-ie6 #fancybox-left, .fancybox-ie6 #fancybox-right, #fancybox-hide-sel-frame {
}

#fancybox-loading.fancybox-ie6 {
    margin-top: 0;
    position: absolute;
}

#fancybox-loading.fancybox-ie6 div {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.fancybox-ie .fancybox-bg {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
}

.fancybox-ie #fancybox-bg-n {
}

.fancybox-ie #fancybox-bg-ne {
}

.fancybox-ie #fancybox-bg-e {
}

.fancybox-ie #fancybox-bg-se {
}

.fancybox-ie #fancybox-bg-s {
}

.fancybox-ie #fancybox-bg-sw {
}

.fancybox-ie #fancybox-bg-w {
}

.fancybox-ie #fancybox-bg-nw {
}

form[role="search"] input[type="text"] {
    float: left;
    width: 130px;
}

form[role="search"] input[type="submit"] {
    background: url("../img/go.png") no-repeat scroll center center rgba(0, 0, 0, 0);
    float: left;
    margin-left: 5px;
    overflow: hidden;
    text-indent: -9999px;
    width: 25px;
}

.breadcrumbs {
    padding-bottom: 20px;
}

</style>
<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon/favicon.png">
</head>
<body>
<div id="axome_menu">
    <div id="bg_menufixed">
        <div class="container">
            <ul class="menu" id="menu-menu_sympa">
                <li class="nous-decouvrir menu-nous-decouvrir"><a href="/agence-communication-objet/"><i></i><span>Nous découvrir</span></a>
                </li>
                <li class="select-produits menu-selection-produits"><a
                        href="http://www.apasdegeant.fr/nos-objets-publicitaires-originaux/"><i></i><span>Sélection produits</span></a>
                </li>
                <li class="creations-mesure menu-creations-sur-mesure"><a
                        href="http://www.apasdegeant.fr/objet-publicitaire-personnalise/"><i></i><span>Créations sur mesure</span></a>
                </li>
                <li class="actu menu-blog"><a
                        href="http://www.apasdegeant.fr/home/actualites-objets-promotionnels/"><i></i><span>Blog</span></a>
                </li>
                <li class="confiance menu-nos-references"><a
                        href="http://www.apasdegeant.fr/ils-nous-font-confiance/"><i></i><span>Nos references</span></a>
                </li>
                <li class="charte-qualite menu-charte-qualite"><a
                        href="http://www.apasdegeant.fr/charte-qualite/"><i></i><span>Charte qualité</span></a></li>
                <li class="contact active menu-contactez-nous"><a
                        href="http://www.apasdegeant.fr/contactez-nous/"><i></i><span>Contactez nous</span></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.isotope.js"></script>
<script src="js/jquery.photos.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/modernizr.custom.28468.js"></script>
<script src="js/filter.js"></script>
<script src="js/cycle.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/easing.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39140201-1']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#Journee4').show("fast");
    hideClassJou();
    $('#Jou4').addClass("disabled");
});
$('#retour').click(function () {
    hideJournees();
    $('#allers').hide("fast");
    $('#retours').show("fast");
    $('#Journee12').show("fast");
    hideClassJou();
    $('#Jou12').addClass("disabled");
});
$('#aller').click(function () {
    hideJournees();
    $('#retours').hide("fast");
    $('#allers').show("fast");
    $('#Journee1').show("fast");
    hideClassJou();
    $('#Jou1').addClass("disabled");
});
$('#J1').click(function () {
    hideJournees();
    $('#Journee1').show("fast");
    hideClassJou();
    $('#Jou1').addClass("disabled");
});
$('#J2').click(function () {
    hideJournees();
    $('#Journee2').show("fast");
    hideClassJou();
    $('#Jou2').addClass("disabled");
});
$('#J3').click(function () {
    hideJournees();
    $('#Journee3').show("fast");
    hideClassJou();
    $('#Jou3').addClass("disabled");
});
$('#J4').click(function () {
    hideJournees();
    $('#Journee4').show("fast");
    hideClassJou();
    $('#Jou4').addClass("disabled");
});
$('#J5').click(function () {
    hideJournees();
    $('#Journee5').show("fast");
    hideClassJou();
    $('#Jou5').addClass("disabled");
});
$('#J6').click(function () {
    hideJournees();
    $('#Journee6').show("fast");
    hideClassJou();
    $('#Jou6').addClass("disabled");
});
$('#J7').click(function () {
    hideJournees();
    $('#Journee7').show("fast");
    hideClassJou();
    $('#Jou7').addClass("disabled");
});
$('#J8').click(function () {
    hideJournees();
    $('#Journee8').show("fast");
    hideClassJou();
    $('#Jou8').addClass("disabled");
});
$('#J9').click(function () {
    hideJournees();
    $('#Journee9').show("fast");
    hideClassJou();
    $('#Jou9').addClass("disabled");
});
$('#J10').click(function () {
    hideJournees();
    $('#Journee10').show("fast");
    hideClassJou();
    $('#Jou10').addClass("disabled");
});
$('#J11').click(function () {
    hideJournees();
    $('#Journee11').show("fast");
    hideClassJou();
    $('#Jou11').addClass("disabled");
});
$('#J12').click(function () {
    hideJournees();
    $('#Journee12').show("fast");
    hideClassJou();
    $('#Jou12').addClass("disabled");
});
$('#J13').click(function () {
    hideJournees();
    $('#Journee13').show("fast");
    hideClassJou();
    $('#Jou13').addClass("disabled");
});
$('#J14').click(function () {
    hideJournees();
    $('#Journee14').show("fast");
    hideClassJou();
    $('#Jou14').addClass("disabled");
});
$('#J15').click(function () {
    hideJournees();
    $('#Journee15').show("fast");
    hideClassJou();
    $('#Jou15').addClass("disabled");
});
$('#J16').click(function () {
    hideJournees();
    $('#Journee16').show("fast");
    hideClassJou();
    $('#Jou16').addClass("disabled");
});
$('#J17').click(function () {
    hideJournees();
    $('#Journee17').show("fast");
    hideClassJou();
    $('#Jou17').addClass("disabled");
});
$('#J18').click(function () {
    hideJournees();
    $('#Journee18').show("fast");
    hideClassJou();
    $('#Jou18').addClass("disabled");
});
$('#J19').click(function () {
    hideJournees();
    $('#Journee19').show("fast");
    hideClassJou();
    $('#Jou19').addClass("disabled");
});
$('#J20').click(function () {
    hideJournees();
    $('#Journee20').show("fast");
    hideClassJou();
    $('#Jou20').addClass("disabled");
});
$('#J21').click(function () {
    hideJournees();
    $('#Journee21').show("fast");
    hideClassJou();
    $('#Jou21').addClass("disabled");
});
$('#J22').click(function () {
    hideJournees();
    $('#Journee22').show("fast");
    hideClassJou();
    $('#Jou22').addClass("disabled");
});

function hideJournees() {
    $('#Journee1').hide("fast");
    $('#Journee2').hide("fast");
    $('#Journee3').hide("fast");
    $('#Journee4').hide("fast");
    $('#Journee5').hide("fast");
    $('#Journee6').hide("fast");
    $('#Journee7').hide("fast");
    $('#Journee8').hide("fast");
    $('#Journee9').hide("fast");
    $('#Journee10').hide("fast");
    $('#Journee11').hide("fast");
    $('#Journee12').hide("fast");
    $('#Journee13').hide("fast");
    $('#Journee14').hide("fast");
    $('#Journee15').hide("fast");
    $('#Journee16').hide("fast");
    $('#Journee17').hide("fast");
    $('#Journee18').hide("fast");
    $('#Journee19').hide("fast");
    $('#Journee20').hide("fast");
    $('#Journee21').hide("fast");
    $('#Journee22').hide("fast");
}
function hideClassJou() {
    $('#Jou1').removeClass("disabled");
    $('#Jou2').removeClass("disabled");
    $('#Jou3').removeClass("disabled");
    $('#Jou4').removeClass("disabled");
    $('#Jou5').removeClass("disabled");
    $('#Jou6').removeClass("disabled");
    $('#Jou7').removeClass("disabled");
    $('#Jou8').removeClass("disabled");
    $('#Jou9').removeClass("disabled");
    $('#Jou10').removeClass("disabled");
    $('#Jou11').removeClass("disabled");
    $('#Jou12').removeClass("disabled");
    $('#Jou13').removeClass("disabled");
    $('#Jou14').removeClass("disabled");
    $('#Jou15').removeClass("disabled");
    $('#Jou16').removeClass("disabled");
    $('#Jou17').removeClass("disabled");
    $('#Jou18').removeClass("disabled");
    $('#Jou19').removeClass("disabled");
    $('#Jou20').removeClass("disabled");
    $('#Jou21').removeClass("disabled");
    $('#Jou22').removeClass("disabled");
}
</script>
</body>
</html>
