<?php

include './blink.php';

// Display #FFF (Turn on) for 2000ms
Blink::send('#FFF,2000');
sleep(2);

// Display #F68 for 2000ms
Blink::send('#F68,2000');
sleep(2);

// Blink #F68 for 400ms 5 times
Blink::send('#F68,400', 5);
sleep(2);

// Fade to ##F68 for 400ms, fade to #0F1 for 400ms, then fade to #F68 for 400ms - loop 3 times
Blink::send('#F68,400|#0F1,400|#F68,400', 3);
sleep(2);

// Save as above, but with #000 for 50ms between for a 'flicker' effect
Blink::send('#F68,400|#000,50|#ff8920,400|#000,50|#F00,400', 3);
sleep(2);

// Blink(1) testing prior
if (Blink::test()) {
    Blink::send('#FFF,2000');
}

// Blink(1) testing after
$blink = Blink::send('#FFF,2000');
echo ($blink) ? 'Sent' : 'Fail';
