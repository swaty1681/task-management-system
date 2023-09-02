<header>
    <div class="header-wrapper">
        <div>Lyncdigit Labs</div>
        <div>
            <?php
            if (isset($_SESSION['tms_userid'])) {
                echo "Hello " . $_SESSION['tms_userid'];
            }
            ?>
        </div>
    </div>
</header>