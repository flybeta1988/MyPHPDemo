#!/bin/bash
echo "This is a for demo in bash shell"

for file in `ls -l ./`; do
    echo $file
done

for skill in Ada Coffe Action Java; do
    echo "I am good at ${skill}Script"
done
