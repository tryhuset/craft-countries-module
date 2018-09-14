<?php
namespace apt\craftcountriesmodule\validators;

use yii\validators\Validator;
use apt\craftcountriesmodule\utils\Countries;

class CountryValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $countries = new Countries();
        $country = $countries->getCountryByCode($model->$attribute);

        if (!$country) {
            $this->addError($model, $attribute, '"{code}" is not a valid country code', ['code' => $model->$attribute]);
        }
    }
}
