<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'facebook/graph-sdk' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '>=5.7.0',
            ),
        ),
        'nickdnk/graph-sdk' => array(
            'pretty_version' => '7.0.1',
            'version' => '7.0.1.0',
            'reference' => 'd7fbb76c8ade978b508e8c3ddd30712d62c456b9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../nickdnk/graph-sdk',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
