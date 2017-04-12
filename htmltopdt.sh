#!/bin/bash
wkhtmltopdf --cookie-jar cookie.jar $1?demo_user=yes tmp.pdf
wkhtmltopdf --cookie-jar cookie.jar $1$2 lala.pdf
wkhtmltopdf --cookie-jar cookie.jar $1auth/logout tmp.pdf
echo "lala.pdf"
