# Setup

```
cp wp-config-sample.php wp-config.php
edit wp-config.php

cp fbr-config-sample.php fbr-config.php
edit fbr-config.php
```

## Sync blob files (uploads and plugins)

```
./pull-blobs.sh
```

*You might have to swap out the username used in connection. Edit the file*

## Get a copy of the database

First you will be asked for the remote database password, then the remote ssh password and lastly what the new hostname is (which you have configured locally):

```
./pull-database.sh
```

*You might have to swap out the username used in connection. Edit the file*

## Add NinjaForms plugin

```
git clone git@gitlab01.copyleft.no:gravity-assist/forbrukerradet.wp.ninja-forms.2015.git public/wp-content/plugins/ninja-forms
```

## Add folgmed

```

git clone git@git2.cl.no:forbrukerhr2/folgmed public/folgmed
edit public/folgmed/config.php

```

### config.php

```
<?php

require '../fbr-config.php';

define('UPDATE_URL', 'http://fbr2015.livesite.no/nyhetsvarsel-oppdater');
define('DELETE_URL', 'http://fbr2015.livesite.no/folgmed/?action=unsubscribe');

define('MAIL_SMTP_DEBUG',    false);
define('MAIL_SMTP_AUTH',     true);
define('MAIL_SMTP_SECURE',   'tls');
define('MAIL_HOST',          'mailer06.copyleft.no');
define('MAIL_USERNAME',      'no-reply@forbrukerradet.no');
define('MAIL_PASSWORD',      '');
define('MAIL_PORT',          587);
define('MAIL_FROM_ADDRESS',  'no-reply@forbrukerradet.no');
define('MAIL_FROM_NAME',     'Forbrukerrådet');
define('MAIL_REPLY_ADDRESS', 'no-reply@forbrukerradet.no');
define('MAIL_REPLY_NAME',    'Forbrukerrådet');
define('MAIL_CHARSET',       'UTF-8');

define('DAILY_THRESHOLD_ALERT', 3);
define('DAILY_THRESHOLD_STOP', 5);

?>
```

## Compile stylesheets

```
cd public/wp-content/themes/fr
compass compile
```

## Production build

```
edit fbr-config.php # set ENV to "prod"
sudo npm install -g grunt-cli
npm install
grunt
```

# Workflow

https://bonanza.copyleft.no/edit-issue.do?issue-id=163867

# Links

* https://bonanza.copyleft.no/showproject.do?id=1361
# testfr
