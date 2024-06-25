<?php

namespace Container9JXEIOL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LKTtRDzService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.LKTtRDz' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.LKTtRDz'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\EmployeeController::create' => ['privates', '.service_locator.xfzDO2y', 'get_ServiceLocator_XfzDO2yService', true],
            'App\\Controller\\EmployeeController::delete' => ['privates', '.service_locator.9_CHdI4', 'get_ServiceLocator_9CHdI4Service', true],
            'App\\Controller\\EmployeeController::index' => ['privates', '.service_locator.TrWUHeQ', 'get_ServiceLocator_TrWUHeQService', true],
            'App\\Controller\\EmployeeController::show' => ['privates', '.service_locator.Eyr3Ptw', 'get_ServiceLocator_Eyr3PtwService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Controller\\EmployeeController:create' => ['privates', '.service_locator.xfzDO2y', 'get_ServiceLocator_XfzDO2yService', true],
            'App\\Controller\\EmployeeController:delete' => ['privates', '.service_locator.9_CHdI4', 'get_ServiceLocator_9CHdI4Service', true],
            'App\\Controller\\EmployeeController:index' => ['privates', '.service_locator.TrWUHeQ', 'get_ServiceLocator_TrWUHeQService', true],
            'App\\Controller\\EmployeeController:show' => ['privates', '.service_locator.Eyr3Ptw', 'get_ServiceLocator_Eyr3PtwService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
        ], [
            'App\\Controller\\EmployeeController::create' => '?',
            'App\\Controller\\EmployeeController::delete' => '?',
            'App\\Controller\\EmployeeController::index' => '?',
            'App\\Controller\\EmployeeController::show' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\EmployeeController:create' => '?',
            'App\\Controller\\EmployeeController:delete' => '?',
            'App\\Controller\\EmployeeController:index' => '?',
            'App\\Controller\\EmployeeController:show' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}