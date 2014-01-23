<?php 

/**
 * Contao Open Source CMS, Copyright (C) 2005-2014 Leo Feyer
 *
 * Modul Banner - PHPUnit Class BannerImageTest
 * 
 * @copyright  Glen Langer 2007..2014 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    PHPUnitBanner
 * @license    LGPL
 * @filesource
 * @see        https://github.com/BugBuster1701/banner
 *
 *             PHPUnit 3.6.10 by Sebastian Bergmann.
 *             ............
 *             Time: 0 seconds, Memory: 5.00Mb
 *             OK (12 tests, 12 assertions)
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
//require_once 'PHPUnit/Framework.php'; // nur bei PHPUNIT 3.4

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
     * Test for getReferrerDNS()
     * 
     * @dataProvider providerreferrerdns
     */
    public function testGetReferrerDNS($result, $host, $referrer)
    {
    	if (isset($_SERVER['HTTP_HOST']))     { unset($_SERVER['HTTP_HOST']); }
    	if (isset($_SERVER['HTTP_REFERER']))  { unset($_SERVER['HTTP_REFERER']); }
    	
        if ($host     !== false) { $_SERVER['HTTP_HOST']    = $host; }
    	if ($referrer !== false) { $_SERVER['HTTP_REFERER'] = $referrer; }
    	
    	
		$this->object->checkReferrer();
    	
		//Result must be equal
		$this->assertEquals($result,$this->object->getReferrerDNS());
    }
    public function providerreferrerdns()
    {
        return array(//result,own host,referrer
                array('w', 'www.domain.lan', ''),
                array('w', 'www.domain.lan', '-'),
                array('w', 'www.domain.lan', false),
                array('o', 'www.domain.lan', 'http://www.domain.lan/ref/test.html'),
                array('www.domain42.lan', 'www.domain.lan', 'http://www.domain42.lan/ref/test.html')
        );
    }
    
    /**
     * Test for getHost().
     * 
     * @dataProvider providerreferrerhost
     */
    public function testGetHost($result, $host, $server_name, $forwarded_host)
    {
    	if (isset($_SERVER['HTTP_HOST']))             { unset($_SERVER['HTTP_HOST']); }
    	if (isset($_SERVER['SERVER_NAME']))           { unset($_SERVER['SERVER_NAME']); }
    	if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) { unset($_SERVER['HTTP_X_FORWARDED_HOST']); }
    	//ohne Referrer keine weiteren Tests
    	$_SERVER['HTTP_REFERER'] = 'http://www.domain42.lan/ref/test.html';
    	
    	if ($host           !== false) { $_SERVER['HTTP_HOST']             = $host; }
    	if ($server_name    !== false) { $_SERVER['SERVER_NAME']           = $server_name; }
    	if ($forwarded_host !== false) { $_SERVER['HTTP_X_FORWARDED_HOST'] = $forwarded_host; }

    	$this->object->checkReferrer();
    	
    	//Result must be equal
    	$this->assertEquals($result,$this->object->getHost());
    }
    public function providerreferrerhost()
    {
        return array(//result,own host, server_name, forwarded_host
                array(''			   , false			  , false			 , false),
                array('www.domainh.lan', 'www.domainh.lan', false			 , false),
                array('www.domainn.lan', false			  , 'www.domainn.lan', false),
                array('www.domainf.lan', 'www.domainh.lan', false			 , 'www.domainf.lan'),
                array('www.domainf.lan', false			  , 'www.domainn.lan', 'www.domainf.lan'),
        		array('www.domainf.lan', false			  , false			 , 'www.domainf.lan')
        );
    }

}
?>