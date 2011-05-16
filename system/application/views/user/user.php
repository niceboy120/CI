<?php include "header1.php"; ?>


<div id="content-wrap">

    <!-- ici commence le contenu -->


    <div id="main">

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">الإعدادات الشخصية</a></li>
                <li><a href="#tabs-2">ملء دفتر النصوص</a></li>
                <li><a href="#tabs-3">مشاهدة - طباعة دفتر النصوص</a></li>
                <li><a href="#tabs-4">كتابة جدول الحصص</a></li>
                <li><a href="#tabs-5">الإتصال بالمسؤول عن الموقع</a></li>
            </ul>
            <div id="tabs-1">
                <?php $this->load->view('user/informationsPerso'); ?>
            </div>
            <div id="tabs-2">
                <?php $this->load->view('user/ajouterAgenda'); ?>
            </div>
            <div id="tabs-3">
                <?php $this->load->view('user/afficherCahier'); ?>
            </div>
            <div id="tabs-4">

                <?php
                $this->load->view('user/afficherEmploi');
                ?>


            </div>
            <div id="tabs-5">

                <?php
                $this->load->view('user/afficherContact');
                ?>

            </div>
        </div>

        <p  class="Style741"><?php echo anchor('user/logout', 'الخروج'); ?></p>
    </div>

    <!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>

