<?php
/*
 * В этой практике вам предстоит поработать с односвязным списком.
 *  Для лучшего понимания задачи, прочитайте литературу данную в подсказках и изучите
 * исходники файла Node.php, внутри которого находится реализация односвязного списка. И посмотрите тесты,
 *  там видно как список создается и используется.


Реализуйте функцию reverse($list), которая принимает на вход односвязный список
 и переворачивает его.

use App\Node;
use function App\LinkedList\reverse;

// (1, 2, 3)
$numbers = new Node(1, new Node(2, new Node(3)));
$reversedNumbers = reverse($numbers); // (3, 2, 1)
 */
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

class Node
{
    public function __construct($value, Node $node = null)
    {
        $this->next = $node;
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function getValue()
    {
        return $this->value;
    }
}
$numbers = new Node(1, new Node(2, new Node(3)));
debug($numbers);


function reverse(Node $list)
{
    $reversedList = null;
    $current = $list;

     while ($current) {

        $reversedList = new Node($current->getValue(), $reversedList);
        debug($reversedList);

        $current = $current->getNext();
        debug($current);

    }


    return $reversedList;
}
debug(reverse($numbers));

/*
 * Node Object
(

    [next] => Node Object
        (
            [next] => Node Object
                (
                    [next] =>
                    [value] => 3
                )

            [value] => 2
        )

    [value] => 1
)
 */

