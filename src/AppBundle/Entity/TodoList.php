<?php
/*
 * The MIT License
 *
 * Copyright 2015 Anthony Maudry <anthony.maudry@thuata.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace AppBundle\Entity;

use Thuata\FrameworkBundle\Entity\AbstractEntity;

/**
 * <b>TodoList</b><br>
 *
 *
 * @package AppBundle\Entity
 *
 * @author  Anthony Maudry <anthony.maudry@thuata.com>
 */
class TodoList extends AbstractEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Gets the entity id
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets Name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name
     *
     * @param string $name
     *
     * @return TodoList
     */
    public function setName($name): TodoList
    {
        $this->name = $name;

        return $this;
    }
}