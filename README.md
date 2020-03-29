# hectorj/safe-php-psalm-plugin

This is a [vimeo/psalm](https://github.com/vimeo/psalm) plugin for [thecodingmachine/safe](https://github.com/thecodingmachine/safe).

It applies some Psalm's core functions stubs to their safe versions.

## Installation

```
composer require --dev hectorj/safe-php-psalm-plugin
```

And add the plugin to your `psalm.xml`:

```xml
<plugins>
    <pluginClass class="HectorJ\SafePHPPsalmPlugin\Plugin"/>
</plugins>
```