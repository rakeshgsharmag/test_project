<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerUdaojyt\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerUdaojyt/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerUdaojyt.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerUdaojyt\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerUdaojyt\appDevDebugProjectContainer(array(
    'container.build_hash' => 'Udaojyt',
    'container.build_id' => '75f5befb',
    'container.build_time' => 1530268216,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerUdaojyt');