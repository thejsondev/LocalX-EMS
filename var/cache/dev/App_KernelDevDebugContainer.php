<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container9JXEIOL\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container9JXEIOL/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container9JXEIOL.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container9JXEIOL\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container9JXEIOL\App_KernelDevDebugContainer([
    'container.build_hash' => '9JXEIOL',
    'container.build_id' => 'f1e6588d',
    'container.build_time' => 1719320000,
], __DIR__.\DIRECTORY_SEPARATOR.'Container9JXEIOL');