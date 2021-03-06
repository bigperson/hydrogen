<?php
/**
 * This file is part of Hydrogen package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace RDS\Hydrogen\Processor;

use RDS\Hydrogen\Query;

/**
 * Interface ProcessorInterface
 */
interface ProcessorInterface
{
    /**
     * @param Query $query
     * @return iterable
     */
    public function get(Query $query): iterable;

    /**
     * @param Query $query
     * @return object|null
     */
    public function first(Query $query);

    /**
     * @param Query $query
     * @return int
     */
    public function count(Query $query): int;
}
