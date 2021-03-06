<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JFormFieldImageList.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Form
 * @since       12.1
 */
class JFormFieldImageListTest extends TestCase
{
	/**
	 * Sets up dependencies for the test.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	protected function setUp()
	{
		parent::setUp();

		require_once JPATH_PLATFORM . '/joomla/form/fields/imagelist.php';
		include_once dirname(__DIR__) . '/inspectors.php';
	}

	/**
	 * Test the getInput method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testGetInput()
	{
		$form = new JFormInspector('form1');

		$this->assertThat(
			$form->load('<form><field name="imagelist" type="imagelist" /></form>'),
			$this->isTrue(),
			'Line:' . __LINE__ . ' XML string should load successfully.'
		);

		$field = new JFormFieldImageList($form);

		$this->assertThat(
			$field->setup($form->getXml()->field, 'value'),
			$this->isTrue(),
			'Line:' . __LINE__ . ' The setup method should return true.'
		);

		$this->assertThat(
			strlen($field->input),
			$this->greaterThan(0),
			'Line:' . __LINE__ . ' The getInput method should return something without error.'
		);

		// TODO: Should check all the attributes have come in properly.
	}
}
