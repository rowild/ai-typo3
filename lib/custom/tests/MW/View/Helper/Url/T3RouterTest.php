<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2014-2020
 */


namespace Aimeos\MW\View\Helper\Url;


class T3RouterTest extends \PHPUnit\Framework\TestCase
{
	private $view;


	protected function setUp() : void
	{
		$this->view = new \Aimeos\MW\View\Standard();
	}


	protected function tearDown() : void
	{
		unset( $this->view );
	}


	public function testTransform()
	{
		$mock = $this->getMockBuilder( 'TYPO3\CMS\Core\Routing\RouterInterface' )
			->setMethods( array( 'generateUri', 'matchRequest' ) )->getMock();

		$stub = $this->getMockBuilder( 'Psr\Http\Message\UriInterface' )->getMock();

		$mock->expects( $this->once() )->method( 'generateUri' )->will( $this->returnValue( $stub ) );

		$object = new \Aimeos\MW\View\Helper\Url\T3Router( $this->view, $mock, [] );

		$this->assertEquals( '', $object->transform() );
	}
}