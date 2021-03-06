<div <?php print $attributes; ?>>
    <header class="l-header" role="banner">
        <div class="l-branding">
            <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
            <?php endif; ?>
            <?php print render($page['branding']); ?>
        </div>

        <?php print render($page['header']); ?>
        <?php print render($page['navigation']); ?>
    </header>

    <div class="l-main">
        <?php print render($page['highlighted']); ?>
        <?php print render($page['featured']); ?>
        <?php print render($page['slider']); ?>
        <?php print $messages; ?>
        <?php print render($page['disruptive']); ?>
        <div class="l-content" role="main">
            <a id="main-content"></a>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            <?php print render($page['news']); ?>
            <?php print render($page['misc']); ?>
            <?php //print $feed_icons; ?>
        </div>
    </div>
    <footer class="l-footer" role="contentinfo">
        <?php print render($page['footer']); ?>
        <?php print render($page['footer_bottom']); ?>
    </footer>
</div>
