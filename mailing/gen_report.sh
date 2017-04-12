#!/bin/bash
DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
day=$(date -d "yesterday" '+%Y-%m-%d')
month=$(date -d "yesterday" '+%Y-%m')

echo $day
echo $month

wkhtmltopdf http://survey.local/reports/index/$1/$day/$day/ $DIR/$1_$day.pdf