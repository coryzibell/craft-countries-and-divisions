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

    public function getJson() {
        // Grab the contents of the JSON file
        $jsonContents = file_get_contents('../lib/data.json');
        return $jsonContents;
    }

    public function getArray() {
        // Convert the JSON file into an associative array
        $array = json_decode(getJson(), true);
        return $array;
    }

    public function getCountries() {
        // Return the full data array into a key->value array
        $array = getArray();
        $returnArray = [];
        foreach($array as $key => $value) {
            $returnArray[$key] = $value['name'];
        }
        return $returnArray;
    }

    public function getCountriesReverse() {
        // Return the full data array as a reverse key->value array
        $array = getCountries();
        $returnArray = [];
        foreach($array as $key => $value) {
            $returnArray[$value] = $key;
        }
    }

    public function getTerritories($isoCode) {
        // Return an associative array of territories for a country
        $array = getArray();
        foreach($array as $key => $value) {
            if ($isoCode == $key) {
                return $value['divisions'];
                break;
            }
        }
    }

    public function getTerritoriesList($isoCode) {
        // Return an array of territories for a country
        $array = getArray();
        $returnTerritories = [];
        foreach($array as $key => $value) {
            if ($isoCode == $key) {
                foreach($value as $key => $value) {
                    array_push($returnTerritories, $value);
                }
                return $returnTerritories;
                break;
            }
        }
    }
}