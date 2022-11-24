<?php

function is_prime($num)
{
    if($num == 2)
        return true;

    if($num <= 1)
        return false;

    for($i = 2; $i <= sqrt($num); $i++)
    {
        if($num % $i == 0)
            return false;
    }

    return true;
}

$num_primes = 0;
$i = 1;

while($num_primes < 10001)
{
    if(is_prime($i))
        $num_primes++;

    $i++;
}

print $i - 1; //104743


