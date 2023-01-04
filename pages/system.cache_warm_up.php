<?php

$addon = rex_addon::get('cache_warm_up');
$fragment = new rex_fragment();


$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('cache_warm_up_config'), false);
$fragment->setVar('body', $fragment->parse("cache_warm_up_settings_progress.php"), false);
echo $fragment->parse('core/page/section.php');
