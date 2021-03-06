<?php

/**
 * League.Csv (https://csv.thephpleague.com).
 *
 * @author  Ignace Nyamagana Butera <nyamsprod@gmail.com>
 * @license https://github.com/thephpleague/csv/blob/master/LICENSE (MIT License)
 * @version 9.1.5
 * @link    https://github.com/thephpleague/csv
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\Csv;

/**
 * Thrown when a data is not added to the Csv Document.
 *
 * @package League.csv
 * @since   9.0.0
 * @author  Ignace Nyamagana Butera <nyamsprod@gmail.com>
 */
class CannotInsertRecord extends Exception
{
    /**
     * The record submitted for insertion.
     *
     * @var array
     */
    protected $record;

    /**
     * Validator which did not validated the data.
     *
     * @var string
     */
    protected $name = '';

    /**
     * Create an Exception from a record insertion into a stream.
     */
    public static function triggerOnInsertion(array $record): self
    {
        $exception = new static('Unable to write record to the CSV document');
        $exception->record = $record;

        return $exception;
    }

    /**
     * Create an Exception from a Record Validation.
     */
    public static function triggerOnValidation(string $name, array $record): self
    {
        $exception = new static('Record validation failed');
        $exception->name = $name;
        $exception->record = $record;

        return $exception;
    }

    /**
     * return the validator name.
     *
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * return the invalid data submitted.
     *
     */
    public function getRecord(): array
    {
        return $this->record;
    }
}
