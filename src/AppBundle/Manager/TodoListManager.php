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

namespace AppBundle\Manager;

use AppBundle\Entity\TodoList;
use Thuata\FrameworkBundle\Entity\AbstractEntity;
use Thuata\FrameworkBundle\Manager\AbstractManager;

/**
 * <b>TodoListManager</b><br>
 *
 *
 * @package AppBundle\Manager
 *
 * @author  Anthony Maudry <anthony.maudry@thuata.com>
 */
class TodoListManager extends AbstractManager
{
    /**
     * Returns the class name for the entity
     *
     * @return string
     */
    protected function getEntityClassName(): string
    {
        return TodoList::class;
    }

    /**
     * Creates a new TodoList
     *
     * @param string $name
     *
     * @return \AppBundle\Entity\TodoList
     */
    public function createList(string $name): TodoList
    {
        //...
    }

    //region Preparators
    /**
     * Overrides the AbstractManager::prepareEntityForPersist method to check if a TodoList with the same name exists
     *
     * @param \Thuata\FrameworkBundle\Entity\AbstractEntity $entity
     *
     * @return bool
     *
     * @throws \Exception
     */
    protected function prepareEntityForPersist(AbstractEntity $entity): bool
    {
        $res = parent::prepareEntityForPersist($entity); // The parent method will return a boolean

        if ($res) { // If false no need to do anything, the entity won't be persisted
            $existing = $this->getOneEntityBy([ // That method will return a single entity matching ...
                'name' => $entity->getName()    // ... name property == $entity->getName()
            ]);

            if ($existing instanceof TodoList) {
                // Here we can just set $res to false or return false. But I prefer throwing an exception
                // Most of time I would suggest to define a custom exception that could be easily catch
                // to display a nice error to the user. Well, it's a demo...
                throw new \Exception('A list with that name already exists');
            }
        }

        return $res;
    }
    //endregion
}