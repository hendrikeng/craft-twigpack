<?php
/**
 * Twigpack plugin for Craft CMS 3.x
 *
 * Twigpack is the conduit between Twig and webpack, with manifest.json &
 * webpack-dev-server HMR support
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

namespace nystudio107\twigpack\services;

use nystudio107\twigpack\Twigpack;
use nystudio107\twigpack\helpers\Manifest as ManifestHelper;

use craft\base\Component;

/** @noinspection MissingPropertyAnnotationsInspection */

/**
 * @author    nystudio107
 * @package   Twigpack
 * @since     1.0.0
 */
class Manifest extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * Return the HTML tags to include the CSS
     *
     * @param string     $moduleName
     * @param bool       $async
     * @param null|array $config
     *
     * @return null|string
     */
    public function getCssModuleTags(string $moduleName, bool $async = false, $config = null)
    {
        $settings = Twigpack::$plugin->getSettings();
        $config = $config ?? $settings->getAttributes();

        return ManifestHelper::getCssModuleTags($config, $moduleName, $async);
    }

    /**
     * Return the HTML tags to include the JavaScript module
     *
     * @param string     $moduleName
     * @param bool       $async
     * @param null|array $config
     *
     * @return null|string
     */
    public function getJsModuleTags(string $moduleName, bool $async = false, $config = null)
    {
        $settings = Twigpack::$plugin->getSettings();
        $config = $config ?? $settings->getAttributes();

        return ManifestHelper::getJsModuleTags($config, $moduleName, $async);
    }

    /**
     * Return the Safari 10.1 nomodule JavaScript fix
     *
     * @return null|string
     */
    public function getSafariNomoduleFix()
    {
        return ManifestHelper::getSafariNomoduleFix();
    }

    /**
     * Invalidate the manifest cache
     */
    public function invalidateCaches()
    {
        ManifestHelper::invalidateCaches();
    }
}
