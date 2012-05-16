#!/bin/bash

GPIO_PINS=(17 27 22 23)

echo "setup pins $GPIO_PINS"

for pin in "${GPIO_PINS[@]}"; do
    echo "$pin" > /sys/class/gpio/export
    echo "out" > /sys/class/gpio/gpio$pin/direction
done

echo "done"
