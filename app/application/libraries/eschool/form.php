<?php namespace Eschool;

class Form extends \Laravel\Form
{
    /**
     * Constructs a Bootstrap Control Group
     *
     * @link https://github.com/eschool/sis/wiki/forms
     * @link http://twitter.github.com/bootstrap/base-css.html#forms
     * @link sis/application/libraries/eschool/form.php
     * @author Kyle Decot <kyle.decot@eschoolconsultants.com> March 12, 2012
     * @author (Moved Here & Modified By) David Varney
     * @return string HTML
     * **NOTE** This was ripped from eSchool Consultants SIS (see link above)
     */
    public static function control_group($label = '', $controls = '', $include_label = true)
    {
        if ($controls instanceof Closure) {
            $controls = $controls();
        }
        $label_output = '';
        if($include_label && $label != ''){
            $label_output = '<label class = "control-label">' . $label . '</label>';
        }
        return '<div class = "control-group">' . $label_output . '<div class = "controls">' . $controls . '</div></div>';
    }

    /**
     * Bootstrapped form submit button
     * @link sis/application/libraries/eschool/form.php
     * @author Kyle Decot <kyle.decot@eschoolconsultants.com> July 17, 2012
     * @author (Moved Here & Modified By) David Varney
     * @return string HTML
     * **NOTE** This was ripped from eSchool Consultants SIS (see link above)
     */
    public static function submit($value, $attributes = array())
    {
        $defaults = array('class' => 'btn btn-primary');
        $attributes = $defaults + $attributes;

        return parent::button($value, $attributes);
    }
}
