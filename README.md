# Features & requirements

What I need for my blog is :

- fast rendering (suited for not powerfull shared hosting)
- lightweight (coded only what I need)
- good code (for future improvements)
- one user admin
- comments (moderated
- tags

That's all.

So features are :

- posts (title/teaser/content/tags)
- tags
- comments (moderated)
- markdown rendering (no wysiwyg, you may add it using plugins later)
- friendly urls

- laravel powered
- composer powered
- sqlite powered (but can be configured to run on mysql or other database engine).
- i18n

[Laravel](http://laravel.com/ "Laravel framework website") is the framework I'm currently trying to adopt (for fast / simple projects at least). So it's laravel powered.

You can see it in action here [onemorelaravelblog](http://blog.seb7.fr) (fr).

# Plan

- code as a laravel bundle
- fire events so that you can plug anywhere in the blog : so you'll be able to add plugins/bundle in it

# Install

- git clone ( or download & unzip this project, not recommended, better git clone)
- (install &) run `composer install` (see (getcomposer.org)[https://getcomposer.org/download/] for more informations)

## Configure

- copy ./config/blog.php to ./config/local/blog.php
- change needed values (admin user & login at least)
see (laravel configuration)[http://laravel.com/docs/configuration] for more informations.
- configure `$app->detectEnvironment` in ./bootstrap/start.php (should not be versionned) (see [laravel environment config](http://laravel.com/docs/configuration#environment-configuration) )

# Developpement

## Tests

### Configure

- copy ./app/tests/acceptance.suite.yml.example to ./app/tests/acceptance.suite.yml
- configure url

### Run

./vendor/codeception/codeception/codecept run
see [Codeception](http://codeception.com/docs/modules/Laravel4) for more informations

## Themes

Avoid changing files in the default theme directories. You will have (git) problems when updating app.

- Copy ./app/views/default/ to ./app/views/your-theme/
- Copy ./app/public/default/ to ./app/public/your-theme/
- Change config value in ./app/config/your-env/blog.php : 'theme' => 'your-theme'

## Improvements

*Lots of improvements* can be done.
Behaviour testing, translations, a way to hook module, a base theme, or documentation, just to mention the most important points.
[Issues](https://github.com/SebSept/onemorelaravelblog/issues?state=open)

----

It's open source, pusblished under the [MIT Licence](http://choosealicense.com/licenses/mit/).

Source code & issue tracker is here. I'll be happy to accept pull requests, so go fork it !

----

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/eedbee2c-cfb3-4642-a8e3-eb319b909987/small.png)](https://insight.sensiolabs.com/projects/eedbee2c-cfb3-4642-a8e3-eb319b909987)
