<?php

namespace Container9JXEIOL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_XfzDO2yService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.xfzDO2y' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.xfzDO2y'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'employeeRepository' => ['privates', 'App\\Repository\\EmployeeRepository', 'getEmployeeRepositoryService', true],
            'serializer' => ['privates', 'debug.serializer', 'getDebug_SerializerService', true],
            'validator' => ['privates', 'debug.validator', 'getDebug_ValidatorService', false],
        ], [
            'employeeRepository' => 'App\\Repository\\EmployeeRepository',
            'serializer' => '?',
            'validator' => '?',
        ]);
    }
}
