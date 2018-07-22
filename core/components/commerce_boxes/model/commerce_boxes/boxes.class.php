<?php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

/**
 * Boxes for Commerce.
 *
 * Copyright 2018 by Tony Klapatch <tony@klapatch.net>
 *
 * This file is meant to be used with Commerce by modmore. A valid Commerce license is required.
 *
 * @package commerce_boxes
 * @license See core/components/commerce_boxes/docs/license.txt
 */
class Boxes extends comSimpleObject
{
    /**
     * Gets the dimension unit used.
     *
     * @return String
     */
    public function getDimensionUnit()
    {
        return $this->get('dimension_unit');
    }

    /**
     * Gets the weight unit used.
     *
     * @return String
     */
    public function getWeightUnit()
    {
        return $this->get('weight_unit');
    }

    /**
     * Gets the length.
     *
     * @return Length
     */
    public function getLength()
    {
        $length = $this->get('length');

        return new Length($length, $this->getWeightUnit());
    }

    /**
     * Gets the width.
     *
     * @return Length
     */
    public function getWidth()
    {
        $width = $this->get('width');

        return new Length($length, $this->getWeightUnit());
    }

    /**
     * Gets the height.
     *
     * @return Length
     */
    public function getHeight()
    {
        $height = $this->get('height');

        return new Length($height, $this->getWeightUnit());
    }

    /**
     * Gets the minimum weight.
     *
     * @return Mass
     */
    public function getMinWeight()
    {
        $weight = $this->get('min_weight');

        return new Mass($weight, $this->getWeightUnit());
    }

    /**
     * Gets the maximum weight.
     *
     * @return Mass
     */
    public function getMaxWeight()
    {
        $weight = $this->get('max_weight');

        return new Mass($weight, $this->getWeightUnit());
    }
}
