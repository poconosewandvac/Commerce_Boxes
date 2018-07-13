<?php
namespace PoconoSewVac\Boxes\Admin\Widgets\Form;

use modmore\Commerce\Admin\Widgets\Form\SelectField;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

/**
 * LengthUnitField
 * 
 * @todo remove when 0.11.1 launches
 */
class LengthUnitField extends SelectField
{
    public function getOptions()
    {
        if (count($this->options) > 0) {
            return $this->options;
        }
        $options = [];
        /** @var \PhpUnitsOfMeasure\UnitOfMeasure[] $lengthUnits */
        $lengthUnits = Length::getUnitDefinitions();
        $allowedUnits = $this->commerce->getOption('commerce.allowed_length_units', null, 'mm,cm,m,in,ft');
        $allowedUnits = explode(',', strtolower($allowedUnits));
        $allowedUnits = array_map('trim', $allowedUnits);
        foreach ($lengthUnits as $definition) {
            $unitName = $definition->getName();
            if (count($allowedUnits) > 0 && in_array($unitName, $allowedUnits, true)) {
                $aliases = $definition->getAliases();
                $last = end($aliases);
                $options[] = [
                    'label' => !empty($last) ? $unitName . ' (' . $last . ')' : $unitName,
                    'value' => $unitName
                ];
            }
        }
        $this->options = $options;
        return $options;
    }
}