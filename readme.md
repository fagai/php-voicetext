# PHP-VoiceText

[VoiceText Web API beta](https://cloud.voicetext.jp/webapi) client for PHP

## 使う方法

adding composer.json

```
require: {
	"fagai/voicetext" : "dev-master"
}
```

## Exceptions

#### RequestErrorException

400 Error

#### NotAuthorizedException

401 Error

#### HttpNotFoundException

404 Error

#### HttpMethodErrorException

405 Error

#### ServerErrorException

500 Error

#### ServiceErrorException

503 Error

## Examples

```
$voice = new VoiceText('<your api key>');
$voice->speaker('hikari')
      ->emotion('happiness')
      ->emotion_level(2)
      ->pitch(150)
      ->speed(120)
      ->volume(150)
      ->text('今日も一日がんばるぞい！');

$binaryData = $voice->get();
```

```
$voice = new VoiceText('<your api key>');
$voice->setParams(array(
	'speaker' => 'hikari',
	'emotion' => 'happiness',
	'emotion_level' => 2,
	'pitch' => 150,
	'speed' => 120,
	'volume' => 150,
	'text' => '今日も一日がんばるぞい！'));

$binaryData = $voice->get();
```


