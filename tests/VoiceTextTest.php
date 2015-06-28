<?php namespace Fagai\VoiceText\Tests;

use \Fagai\VoiceText\VoiceText;
use PHPUnit_Framework_TestCase;

require_once('config.php');
class VoiceTextTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var \Fagai\VoiceText\VoiceText
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
	 * @expectedException \Fagai\VoiceText\NotAuthorizedException
	 */
	public function testNotAuthorized()
	{
		$this->voice = new VoiceText('test');
		$this->voice->speaker('hikari')
			->text('今日も一日がんばるぞい！');

		$this->voice->get();
	}

	/**
	 * @expectedException \Fagai\VoiceText\RequestErrorException
	 */
	public function testRequestError1()
	{
		$this->voice->text('今日も一日がんばるぞい！');

		$this->voice->get();
	}

	/**
	 * @expectedException \Fagai\VoiceText\RequestErrorException
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

	public function testVoiceGet3()
	{
		$this->voice = new VoiceText(API_KEY,
			array(
				'speaker' => 'hikari',
				'emotion' => 'happiness',
				'emotion_level' => 2,
				'pitch' => 150,
				'speed' => 120,
				'volume' => 150,
				'text' => '今日も一日がんばるぞい！'));

		$this->voice->get();
	}

	public function testVoiceGetOgg()
	{
		$this->voice = new VoiceText(API_KEY,
			array(
				'format' => 'ogg',
				'speaker' => 'hikari',
				'text' => '今日も一日がんばるぞい！'));

		$this->voice->get();
	}

	public function testVoiceGetAac()
	{
		$this->voice = new VoiceText(API_KEY,
			array(
				'format' => 'aac',
				'speaker' => 'hikari',
				'text' => '今日も一日がんばるぞい！'));

		$this->voice->get();
	}

}