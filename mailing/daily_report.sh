#!/bin/bash
DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
month=$(date -d "yesterday" '+%Y-%m')

wkhtmltopdf http://survey.local/reports/index/$1/$month/$month/on/$month $DIR/$1_$month.pdf