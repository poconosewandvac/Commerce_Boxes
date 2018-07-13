<?php
namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Widgets\FormWidget;
use modmore\Commerce\Admin\Widgets\Form\TextField;
use modmore\Commerce\Admin\Widgets\Form\NumberField;
use modmore\Commerce\Admin\Widgets\Form\WeightUnitField;
use modmore\Commerce\Admin\Widgets\Form\Tab;
use modmore\Commerce\Admin\Widgets\Form\ClassField;
use modmore\Commerce\Admin\Widgets\Form\Validation\Regex;
use modmore\Commerce\Admin\Widgets\Form\Validation\Required;
// For 0.11 and below, since LengthUnitField is not included in core.
use PoconoSewVac\Boxes\Admin\Widgets\Form\LengthUnitField;

/**
 * Form to add/edit boxes.
 * @package PoconoSewVac\Boxes
 */
class Form extends FormWidget
{
    protected $classKey = 'Boxes';
    public $key = 'boxes-form';
    public $title = '';
    protected $referrerId = 0;

    public function getFields(array $options = array())
    {
        $fields = [];

        if ($this->record->get('id')) {
            $this->referrerId = $this->record->get('id');
        }

        $fields[] = new Tab($this->commerce, [
            'label' => $this->adapter->lexicon('commerce.general'),
        ]);

        $fields[] = new ClassField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce.class_key'),
            'name' => 'class_key',
            'description' => $this->adapter->lexicon('commerce.class_key.description'),
            'parentClass' => 'Boxes',
            'validation' => [
                new Required()
            ]
        ]);

        $fields[] = new TextField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.name'),
            'name' => 'name',
            'description' => $this->adapter->lexicon('commerce_boxes.name_desc'),
            'validation' => [
                new Required()
            ]
        ]);

        $fields[] = new LengthUnitField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.dimension_unit'),
            'description' => $this->adapter->lexicon('commerce_boxes.dimension_unit_desc'),
            'name' => 'dimension_unit',
            'validation' => [
                new Required()
            ]
        ]);

        $fields[] = new TextField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.length'),
            'name' => 'length',
            'validation' => [
                new Required(),
                new Regex('/^\d*\.?\d*$/', 'commerce_boxes.invalid_dimension')
            ]
        ]);

        $fields[] = new TextField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.width'),
            'name' => 'width',
            'validation' => [
                new Required(),
                new Regex('/^\d*\.?\d*$/', 'commerce_boxes.invalid_dimension')
            ]
        ]);

        $fields[] = new TextField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.height'),
            'name' => 'height',
            'validation' => [
                new Required(),
                new Regex('/^\d*\.?\d*$/', 'commerce_boxes.invalid_dimension')
            ]
        ]);

        $fields[] = new Tab($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.items'),
        ]);

        $fields[] = new NumberField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.min_items'),
            'description' => $this->adapter->lexicon('commerce_boxes.min_items_desc'),
            'name' => 'min_items'
        ]);

        $fields[] = new NumberField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.max_items'),
            'description' => $this->adapter->lexicon('commerce_boxes.max_items_desc'),
            'name' => 'max_items'
        ]);

        $fields[] = new Tab($this->commerce, [
            'label' => $this->adapter->lexicon('commerce.weight'),
        ]);

        $fields[] = new WeightUnitField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.weight_unit'),
            'description' => $this->adapter->lexicon('commerce_boxes.weight_unit_desc'),
            'name' => 'weight_unit'
        ]);

        $fields[] = new TextField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.min_weight'),
            'name' => 'min_weight',
            'validation' => [
                new Required(),
                new Regex('/^\d*\.?\d*$/', 'commerce_boxes.invalid_weight')
            ]
        ]);

        $fields[] = new TextField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_boxes.max_weight'),
            'name' => 'max_weight',
            'validation' => [
                new Required(),
                new Regex('/^\d*\.?\d*$/', 'commerce_boxes.invalid_weight')
            ]
        ]);

        return $fields;
    }

    public function getFormAction(array $options = array())
    {
        if ($this->record->get('id')) {
            return $this->adapter->makeAdminUrl('boxes/update', ['id' => $this->record->get('id')]);
        }
        return $this->adapter->makeAdminUrl('boxes/create');
    }
}