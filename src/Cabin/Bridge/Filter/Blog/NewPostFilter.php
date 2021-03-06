<?php
declare(strict_types=1);
namespace Airship\Cabin\Bridge\Filter\Blog;

use Airship\Engine\Security\Filter\{
    BoolFilter,
    IntFilter,
    InputFilterContainer,
    StringArrayFilter,
    StringFilter,
    WhiteList
};

/**
 * Class NewPostFilter
 * @package Airship\Cabin\Bridge\Filter\Account
 */
class NewPostFilter extends InputFilterContainer
{
    /**
     * NewPostFilter constructor.
     */
    public function __construct()
    {
        $this
            ->addFilter('author', new IntFilter())
            ->addFilter('blog_post_body', new StringFilter())
            ->addFilter('category', new IntFilter())
            ->addFilter('description', new StringFilter())
            ->addFilter(
                'format',
                (new WhiteList(
                    'HTML',
                    'Markdown',
                    'Rich Text',
                    'RST'
                ))->setDefault('Rich Text')
            )
            ->addFilter('published', new StringFilter())
            ->addFilter('metadata', new StringArrayFilter())
            ->addFilter(
                'title',
                (new StringFilter())
                    ->addCallback([StringFilter::class, 'nonEmpty'])
            )
            ->addFilter('redirect_slug', new BoolFilter())
            ->addFilter('save_btn', new StringFilter())
            ->addFilter('slug', new StringFilter());
    }
}
