<?php

namespace daxslab\calendly;

use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Widget;
use yii\helpers\Html;

class Calendly extends Widget
{

    const MODE_INLINE = 'inline';
    const MODE_BUTTON = 'button';
    const MODE_TEXT = 'text';

    public $mode = self::MODE_INLINE;

    public $calendlyId = null;

    public $text = null;

    public $options = [];

    private $_url = "https://calendly.com/";

    public function init()
    {

        if (!in_array($this->mode, [self::MODE_INLINE, self::MODE_BUTTON, self::MODE_TEXT])) {
            throw new InvalidArgumentException(Yii::t('app', '$mode has to be a valid mode'));
        } else {
            if ($this->text == null) {
                $this->text = Yii::t('app', 'Schedule time with me');
            }
        }

        if (!isset($this->calendlyId)) {
            throw new InvalidArgumentException(Yii::t('app', 'You have to setup a calendly id'));
        }

        $this->_url .= $this->calendlyId;

        parent::init();
    }

    public function run()
    {
        $output = '';

        $css = Html::tag('link', false, [
            'href' => 'https://assets.calendly.com/assets/external/widget.css',
            'rel' => 'stylesheet',
        ]);

        $script = Html::script(false, [
            'type' => "text/javascript",
            'src' => 'https://assets.calendly.com/assets/external/widget.js'
        ]);

        if ($this->mode == self::MODE_INLINE) {
            $options = $this->options;
            if (!isset($options['class'])) {
                $options['class'] = 'calendly-inline-widget';
            }
            if (!isset($options['style'])) {
                $options['style'] = 'min-width:320px;height:630px';
            }
            $options['data-url'] = $this->_url;

            $output .= Html::tag('div', false, $options);
            $output .= $script;
        } else {
            $output .= $css;
            $output .= $script;
            if ($this->mode == self::MODE_BUTTON) {
                $output .= Html::script(<<<JS
Calendly.initBadgeWidget({
url:'$this->_url',
text:'$this->text',
color: '#00a2ff',
textColor: '#ffffff',
branding: true
});
JS
                    , [
                        'type' => 'text/javascript',
                    ]);
            } elseif ($this->mode == self::MODE_TEXT) {
                $output .= Html::tag('a', $this->text, [
                    'href' => '',
                    'onclick' => "Calendly.initPopupWidget({url: '{$this->_url}'}); return false;"
                ]);
            }
        }

        return $output;

    }
}
