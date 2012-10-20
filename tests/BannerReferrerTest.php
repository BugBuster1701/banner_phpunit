<?php
/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @link http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 *
 * Modul Banner - PHPUnit Class BannerReferrerTest
 *
 * PHP version 5
 * @copyright  Glen Langer 2007..2012
 * @author     Glen Langer
 * @package    PHPUnitBanner
 * @license    LGPL
 * @example    phpunit BannerReferrerTest
 *
 *             PHPUnit 3.4.13 by Sebastian Bergmann.
 *             ......
 *             Time: 4 seconds, Memory: 6.50Mb
 *             OK (16 tests, 12 assertions)
 */

namespace BugBuster\Banner;

/**
 * Initialize the system
 */
define('TL_MODE', 'FE');
require(dirname(dirname(dirname(dirname(__FILE__)))).'/initialize.php');

/**
 * PHPUnit Framework
 */
require_once 'PHPUnit/Framework.php';

/**
 * Class for testing
 */
require_once TL_ROOT . '/system/modules/banner/classes/BannerReferrer.php';

/**
 * Test class for BannerReferrer.
 */
class BannerReferrerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BannerReferrer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new BannerReferrer;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * Test for getVersion()
     */
    public function testGetVersion()
    {
    	$this->assertEquals('3.0.0', $this->object->getVersion());
    }

    /**
     * @todo Implement testCheckReferrer().
     */
    public function testCheckReferrer()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetReferrerDNS().
     */
    public function testGetReferrerDNS()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetReferrerFull().
     */
    public function testGetReferrerFull()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetHost().
     */
    public function testGetHost()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement test__toString().
     */
    public function test__toString()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
?>