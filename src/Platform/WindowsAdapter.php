<?php

namespace Notify\Presenter\Cli\Platform;

class WindowsAdapter implements CliAdapter
{
    public function isSupported()
    {
        return in_array(PHP_OS, array('Linux', 'FreeBSD', 'NetBSD', 'OpenBSD', 'SunOS', 'DragonFly'));
    }

    /**
     * @param \Notify\Envelope\Envelope[] $envelopes
     */
    public function render(array $envelopes = array())
    {
        foreach ($envelopes as $envelope) {
            exec(
                sprintf(
                    'notify-send \
                --urgency="normal" \
                --expire-time=300 \
                --icon="icon.jpeg" \
                --app-name="notify" \
                --icon="%s" \
                "%s " "%s "',
                    __DIR__ . '/../../../resources/icons/' . $envelope->getType() . '.png',
                    $envelope->getTitle() ?: $envelope->getType(),
                    $envelope->getMessage()
                )
            );
        }
    }
}
