<?php
echo $rate;
$total = $rate * $amount;
$rounded = round($total);
echo 'Rs '. $rounded;