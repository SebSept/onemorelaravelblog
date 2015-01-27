# Changelog

## 0.2.0 Refactoring & tests

### tests 

- use comment tag `<!-- retrieved from cache -->`
- separate guest / guest with cache / admin tests
- refactored tests code
- create tests helpers `amOnTagPage()` and others
- use laracast/testDummy instead of relying on a dump for fixture
- implemented tests for cache (replaced dirty tests & added tests)
- post comment as admin
- guest submitted comment is not published
- use sqlite memory database to speedup

### refactoring

- register custom blade helpers / tag in service provider
- bind event for cachemanager in service provider (were in global.php)
- clean controller : handle ModelNotFoundException in global.php
- cleaned view name calls : no more @extends(\Config::get('blog.theme').'::admin.layout')
  becomes : @extends('admin.layout') (usual blade syntax)
- added controllers : no more controller behavior in route.php    
- moved classes in /src
- removed crsf filter : was not possible to post a comment
- refactored repositories : use pagination config var for admin & front
- removed bootstrap useless file
- implement & use CommentRepository
- refactored post repo names
- added codeption built files to .gitingore
- removed codecept built files \n\nYou must './codecept build' to regenerate files
- BlogCacheManager facade declared in serviceProvider
- minimal doc on auth driver
- [cacheManager] replace static function by non static
- fixed bad exception namespace
- added event 'post.saved'
- [test] Unpublished comment can t be viewed - #2
- [test] Published comment can be viewed - #2
