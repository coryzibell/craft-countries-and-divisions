<?php
/**
 * Craft Countries and Divisions plugin for Craft CMS 3.x
 *
 * Endpoints, services, and twig tools for dealing with countries and their divisions.
 *
 * @link      https://www.twitter.com
 * @copyright Copyright (c) 2019 Cory Zibell
 */

namespace coryzibell\craftcountriesanddivisions\controllers;

use coryzibell\craftcountriesanddivisions\services\Country;

use Craft;
use craft\web\Controller;

/**
 * Country Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Cory Zibell
 * @package   CraftCountriesAndDivisions
 * @since     1.0.0
 */
class CountryController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['get-all', 'get-countries', 'get-territories', 'get-territories-list'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/craft-countries-and-divisions/country/get
     *
     * @return mixed
     */

    public function actionGetAll()
    {
      $result = Country::getArray();

      return $this->asJson($result);
    }

    public function actionGetCountries()
    {
      $result = Country::getCountries();

      return $this->asJson($result);
    }

    public function actionGetTerritories()
    {
      $code = strtolower(Craft::$app->request->getParam('code'));

      $result = Country::getTerritories($code);

      return $this->asJson($result);
    }

    public function actionGetTerritoriesList()
    {
      $code = strtolower(Craft::$app->request->getParam('code'));

      $result = Country::getTerritoriesList($code);

      return $this->asJson($result);
    }
}
