<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;

class Product extends IdentityMap
{

    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        $found = [];

        foreach ($ids as $id){
            $product = $this->getEntity($id);

            if ($product){
                $productList[] = $product;
                $found[] = $id;
            }
        }

        $ids = array_diff($ids, $found);

        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $product = new Entity\Product($item['id'], $item['name'], $item['price']);;
            $this->setEntity($product->getId(), $product);
            $productList[] = $product;
        }

        return $productList;
    }


    public function fetchAll(): array
    {
        $productList = [];

        foreach ($this->getDataFromSource() as $item) {
            $product = $this->getEntity($item['id']);

            if (!$product) {
                $product = new Entity\Product($item['id'], $item['name'], $item['price']);
                $this->setEntity($product->getId(), $product);
            }

            $productList[] = $product;
        }

        return $productList;
    }


    private function getDataFromSource(array $search = [])
    {
        $dataSource = [

        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
