up:
	./vendor/bin/sail up -d

up-foreground:
	./vendor/bin/sail up

down:
	./vendor/bin/sail down

restart:
	./vendor/bin/sail down
	./vendor/bin/sail up -d

shell:
	./vendor/bin/sail exec laravel.test bash

chown:
	sudo chown -R $${USER}:$${USER} .
