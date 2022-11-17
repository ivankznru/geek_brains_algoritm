<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;

class User extends IdentityMap
{

    public function getById(int $id): ?Entity\User
    {
        $user = $this->getEntity($id);

        if(empty($user)){
            foreach ($this->getDataFromSource(['id' => $id]) as $user) {
                return $this->createUser($user);
            }
        }

        return $user;
    }

    public function getByLogin(string $login): ?Entity\User
    {
        foreach ($this->getDataFromSource(['login' => $login]) as $user) {
            if ($user['login'] === $login) {
                $user = $this->getEntity($user['id']);
                if (empty($user)) {
                    $user = $this->createUser($user);
                }

                return $user;
            }
        }

        return null;
    }


    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        $user = new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );

        $this->setEntity($user->getId(), $user);

        return $user;
    }


    private function getDataFromSource(array $search = [])
    {

        $dataSource = [

        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return (bool) array_intersect(array_column($dataSource, 'login'), $search);
        };

        return array_filter($dataSource, $productFilter);
    }
}
