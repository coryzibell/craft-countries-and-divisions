<?php
/**
 * Craft Countries and Divisions plugin for Craft CMS 3.x
 *
 * Endpoints, services, and twig tools for dealing with countries and their divisions.
 *
 * @link      https://www.twitter.com
 * @copyright Copyright (c) 2019 Cory Zibell
 */

namespace coryzibell\craftcountriesanddivisions\services;

use coryzibell\craftcountriesanddivisions\CraftCountriesAndDivisions;

use Craft;
use craft\base\Component;

/**
 * Country Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Cory Zibell
 * @package   CraftCountriesAndDivisions
 * @since     1.0.0
 */
class Country extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     CraftCountriesAndDivisions::$plugin->country->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';

        return $result;
    }
}
