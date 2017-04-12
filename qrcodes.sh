#!/bin/bash
mysql -uroot -p1331 -e "USE life_survey; SELECT restaurants.id, hotels.name AS hotel, restaurants.name from restaurants JOIN hotels ON restaurants.hotel_id = hotels.id" | while read id name; do
	curl  https://api.qrserver.com/v1/create-qr-code/\?size=300x300\&data="http://rs.sunrise-resorts.com/?r="$id > "$name".png
done;
