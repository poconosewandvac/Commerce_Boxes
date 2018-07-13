<?php
namespace PoconoSewVac\Boxes\Modules;

use modmore\Commerce\Admin\Generator;
use modmore\Commerce\Events\Admin\GeneratorEvent;
use modmore\Commerce\Events\Admin\TopNavMenu as TopNavMenuEvent;
use modmore\Commerce\Modules\BaseModule;
use Symfony\Component\EventDispatcher\EventDispatcher;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

class Boxes extends BaseModule
{

    public function getName()
    {
        $this->adapter->loadLexicon('commerce_boxes:default');
        return $this->adapter->lexicon('commerce_boxes');
    }

    public function getAuthor()
    {
        return 'Tony Klapatch';
    }

    public function getDescription()
    {
        return $this->adapter->lexicon('commerce_boxes.description');
    }

    public function initialize(EventDispatcher $dispatcher)
    {
        // Load our lexicon
        $this->adapter->loadLexicon('commerce_boxes:default');

        // Add the xPDO package, so Commerce can detect the derivative classes
        $root = dirname(dirname(__DIR__));
        $path = $root . '/model/';
        $this->adapter->loadPackage('commerce_boxes', $path);

        // Load menu & page
        $dispatcher->addListener(\Commerce::EVENT_DASHBOARD_INIT_GENERATOR, array($this, 'loadPage'));
        $dispatcher->addListener(\Commerce::EVENT_DASHBOARD_GET_MENU, array($this, 'loadMenuItem'));
    }

    public function loadPage(GeneratorEvent $event)
    {
        $generator = $event->getGenerator();
        $generator->addPage('boxes', '\PoconoSewVac\Boxes\Admin\Boxes\Overview');
        $generator->addPage('boxes/create', '\PoconoSewVac\Boxes\Admin\Boxes\Create');
        $generator->addPage('boxes/update', '\PoconoSewVac\Boxes\Admin\Boxes\Update');
        $generator->addPage('boxes/delete', '\PoconoSewVac\Boxes\Admin\Boxes\Delete');
    }

    public function loadMenuItem(TopNavMenuEvent $event)
    {
        $items = $event->getItems();

        $items = $this->insertInArray($items, ['boxes' => [
            'name' => $this->adapter->lexicon('commerce_boxes'),
            'key' => 'boxes',
            'icon' => 'icon cubes',
            'link' => $this->adapter->makeAdminUrl('boxes'),
            'submenu' => [
                [
                    'name' => $this->adapter->lexicon('commerce_boxes'),
                    'key' => 'boxes',
                    'link' => $this->adapter->makeAdminUrl('boxes')
                ],
            ]
        ]], 3);

        $event->setItems($items);
    }

    private function insertInArray($array, $values, $offset)
    {
        return array_slice($array, 0, $offset, true) + $values + array_slice($array, $offset, null, true);
    }

    public function getModuleConfiguration(\comModule $module)
    {
        $fields = [];

//        $fields[] = new DescriptionField($this->commerce, [
//            'description' => $this->adapter->lexicon('commerce_boxes.module_description'),
//        ]);

        return $fields;
    }
}
