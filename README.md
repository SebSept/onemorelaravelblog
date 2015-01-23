A blog engine made with @laravel framework.

It is made to be extended using laravel packages (via composer) & laravel events.

It is beta version, development is in `wip` branch.

# Features

- fast rendering - built in caching (suited for not powerfull shared hosting)
- one user admin
- posts (view / list by date / list by tags)
- comments (with moderation)
- tags
- friendly urls
 
## Powered by 

- laravel powered
- composer powered
- sqlite powered (but can be configured to run on mysql or other database engine).

It currently use Markdown to render posts content (will be removed from core when plugin implemented)

You can see it in action here [onemorelaravelblog](http://blog.seb7.fr) (fr). on a [small shared hosting](http://www.phpnet.org/mutualise.php) (_perso starter_) 

# Install

- git clone ( or download & unzip this project, not recommended, better git clone)
- (install &) run `composer install` - see [getcomposer.org](https://getcomposer.org/download/) for more informations.

## Configure

- copy ./config/blog.php to ./config/local/blog.php
- change needed values (admin user & login at least)
see [laravel configuration](http://laravel.com/docs/configuration) for more informations.
- configure `$app->detectEnvironment` in ./bootstrap/start.php (should not be versionned) ( see [laravel environment config](http://laravel.com/docs/configuration#environment-configuration) )

# Developpement

## Tests

### Configure

- copy ./app/tests/acceptance.suite.yml.example to ./app/tests/acceptance.suite.yml
- run `./codecept build` to run the tests.
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

# Wiki - Documentations

How to will be on [wiki](https://github.com/SebSept/onemorelaravelblog/wiki).
----

It's open source, pusblished under the [MIT Licence](http://choosealicense.com/licenses/mit/).

Source code & issue tracker is here. I'll be happy to accept pull requests, so go fork it !

----

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/eedbee2c-cfb3-4642-a8e3-eb319b909987/small.png)](https://insight.sensiolabs.com/projects/eedbee2c-cfb3-4642-a8e3-eb319b909987)
