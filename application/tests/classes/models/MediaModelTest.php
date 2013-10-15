<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Unit tests for the media model
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application\Tests
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License Version 3 (GPLv3)
 */

class MediaModelTest extends Unittest_TestCase {

	/**
	 * Provider for test_validate_valid
	 *
	 * @access public
	 * @return array
	 */
	public function provider_validate_valid()
	{
		return array(
			array(
				// Valid form data
				array(
					'id' => 1,
					'caption' => 'at cocolin',
					'file_url' => 'http://domain.com/imagefly/w420-h420/media/uploads',
					'mime' => 'image/jpeg',
					'o_filename' => '9ze_1381815819_o.jpg',
					'o_width' => 600,
					'o_height'=> 700,
					'created' => '1381815821',
					'updated' => '1381815819',
				)
			),
			array(
				// Valid form data
				array(
					'id' => 2,
					'caption' => 'at sendai',
					'file_url' => 'http://domain.com/imagefly/w420-h420/media/uploads',
					'mime' => 'image/jpeg',
					'o_filename' => '9ze_1381815819_o.jpg',
					'o_width' => 500,
					'o_height'=> 600,
					'created' => '1381815821',
					'updated' => '1381815819',
				)
			),
			array(
				// Valid form data
				array(
					'id' => 3,
					'caption' => 'ihub',
					'file_url' => 'http://domain.com/imagefly/w420-h420/media/uploads',
					'mime' => 'image/jpeg',
					'o_filename' => '9ze_1381815819_o.jpg',
					'o_width' => 600,
					'o_height'=> 700,
					'created' => '1381815821',
					'updated' => '1381815819',
				)
			),
		);
	}

	/**
	 * Provider for test_validate_invalid
	 *
	 * @access public
	 * @return array
	 */
	public function provider_validate_invalid()
	{
		return array(
			array(
				// Invalid media data 1 - No Data
				array()
			),
			array(
				// Valid media data
				array(
					'id' => 2,
					'caption' => 'at sendai',
					'file_url' => 'http://domain.com/imagefly/w420-h420/media/uploads',
					'mime' => 'image/jpeg',
					'o_filename' => '9ze_1381815819_o.jpg',
					'o_width' => 500,
					'o_height'=> 600,
					'created' => '1381815821',
					'updated' => '1381815819',
				)
			),
			array(
				// Valid form data
				array(
					'id' => 3,
					'caption' => 'ihub',
					'file_url' => 'http://domain.com/imagefly/w420-h420/media/uploads',
					'mime' => 'image/jpeg',
					'o_filename' => '9ze_1381815819_o.jpg',
					'o_width' => 600,
					'o_height'=> 700,
					'created' => '1381815821',
					'updated' => '1381815819',
				)
			),
		);
	}

	/**
	 * Test Validate Valid Entries
	 *
	 * @dataProvider provider_validate_valid
	 * @return void
	 */
	public function test_validate_valid($set)
	{
		$media = ORM::factory('Media');
		$media->values($set);

		try
		{
			$media->check();
		}
		catch (ORM_Validation_Exception $e)
		{
			$this->fail('This entry qualifies as invalid when it should be valid: '.json_encode($e->errors('models')));
		}
	}

}