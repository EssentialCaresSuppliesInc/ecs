# Makefile for generating minified files

.PHONY: all

# we cheat and process all .js files instead of an exhaustive list
all: $(patsubst %.js,%.min.js,$(filter-out %.min.js,$(wildcard *.js)))

%.min.js: %.js
	yui-compressor $< -o $@
<<<<<<< HEAD

test:
	./node_modules/.bin/jshint *jquery.flot.js
=======
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
