up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

restart:
	./vendor/bin/sail down
	./vendor/bin/sail up -d

shell:
	./vendor/bin/sail exec laravel.test bash

