<?php
/**
 * This file is part of Hydrogen package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace RDS\Hydrogen\Criteria;

use RDS\Hydrogen\Query;

/**
 * Class Group
 */
class Group extends Criterion
{
    /**
     * @var Query
     */
    private $parent;

    /**
     * @var bool
     */
    private $conjunction;

    /**
     * @var \Closure
     */
    private $then;

    /**
     * Group constructor.
     * @param Query $parent
     * @param \Closure $then
     * @param bool $conjunction
     */
    public function __construct(Query $parent, \Closure $then, bool $conjunction = true)
    {
        $this->parent = $parent;
        $this->conjunction = $conjunction;
        $this->then = $then;
    }

    /**
     * @return bool
     */
    public function isAnd(): bool
    {
        return $this->conjunction;
    }

    /**
     * @return Query
     */
    public function getQuery(): Query
    {
        $query = $this->parent->sub();

        ($this->then)($query);

        return $query;
    }
}
