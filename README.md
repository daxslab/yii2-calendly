yii2-calendly
=============

[![Build Status](https://secure.travis-ci.org/daxslab/yii2-calendly.png)](http://travis-ci.org/daxslab/yii2-calendly)
[![Latest Stable Version](https://poser.pugx.org/daxslab/yii2-calendly/v/stable.svg)](https://packagist.org/packages/daxslab/yii2-calendly)
[![Total Downloads](https://poser.pugx.org/daxslab/yii2-calendly/downloads)](https://packagist.org/packages/daxslab/yii2-calendly)
[![Latest Unstable Version](https://poser.pugx.org/daxslab/yii2-calendly/v/unstable.svg)](https://packagist.org/packages/daxslab/yii2-calendly)
[![License](https://poser.pugx.org/daxslab/yii2-calendly/license.svg)](https://packagist.org/packages/daxslab/yii2-calendly)

Embeds Calendly widgets into Yii2 applications

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist daxslab/yii2-calendly "*"
```

or add

```
"daxslab/yii2-calendly": "*"
```

to the require section of your `composer.json` file.

Usage
-----



```php
<?= \daxslab\calendly\Calendly::widget([
    'calendlyId' => Yii::$app->params['calendlyId'],
    'mode' => \frontend\widgets\Calendly::MODE_INLINE,
]) ?>
```
    
    
Defaults
--------

The component will try to set some properties by default:

- mode: Defaults to "inline". It can also be "button" or "text"
- text: Default to "Schedule time with me" 


Proudly made by [Daxslab](http://daxslab.com).
