<?php

namespace Puphpet\Extension\RabbitMQBundle;

use Puphpet\MainBundle\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class Configure extends Extension\ExtensionAbstract
{
    protected $name = 'RabbitMQ';
    protected $slug = 'rabbitmq';
    protected $targetFile = 'puphpet/puppet/nodes/rabbitmq.pp';

    protected $sources = [
        'rabbitmq' => ":git => 'https://github.com/puphpet/puppetlabs-rabbitmq.git'",
        'staging'  => ":git => 'https://github.com/puphpet/puppet-staging.git'",
        'erlang'   => ":git => 'https://github.com/garethr/garethr-erlang.git'",
    ];

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->dataLocation = __DIR__ . '/Resources/config';

        parent::__construct($container);
    }

    public function getFrontController()
    {
        return $this->container->get('puphpet.extension.rabbitmq.front_controller');
    }

    public function getManifestController()
    {
        return $this->container->get('puphpet.extension.rabbitmq.manifest_controller');
    }
}
