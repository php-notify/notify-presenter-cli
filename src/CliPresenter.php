<?php

namespace Notify\Presenter\Cli;

use Notify\Presenter\AbstractPresenter;
use Notify\Presenter\Cli\CliAdapter;
use Notify\Presenter\Cli\LinuxAdapter;
use Notify\Storage\Filter\FilterManager;

final class CliPresenter extends AbstractPresenter
{
    private $adapter;

    public function __construct(FilterManager $filter, CliAdapter $adapter = null)
    {
        parent::__construct($filter);

        $this->adapter = $adapter ?: new LinuxAdapter();
    }

    /**
     * @inheritDoc
     */
    public function support(array $context)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->adapter->render($this->getEnvelopes());
    }
}
