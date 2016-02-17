<?php namespace Anomaly\NavigationModule\Menu\Command;

use Anomaly\NavigationModule\Link\Contract\LinkRepositoryInterface;
use Anomaly\NavigationModule\Menu\Contract\MenuInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class DeleteMenuLinks
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\NavigationModule\Menu\Command
 */
class DeleteMenuLinks implements SelfHandling
{

    /**
     * The menu instance.
     *
     * @var MenuInterface
     */
    protected $menu;

    /**
     * Create a new DeleteMenuLinks instance.
     *
     * @param MenuInterface $menu
     */
    public function __construct(MenuInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Handle the command.
     *
     * @param LinkRepositoryInterface $links
     */
    public function handle(LinkRepositoryInterface $links)
    {
        foreach ($this->menu->getLinks() as $link) {
            $links->delete($link);
        }
    }
}