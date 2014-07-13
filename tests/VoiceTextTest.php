<?php namespace VoiceText\Tests;

use \VoiceText\VoiceText;
use PHPUnit_Framework_TestCase;

require_once('config.php');
class VoiceTextTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var \VoiceText\VoiceText
	 */
	protected $voice;

	/**
	 * setup
	 * @return void
	 */
	public function setUp()
	{
		$this->voice = new VoiceText(API_KEY);
	}

	/**
	 * @expectedException \VoiceText\NotAuthorizedException
	 */
	public function testNotAuthorized()
	{
		$this->voice = new VoiceText('test');
		$this->voice->speaker('hikari')
			->text('今日も一日がんばるぞい！');

		$this->voice->get();
	}

	/**
	 * @expectedException \VoiceText\RequestErrorException
	 */
	public function testRequestError1()
	{
		$this->voice->text('今日も一日がんばるぞい！');

		$this->voice->get();
	}

	/**
	 * @expectedException \VoiceText\RequestErrorException
	 */
	public function testRequestError2()
	{
		$this->voice->speaker('hikari')
			->pitch(300)
			->text('今日も一日がんばるぞい！');

		$this->voice->get();
	}

	public function testVoiceGet1()
	{
		$this->voice->speaker('hikari')
			->emotion('happiness')
			->emotion_level(2)
			->pitch(150)
			->speed(120)
			->volume(150)
			->text('今日も一日がんばるぞい！');

		$this->voice->get();
	}

	public function testVoiceGet2()
	{
		$this->voice->setParams(array(
			'speaker' => 'hikari',
			'emotion' => 'happiness',
			'emotion_level' => 2,
			'pitch' => 150,
			'speed' => 120,
			'volume' => 150,
			'text' => '今日も一日がんばるぞい！'));

		$this->voice->get();
	}

}