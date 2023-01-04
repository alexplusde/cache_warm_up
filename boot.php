<?php

if (rex::isBackend() && rex_be_controller::getCurrentPage() == 'system/cache_warm_up') {
    rex_view::addJsFile($this->getAssetsUrl('cache_warm_up_progress.js'));
}
