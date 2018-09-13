<?php
/**
 * Craft Countries Module module for Craft CMS 3.x
 *
 * Add list of countries
 *
 * @link      https://apt.no/
 * @copyright Copyright (c) 2018 Thomas Sømoen
 */

namespace apt\craftcountriesmodule\variables;

use apt\craftcountriesmodule\CraftCountriesModule;

use Craft;

/**
 * @author    Thomas Sømoen
 * @package   CraftCountriesModule
 * @since     1.0.0
 */
class CraftCountriesModuleVariable
{
    // Public Methods
    // =========================================================================

    /**
     * @param null $optional
     * @return array
     */
    public function list()
    {
        return CraftCountriesModule::getInstance()->service->getCountries();
    }

    /**
     * @param string $code
     * @return Country
     */
    public function get($code)
    {
        return CraftCountriesModule::getInstance()->service->getCountryByCode($code);
    }
}
