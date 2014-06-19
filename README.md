# Blink(1) PHP Class

This is a PHP class to communicate with the blink(1) command line tool, available [here](http://thingm.com/products/blink-1.html)

**[Check out a video of the Blink(1) running the example code](https://vimeo.com/71085950)**

## Installation for Mac OSX

The following is required in order for PHP to communicate with the command link tool

1. Open Terminal.app and type `sudo visudo` then enter you password
2. Navigate to the `# User privilege specification` section and hit `i` to insert
3. Type `nobody ALL=NOPASSWD: /blink1-tool`
(`nobody` was the username my PHP was accessing the command line with. To find yours just run the following in your PHP script `echo exec('whoami');`)
4. Hit ESC, then type `:wq` - If it says there is an error, hit `e` and fix it
5. Place the [blink1-tool](http://thingm.com/products/blink-1.html) in the `/` directory 

## Example Usage

Display #FFF (Turn on) for 2000ms
```php
Blink::send('#FFF,2000');
```

Display #F68 for 2000ms
```php
Blink::send('#F68,2000');
```

Blink #F68 for 400ms 5 times
```php
Blink::send('#F68,400',5);
```

Fade to #F68 for 400ms, fade to #0F1 for 400ms, then fade to #F68 for 400ms - loop 3 times
```php
Blink::send('#F68,400|#0F1,400|#F68,400',3);
```

Same as above, but with #000 for 50ms between for a 'flicker' effect
```php
Blink::send('#F68,400|#000,50|#ff8920,400|#000,50|#F00,400',3);
```

Blink(1) testing prior to sending
```php
if(Blink::test()) {
    Blink::send('#FFF,2000');
}
```

Blink(1) testing after sending
```php
$blink = Blink::send('#FFF,2000');
echo ($blink) ? 'Sent' : 'Fail';
```

## Useful Links

* [Blink(1) by ThumbM](http://thingm.com/products/blink-1.htm)
* [Blink(1) API Documentation](https://github.com/todbot/blink1/tree/master/docs)
* [BrandColours](http://brandcolors.net) for finding the hex colour for the service/API you are displaying an alert for

##License

Blink is licensed under the [MIT license](http://opensource.org/licenses/MIT), see [LICENSE.md](https://github.com/jamiebicknell/PHP-Blink/blob/master/LICENSE.md) for details.