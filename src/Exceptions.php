<?php namespace Fagai\VoiceText;

/**
 * 400 Error
 * Class RequestErrorException
 * @package VoiceText
 */
class RequestErrorException extends \Exception {};

/**
 * 401 Error
 * Class NotAuthorizedException
 * @package VoiceText
 */
class NotAuthorizedException extends \Exception {};

/**
 * 404 Error
 * Class HttpNotFoundException
 * @package VoiceText
 */
class HttpNotFoundException extends \Exception {};

/**
 * 405 Error
 * Class HttpMethodErrorException
 * @package VoiceText
 */
class HttpMethodErrorException extends \Exception {};

/**
 * 500 Error
 * Class ServerErrorException
 * @package VoiceText
 */
class ServerErrorException extends \Exception {};

/**
 * 503 Error
 * Class ServiceErrorException
 * @package VoiceText
 */
class ServiceErrorException extends \Exception {};