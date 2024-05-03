#!/bin/bash

# Output the initial text
echo "Hello there..."
echo $(date '+%Y-%m-%d %H:%M:%S.%6N')

# Wait for 5 seconds
sleep 5

# Output the final text
echo "After few seconds!"
echo $(date '+%Y-%m-%d %H:%M:%S.%6N')
