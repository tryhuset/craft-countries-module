<?php
/**
 * Craft Countries Module module for Craft CMS 3.x
 *
 * Add list of countries
 *
 * @link      https://apt.no/
 * @copyright Copyright (c) 2018 Thomas Sømoen
 */

namespace apt\craftcountriesmodule;

use Craft;
use craft\events\RegisterTemplateRootsEvent;
use craft\events\TemplateEvent;
use craft\i18n\PhpMessageSource;
use craft\web\View;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\base\Module;

use apt\craftcountriesmodule\services\Service as ServiceService;
use apt\craftcountriesmodule\variables\CraftCountriesModuleVariable;



/**
 * Class CraftCountriesModule
 *
 * @author    Thomas Sømoen
 * @package   CraftCountriesModule
 * @since     1.0.0
 *
 * @property  ServiceService $service
 */
class CraftCountriesModule extends Module
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftCountriesModule
     */
    public static $instance;

    public static function register()
    {
        // Check to see if the Module is registered
        if (!Craft::$app->hasModule('countries')) {

            // Add it to the Craft::$app instance
            Craft::$app->setModule('countries', self::class);

            // Have Craft load this module right away
            // This ensures it can be used for templates
            Craft::$app->getModule('countries');
        }
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/craftcountriesmodule', $this->getBasePath());

        // Translation category
        $i18n = Craft::$app->getI18n();
        /** @noinspection UnSafeIsSetOverArrayInspection */
        if (!isset($i18n->translations[$id]) && !isset($i18n->translations[$id.'*'])) {
            $i18n->translations[$id] = [
                'class' => PhpMessageSource::class,
                'sourceLanguage' => 'en',
                'basePath' => '@modules/craftcountriesmodule/translations',
                'forceTranslation' => true,
                'allowOverrides' => true,
            ];
        }

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setComponents([
            'service' => ServiceService::class,
        ]);

        self::$instance = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('countries', CraftCountriesModuleVariable::class);
            }
        );

        Craft::info(
            Craft::t(
                'countries',
                '{name} module loaded',
                ['name' => 'Craft Countries Module']
            ),
            __METHOD__
        );
    }
}
