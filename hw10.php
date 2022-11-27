//Реализация бинарного дерева для алгебраического выражения:

<?php

class Node // Node of a tree
{
    public $data;
    public $leftChild;
    public $rightChild;

    public function __construct() {
        $this->data = null;
        $this->leftChild = null;
        $this->leftChild = null;
    }
}

class BruteForceAlgebraicTree
{
    private $_root; // pointer to root of a tree

    public function __construct()
    {
        $this->_prepareTree();
    }

    /**
     * Add algebraic expression elements to tree (according to our algebraic expression)
     *
     * P.S. brute force
     */
    private function _prepareTree()
    {
        // the root
        $this->_root = new Node();
        $this->_root->data = "+";

        // left subtree
        $this->_addNode("/", "L");
        $this->_addNode("a", "LL");
        $this->_addNode("+", "LR");
        $this->_addNode("b", "LRL");
        $this->_addNode("d", "LRR");

        // right subtree
        $this->_addNode("/", "R");

        $this->_addNode("-", "RL");

        $this->_addNode("*", "RLL");
        $this->_addNode("a", "RLLL");
        $this->_addNode("a", "RLLR");

        $this->_addNode("*", "RLR");
        $this->_addNode("d", "RLRL");
        $this->_addNode("d", "RLRR");

        $this->_addNode("2", "RR");
    }

    /**
     * Add node to tree by given path
     *
     * @param string $data Node's data
     * @param string $location Path where new node should be inserted
     */
    private function _addNode($data, $location)
    {
        $current = $this->_root;

        $path = str_split($location);
        foreach ($path as $direction) {
            if ($direction == 'L') {
                if (!isset($current->leftChild)) {
                    $current->leftChild = new Node();
                }
                $current = $current->leftChild;
            } else {
                if (!isset($current->rightChild)) {
                    $current->rightChild = new Node();
                }
                $current = $current->rightChild;
            }
        }

        $current->data = $data;
    }

    /**
     * Traversing tree nodes
     *
     * @param int $type Type of traverse
     */
    public function traverse($type)
    {
        switch ($type) {
            case 1:
                echo "Up to bottom traverse: ";
                $this->_preOrder($this->_root);
                break;
            case 2:
                echo "Left to right traverse: ";
                $this->_inOrder($this->_root);
                break;
            case 3:
                echo "Bottom to top traverse: ";
                $this->_postOrder($this->_root);
                break;
        }
    }

    /**
     * Up to bottom traverse
     *
     * @param Node $localRoot Pointer to tree's root
     */
    private function _preOrder(Node $localRoot = null)
    {
        if ($localRoot != null) {
            echo $localRoot->data . " ";
            $this->_preOrder($localRoot->leftChild);
            $this->_preOrder($localRoot->rightChild);
        }
    }

    /**
     * Left to right traverse
     *
     * @param Node $localRoot Pointer to tree's root
     */
    private function _inOrder(Node $localRoot = null)
    {
        if ($localRoot != null) {
            // traverse the left tree
            $this->_inOrder($localRoot->leftChild);
            // visit the root
            echo $localRoot->data . " ";
            // traverse the right tree
            $this->_inOrder($localRoot->rightChild);
        }
    }

    /**
     * Bottom to top traverse
     *
     * @param Node $localRoot Pointer to tree's root
     */
    private function _postOrder(Node $localRoot = null)
    {
        if ($localRoot != null) {
            $this->_postOrder($localRoot->leftChild);
            $this->_postOrder($localRoot->rightChild);
            echo $localRoot->data . " ";
        }
    }
}

$Tree = new BruteForceAlgebraicTree();
echo $Tree->traverse(1) . "\n";
echo $Tree->traverse(2) . "\n";
echo $Tree->traverse(3) . "\n";

// This code will generate following output:
//Up to bottom traverse: + / a + b d / - * a a * d d 2
//Left to right traverse: a / b + d + a * a - d * d / 2
//Bottom to top traverse: a b d + / a a * d d * - 2 / +
