<?php
/**
 * Craft Countries Module module for Craft CMS 3.x
 *
 * Add list of countries
 *
 * @link      https://apt.no/
 * @copyright Copyright (c) 2018 Thomas Sømoen
 */

namespace apt\craftcountriesmodule\services;

use Craft;
use craft\base\Component;
use apt\craftcountriesmodule\CraftCountriesModule;
use apt\craftcountriesmodule\utils\Countries;


/**
 * @author    Thomas Sømoen
 * @package   CraftCountriesModule
 * @since     1.0.0
 */
class Service extends Component
{
    private $countries;

    public function init(): void
    {
        $this->countries = new Countries();
        parent::init();
    }

    // Public Methods
    // =========================================================================

    public function getCountryByCode($code)
    {
        return $this->countries->getCountryByCode($code);
    }

    /*
     * @return mixed
     */
    public function getCountries()
    {
        return $this->countries->getCountries();
    }
}
