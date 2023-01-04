<?php

$addon = rex_addon::get('cache_warm_up');

$form = rex_config_form::factory($addon->name);

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('cache_warm_up_config'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
