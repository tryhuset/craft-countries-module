<?php
/**
 * Craft Countries Module module for Craft CMS 3.x
 *
 * Add list of countries
 *
 * @link      https://apt.no/
 * @copyright Copyright (c) 2018 Thomas Sømoen
 */

namespace apt\craftcountriesmodule\models;

use Craft;
use craft\base\Model;
use apt\craftcountriesmodule\CraftCountriesModule;
use apt\craftcountriesmodule\validators\CountryValidator;



/**
 * @author    Thomas Sømoen
 * @package   CraftCountriesModule
 * @since     1.0.0
 */
class Country extends Model
{
    /**
     * @var string
     */
    public $code = '';

    /**
     * @var string
     */
    public $name = '';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['code', 'name'], 'default', 'value' => ''],
            ['code', CountryValidator::class],
        ];
    }
}
