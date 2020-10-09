<main class="main-background ">
    <h1>Feedbacks</h1>
        <div class="table_block">
            <?php print $data['table']; ?>
        </div>
        <div class="feedback-msg">
            <span>
                <a href="<?php print isset($data['link']) ? $data['link'] : null; ?>">
                    <?php print isset($data['feedbackMessage']) ? $data['feedbackMessage'] : null; ?>
                </a>
            </span>
        </div>
        <div><?php print isset($data['form']) ? $data['form'] : null; ?></div>
</main>

