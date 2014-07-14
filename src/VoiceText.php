<?php namespace Fagai\VoiceText;

/**
 * Voice Text Web API Beta Library
 * Class VoiceText
 * @package Fagai\VoiceText
 */

use Fagai\VoiceText\RequestErrorException;
use Fagai\VoiceText\NotAuthorizedException;
use Fagai\VoiceText\HttpNotFoundException;
use Fagai\VoiceText\HttpMethodErrorException;
use Fagai\VoiceText\ServerErrorException;
use Fagai\VoiceText\ServiceErrorException;

class VoiceText
{
	/**
	 * API URL
	 * @var string
	 */
	protected $url = 'https://api.voicetext.jp/v1/tts';

	/**
	 * API Key String
	 * @var string
	 */
	protected $apiKey;

	/**
	 * Voice Text API Parameter
	 * @var array
	 */
	protected $params;

	/**
	 * @param $apiKey
	 * @param array $params
	 */
	function __construct($apiKey, $params = array())
	{
		$this->apiKey = $apiKey;
		$this->params = $params;
	}

	/**
	 * @param $params
	 * @return $this
	 */
	public function setParams($params)
	{
		$this->params = array_merge($this->params, $params);
		return $this;
	}

	/**
	 * @param $text
	 * @return $this
	 */
	public function text($text)
	{
		$this->params['text'] = $text;
		return $this;
	}

	/**
	 * @param $speaker
	 * @return $this
	 */
	public function speaker($speaker)
	{
		$this->params['speaker'] = $speaker;
		return $this;
	}

	/**
	 * @param $emotion
	 * @return $this
	 */
	public function emotion($emotion)
	{
		$this->params['emotion'] = $emotion;
		return $this;
	}

	/**
	 * @param $emotion_level
	 * @return $this
	 */
	public function emotion_level($emotion_level)
	{
		$this->params['emotion_level'] = $emotion_level;
		return $this;
	}

	/**
	 * @param $pitch
	 * @return $this
	 */
	public function pitch($pitch)
	{
		$this->params['pitch'] = $pitch;
		return $this;
	}

	/**
	 * @param $speed
	 * @return $this
	 */
	public function speed($speed)
	{
		$this->params['speed'] = $speed;
		return $this;
	}

	/**
	 * @param $volume
	 * @return $this
	 */
	public function volume($volume)
	{
		$this->params['volume'] = $volume;
		return $this;
	}


	/**
	 * get voice text binary
	 * @return string
	 * @throws RequestErrorException
	 * @throws \Exception
	 * @throws NotAuthorizedException
	 * @throws ServiceErrorException
	 * @throws HttpNotFoundException
	 * @throws ServerErrorException
	 * @throws HttpMethodErrorException
	 */
	public function get()
	{
		$data = "";
		foreach($this->params as $key => $val)
		{
			$data .= rawurlencode($key) . '=' . rawurlencode($val) . '&';
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$result = curl_exec($ch);

		// error check
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		switch($httpCode)
		{
			case 400:
				throw new RequestErrorException;
				break;
			case 401:
				throw new NotAuthorizedException;
				break;
			case 404:
				throw new HttpNotFoundException;
				break;
			case 405:
				throw new HttpMethodErrorException;
				break;
			case 500:
				throw new ServerErrorException;
				break;
			case 503:
				throw new ServiceErrorException;
				break;
		}

		// success
		return $result;
	}

}
