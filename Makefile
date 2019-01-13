.PHONY: build
build: swingsherbrooke.zip style.css

.PHONY: swingsherbrooke.zip
swingsherbrooke.zip: style.css
	zip -r swingsherbrooke.zip *.php *.css readme.txt LICENSE fonts img inc js layouts languages page-templates template-parts

style.css: sass/materialized.scss package.json
	npm install
	cp -r node_modules/materialize-css/dist/fonts/ ./
