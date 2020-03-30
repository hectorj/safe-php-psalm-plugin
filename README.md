# hectorj/safe-php-psalm-plugin

This is a [vimeo/psalm](https://github.com/vimeo/psalm) plugin for [thecodingmachine/safe](https://github.com/thecodingmachine/safe).

It applies some Psalm's core functions stubs to their safe versions.

Not all functions `thecodingmachine/safe` are supported yet. If you have a specific need, don't hesitate to open an issue or a PR.

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
