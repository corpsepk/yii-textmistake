yii-textmistake
===============

#Source and demo
http://tarampampam.github.io/jquery.textmistake/

#Install
Copy extension to ```application.extension``` folder 

#How to use
```php
<? $this->widget('ext.textmistake.TextMistakeWidget');?>
```

#Supported options
```json
{
    'l10n': {
        'title': 'Report a typo author:',
        'urlHint': 'Url of the page with error:',
        'errTextHint': 'Text with the error:',
        'yourComment': 'Your comment:',
        'userComment': 'Comment by user:',
        'commentPlaceholder': 'Type comment',
        'cancel': 'Cancel',
        'send': 'Send',
        'mailSubject': 'Typo on the site',
        'mailTitle': 'Typo on the site',
        'mailSended': 'Notification sent',
        'mailSendedDesc': 'Your notification has been sent successfully. Thank you for your feedback!',
        'mailNotSended': 'Sending error',
        'mailNotSendedDesc': 'Your message has not been sent, sorry.',
    },
    'debug': false,
    'initCss': true,
    'initHtml': true,
    'overlayColor': '#666',
    'overlayOpacity': 0.5,
    'windowZindex': 10001,
    'hideBodyScroll': true,
    'textLimit': 400,
    'contextLength': 40,
    'closeOnEsc': true,
    'mailTo': '',
    'mailFrom': 'textmistake@'+window.location.hostname,
    'mandrillKey': '',
    'sendmailUrl': '',
    'animateSpeed': 0,
    'autocloseTime': 10000,
    'onShow': function(state){},
    'onHide': function(state){},
    'onLoadingShow': function(state){},
    'onLoadingHide': function(state){},
    'onCtrlEnter': function(){},
    'onEscPressed': function(){},
    'onSendMail': function(response){},
    'onAjaxDone': function(response){},
    'onAjaxResultError': function(response){},
    'onAjaxSendError': function(response){},
}
```