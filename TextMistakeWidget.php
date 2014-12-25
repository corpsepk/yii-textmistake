<?php
/**
 * TextMistake class file.
 *
 * @property string $assetsPath
 * @property string $assetsUrl
 * @property array $plugins
 *
 * @author Khramov Alexsandr <corpsepk@gmail.com>

 * @version 0.1
 *
 * @link https://github.com/corpsepk/text-mistake
 */
class TextMistakeWidget extends CWidget
{
	/**
	 * Assets package ID.
	 */
	const PACKAGE_ID = 'textmistake';

	/**
	 * @var array {@link http://tarampampam.github.io/jquery.textmistake/ options}.
	 */
	public $options = array();

	/**
	 * @var array
	 */
	public $package = array();


	/**
	 * Init widget.
	 */
	public function init()
	{
		parent::init();

        $this->options =  array_merge($this->defaultOptions, $this->options);

        $this->registerClientScript();
	}

	/**
	 * Register CSS and Script.
	 */
	protected function registerClientScript()
	{
		// Prepare script package.
		$this->package = array_merge(array(
				'baseUrl' => $this->getAssetsUrl(),
				'js' => array(
					YII_DEBUG ? 'jquery.textmistake.js' : 'jquery.textmistake.min.js',
				),
				'depends' => array(
					'jquery',
				),
			), $this->package);

		$clientScript = Yii::app()->getClientScript();
		$options = CJavaScript::encode($this->options);

		$clientScript
			->addPackage(self::PACKAGE_ID, $this->package)
			->registerPackage(self::PACKAGE_ID)
			->registerScript(
				$this->id,
                'jQuery(document).textmistake('.$options.');',
				CClientScript::POS_READY
			);
	}

	/**
	 * Get the assets path.
	 * @return string
	 */
	public function getAssetsPath()
	{
		return  dirname(__FILE__) . '/assets';
	}

	/**
	 * Publish assets and return url.
	 * @return string
	 */
	public function getAssetsUrl()
	{
		return Yii::app()->getAssetManager()->publish($this->getAssetsPath());
	}

    public function getDefaultOptions()
    {
        return array(
            'mailTo' => 'no-matter@example.com',
            'l10n' => array(
                'title' => Yii::t('TextMistakeWidget.widget', 'Report a typo author:'),
                'urlHint' => Yii::t('TextMistakeWidget.widget', 'Url of the page with error:'),
                'errTextHint' => Yii::t('TextMistakeWidget.widget', 'Text with the error:'),
                'yourComment' => Yii::t('TextMistakeWidget.widget', 'Your comment:'),
                'userComment' => Yii::t('TextMistakeWidget.widget', 'Comment by user:'),
                'commentPlaceholder' => Yii::t('TextMistakeWidget.widget', 'Type comment'),
                'cancel' => Yii::t('TextMistakeWidget.widget', 'Cancel'),
                'send' => Yii::t('TextMistakeWidget.widget', 'Send'),
                'mailSubject' => Yii::t('TextMistakeWidget.widget', 'Typo on the site'),
                'mailTitle' => Yii::t('TextMistakeWidget.widget', 'Typo on the site'),
                'mailSended' => Yii::t('TextMistakeWidget.widget', 'Notification sent'),
                'mailSendedDesc' => Yii::t('TextMistakeWidget.widget', 'Your notification has been sent successfully. Thank you for your feedback!'),
                'mailNotSended' => Yii::t('TextMistakeWidget.widget', 'Sending error'),
                'mailNotSendedDesc' => Yii::t('TextMistakeWidget.widget', 'Your message has not been sent, sorry.'),
            )
        );
    }
}
