Stream Example App
------------------

This example app shows you how you can use [GetStream.io](https://getstream.io/ "GetStream.io") to build a site similar to Pinterest.

If you have no idea what GetStream is: GetStream is an hosted API service that allows you to build activity feeds. It makes it very easy to build
user activity feeds, public feeds, aggregated feeds and notification feeds. GetStream provides API clients in several language, in this example app we show how easy
is to use the [PHP Client](https://github.com/GetStream/Stream-PHP "PHP Client").

The application is built using Laravel Framework; the best way to try this application is via Heroku; you can deploy this example (for free) on Heroku
by pressing the Deploy button below.

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

Most of the interesting code lives in the [FeedManager](https://github.com/GetStream/Stream-Example-PHP/blob/master/app/streamc.php "FeedManager") class, which is used
by controllers to read the data and by models to write the data.

If you prefer to run this locally then make sure to generate the API keys on [GetStream.io](https://getstream.io/ "GetStream.io") and update the settings in
app/config/database.php and in app/config/stream.php.

Once you have the right settings you can get your database ready by running the provision command (```./provision.sh```)
