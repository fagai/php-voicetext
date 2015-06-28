# PHP-VoiceText

[![Latest Stable Version](https://poser.pugx.org/fagai/voicetext/v/stable)](https://packagist.org/packages/fagai/voicetext)
[![Latest Unstable Version](https://poser.pugx.org/fagai/voicetext/v/unstable)](https://packagist.org/packages/fagai/voicetext)
[![License](https://poser.pugx.org/fagai/voicetext/license)](https://packagist.org/packages/fagai/voicetext)

[VoiceText Web API](https://cloud.voicetext.jp/webapi) client for PHP

## 使う方法

adding composer.json

```
require: {
	"fagai/voicetext" : "dev-master"
}
```

```
<?php

use \Fagai\VoiceText\VoiceText;

$voice = new VoiceText('<your api key>');
$voice->speaker('hikari')
      ->emotion('happiness')
      ->emotion_level(2)
      ->pitch(150)
      ->speed(120)
      ->volume(150)
      ->text('今日も一日がんばるぞい！');

// get wav binary data
$binaryData = $voice->get();

```

## Other Examples

```
$voice = new VoiceText('<your api key>');
$voice->setParams([
	'speaker' => 'hikari',
	'emotion' => 'happiness',
	'emotion_level' => 2,
	'pitch' => 150,
	'speed' => 120,
	'volume' => 150,
	'text' => '今日も一日がんばるぞい！']);

$binaryData = $voice->get();
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




