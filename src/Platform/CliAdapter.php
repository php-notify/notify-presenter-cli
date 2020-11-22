<?php

namespace Notify\Presenter\Cli\Platform;

interface CliAdapter
{
    /**
     * @return bool
     */
    public function isSupported();

    /**
     * @param \Notify\Envelope\Envelope[] $envelopes
     */
    public function render(array $envelopes = array());
}
