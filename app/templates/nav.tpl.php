<div class="wrapper">
    <nav>
        <?php foreach ($data as $value) : ?>
            <a href="<?php print $value['url']; ?>">
                <?php print $value['title']; ?>
            </a>
        <?php endforeach; ?>
    </nav>
</div>