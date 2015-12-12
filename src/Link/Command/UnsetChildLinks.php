<?php namespace Anomaly\NavigationModule\Link\Command;

use Anomaly\NavigationModule\Link\Contract\LinkInterface;
use Anomaly\NavigationModule\Link\Contract\LinkRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class UnsetChildLinks
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\NavigationModule\Link\Type\Command
 */
class UnsetChildLinks implements SelfHandling
{

    /**
     * The parent link.
     *
     * @var LinkInterface
     */
    protected $link;

    /**
     * Create a new UnsetChildLinks instance.
     *
     * @param LinkInterface $link
     */
    public function __construct(LinkInterface $link)
    {
        $this->link = $link;
    }

    /**
     * Handle the command.
     */
    public function handle(LinkRepositoryInterface $links)
    {
        /* @var LinkInterface $link */
        foreach ($this->link->getChildren() as $link) {
            $links->save($link->setParentId(null));
        }
    }
}
