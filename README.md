Stream Example App
------------------

This example app shows you how you can use [GetStream.io](https://getstream.io/ "GetStream.io") to build a site similar to Pinterest.

If you have no idea what GetStream is: GetStream is an hosted API service that allows you to build activity feeds. It makes it very easy to build
user activity feeds, public feeds, aggregated feeds and notification feeds. GetStream provides API clients in several language, in this example app we show how easy
is to create a website with activity feeds using Laravel and [Stream-Laravel](https://github.com/GetStream/Stream-Laravel "Stream-Laravel").

The application is built using Laravel 5 and Stream-Laravel. The best way to try this application is via Heroku; you can deploy this example (for free) on Heroku by pressing the Deploy button below.

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/GetStream/Stream-Example-PHP/tree/laravel4)

####Laravel 4
If you are using Laravel 4, you can checkout the Laravel 4 release from here: https://github.com/GetStream/Stream-Example-PHP/tree/laravel4

####Local development
If you prefer to run this locally then make sure to generate the API keys on [GetStream.io](https://getstream.io/ "GetStream.io") and update the settings in
config/database.php and in config/packages/get-stream/stream-laravel/config.php.

Once you have the right settings you can get your database ready by running the provision command (```./provision.sh```)
