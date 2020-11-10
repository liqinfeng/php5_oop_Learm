<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.16 */
interface Handler
{
    public function handleMatch(
        Parser $parser,
        Scanner $scanner
    );
}
