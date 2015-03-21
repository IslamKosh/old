<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;

class Builder
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root')->setChildrenAttribute('class', 'aui-nav');

        $menu->addChild('Dashboard', array('route' => 'homepage'));
        $menu->addChild('Jobs', array('route' => 'jobs'));

        return $menu;
    }
}